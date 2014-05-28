<?php
App::uses('AppController', 'Controller');
/**
 * Makers Controller
 *
 * @property Maker $Maker
 * @property PaginatorComponent $Paginator
 */
class MakersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Maker->recursive = 0;
		$this->set('makers', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Maker->exists($id)) {
			throw new NotFoundException(__('Invalid maker'));
		}
		$options = array('conditions' => array('Maker.' . $this->Maker->primaryKey => $id));
		$this->set('maker', $this->Maker->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Maker->create();
			if ($this->Maker->save($this->request->data)) {
				$this->Session->setFlash(__('The maker has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The maker could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Maker->exists($id)) {
			throw new NotFoundException(__('Invalid maker'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Maker->save($this->request->data)) {
				$this->Session->setFlash(__('The maker has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The maker could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Maker.' . $this->Maker->primaryKey => $id));
			$this->request->data = $this->Maker->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Maker->id = $id;
		if (!$this->Maker->exists()) {
			throw new NotFoundException(__('Invalid maker'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Maker->delete()) {
			$this->Session->setFlash(__('The maker has been deleted.'));
		} else {
			$this->Session->setFlash(__('The maker could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
/**
 * show method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function show($id = null) {
		if (!$this->Maker->exists($id)) {
			throw new NotFoundException(__('Invalid maker'));
		}
		$this->set('maker', $this->Maker->findMakerByID($id));
	}
}
