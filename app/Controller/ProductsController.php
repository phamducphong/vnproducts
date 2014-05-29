<?php
App::uses('AppController', 'Controller');

/**
 * Products Controller
 *
 * @property Product $Product
 * @property PaginatorComponent $Paginator
 */
class ProductsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator','Session','Auth');
	
	public function beforeFilter(){
		$this->Auth->allow('*');
	}
	
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Product->recursive = 0;
		$this->set('products', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Product->exists($id)) {
			throw new NotFoundException(__('Invalid product'));
		}
		$options = array('conditions' => array('Product.' . $this->Product->primaryKey => $id));
		$this->set('product', $this->Product->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Product->create();
			if ($this->Product->save($this->request->data)) {
				$this->Session->setFlash(__('The product has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The product could not be saved. Please, try again.'));
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
		if (!$this->Product->exists($id)) {
			throw new NotFoundException(__('Invalid product'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Product->save($this->request->data)) {
				$this->Session->setFlash(__('The product has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The product could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Product.' . $this->Product->primaryKey => $id));
			$this->request->data = $this->Product->find('first', $options);
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
		$this->Product->id = $id;
		if (!$this->Product->exists()) {
			throw new NotFoundException(__('Invalid product'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Product->delete()) {
			$this->Session->setFlash(__('The product has been deleted.'));
		} else {
			$this->Session->setFlash(__('The product could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}


/**
 * detail method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function detail($id = null) {
		if (!$this->Product->exists($id)) {
			throw new NotFoundException(__('Invalid product'));
		}

		$options = array('conditions' => array('Product.' . $this->Product->primaryKey => $id));
		$this->set('product', $this->Product->find('first', $options));
	}
	
/**
 * show method
 *
 * @return void
 */
	public function show() {
		$this->Product->recursive = 0;
		
		//商品一覧
		if ($this->request->is('post')){
			$keyword = $this->request->data['Product']['keyword'];
			$products = $this->Product->findProductsMakerByKeyword($keyword,10);
		}else {
			$products = $this->Product->findProductsMakerByKeyword(null,10);
		}
		$this->set('products',$products);
		
		//メーカー別の商品一覧
		$Maker1Records = $this->Product->findProductsByMakerid(1,5);
		$this->set('Maker1Records', $Maker1Records);
		
		$Maker2Records = $this->Product->findProductsByMakerid(2,5);
		$this->set('Maker2Records', $Maker2Records);
	}


	
	public function showbymaker($makerid=null){
		$this->Product->recursive = 0;
		
		if ($this->request->is('post')){
			$makerid = $this->request->data['Product']['makerid'];
			$keyword = $this->request->data['Product']['keyword'];
			$products = $this->Product->findProductsByMakeridAndKeyword($makerid,$keyword);
		}else {
			$products = $this->Product->findProductsByMakerid($makerid);
		}
		$this->set('makerid', $makerid);
		$this->set('products', $products);
	}
}
