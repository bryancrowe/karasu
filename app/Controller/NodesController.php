<?php
App::uses('AppController', 'Controller');
App::uses('Inflector', 'Utility');
/**
 * Nodes Controller
 *
 * @property Node $Node
 */
class NodesController extends AppController {

	public $components = array('Geocoder.Geocoder');

	public function isAuthorized($user)
	{
		if (in_array($this->action, array('add')) && $user['role'] === 'admin') {
			return true;
		}
		return parent::isAuthorized();
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->helpers = array('Text', 'Time');
		$this->paginate = array(
        	'limit' => 20,
        	'contain' => array('User', 'Type', 'Metadatum', 'Comment')
    	);
		$this->set('nodes', $this->paginate());
		$types = $this->Node->Type->find('list', array('fields' => 'name'));
		$this->set(compact('types'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Node->exists($id)) {
			throw new NotFoundException(__('Invalid node'));
		}
		$options = array('conditions' => array('Node.' . $this->Node->primaryKey => $id));
		$this->set('node', $this->Node->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($type = null) {
		if ($this->request->is('post')) {
			$this->Node->create();
			if ($this->Node->save($this->request->data)) {
				if (isset($this->request->data['Node']['address'])) {
					$lastNodeID = $this->Node->getLastInsertID();
					$this->loadModel('Metadatum');
					$geocodeResult = $this->Geocoder->geocode($this->request->data['Node']['address']);
					if (count($geocodeResult) > 0) {
						$latitude  = floatval($geocodeResult[0]->geometry->location->lat);
						$longitude = floatval($geocodeResult[0]->geometry->location->lng);
						$metaData = array(
							'latitude'  => $latitude,
							'longitude' => $longitude
						);
						$metaData = serialize($metaData);
						$this->Metadatum->save(array(
							'data'    => $metaData,
							'node_id' => $lastNodeID
						));
					}
				}
				$this->Session->setFlash(__('The node has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The node could not be saved. Please, try again.'));
			}
		}
		$user_id = $this->Auth->user('id');
		$type_id = $this->Node->Type->find('first', array(
			'conditions' => array(
				'name' => Inflector::camelize($type)
			),
			'fields' => array('Type.id')
		));
		$this->set(compact('user_id', 'type_id'));
		$this->render('add_' . $type);
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Node->exists($id)) {
			throw new NotFoundException(__('Invalid node'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Node->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__('The node has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The node could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Node.' . $this->Node->primaryKey => $id));
			$this->request->data = $this->Node->find('first', $options);
		}
		$users = $this->Node->User->find('list');
		$types = $this->Node->Type->find('list');
		$this->set(compact('users', 'types'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Node->id = $id;
		if (!$this->Node->exists()) {
			throw new NotFoundException(__('Invalid node'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Node->delete()) {
			$this->Session->setFlash(__('Node deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Node was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
