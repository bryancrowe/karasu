<?php
App::uses('AppController', 'Controller');
App::uses('Inflector', 'Utility');
/**
 * Nodes Controller
 *
 * @property Node $Node
 */
class NodesController extends AppController {
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Node->recursive = 0;
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
	public function add() {
		if ($this->request->is('post')) {
			$this->Node->create();
			if ($this->Node->save($this->request->data)) {
				$this->Session->setFlash(__('The node has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The node could not be saved. Please, try again.'));
			}
		}
		$users = $this->Node->User->find('list', array('fields' => 'username'));
		$types = $this->Node->Type->find('list', array('fields' => 'name'));
		$this->set(compact('users', 'types'));
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
			if ($this->Node->save($this->request->data)) {
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
