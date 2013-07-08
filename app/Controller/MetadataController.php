<?php
App::uses('AppController', 'Controller');
/**
 * Metadata Controller
 *
 * @property Metadatum $Metadatum
 */
class MetadataController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Metadatum->recursive = 0;
		$this->set('metadata', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Metadatum->exists($id)) {
			throw new NotFoundException(__('Invalid metadatum'));
		}
		$options = array('conditions' => array('Metadatum.' . $this->Metadatum->primaryKey => $id));
		$this->set('metadatum', $this->Metadatum->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Metadatum->create();
			if ($this->Metadatum->save($this->request->data)) {
				$this->Session->setFlash(__('The metadatum has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The metadatum could not be saved. Please, try again.'));
			}
		}
		$nodes = $this->Metadatum->Node->find('list');
		$this->set(compact('nodes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Metadatum->exists($id)) {
			throw new NotFoundException(__('Invalid metadatum'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Metadatum->save($this->request->data)) {
				$this->Session->setFlash(__('The metadatum has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The metadatum could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Metadatum.' . $this->Metadatum->primaryKey => $id));
			$this->request->data = $this->Metadatum->find('first', $options);
		}
		$nodes = $this->Metadatum->Node->find('list');
		$this->set(compact('nodes'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Metadatum->id = $id;
		if (!$this->Metadatum->exists()) {
			throw new NotFoundException(__('Invalid metadatum'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Metadatum->delete()) {
			$this->Session->setFlash(__('Metadatum deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Metadatum was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
