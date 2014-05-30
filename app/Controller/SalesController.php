<?php
App::uses('AppController', 'Controller');
/**
 * Sales Controller
 *
 * @property Sale $Sale
 * @property PaginatorComponent $Paginator
 */
class SalesController extends AppController {
	
	public $name = 'Sales';
	public $uses = array('Sale','User','Product');
	public $helpers = array('js' => array('jquery'));
	
	
/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator','Session','Auth');
	

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Sale->recursive = 0;
		$this->set('sales', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Sale->exists($id)) {
			throw new NotFoundException(__('Invalid sale'));
		}
		$options = array('conditions' => array('Sale.' . $this->Sale->primaryKey => $id));
		$this->set('sale', $this->Sale->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Sale->create();
			if ($this->Sale->save($this->request->data)) {
				$this->Session->setFlash(__('The sale has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The sale could not be saved. Please, try again.'));
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
		if (!$this->Sale->exists($id)) {
			throw new NotFoundException(__('Invalid sale'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Sale->save($this->request->data)) {
				$this->Session->setFlash(__('The sale has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The sale could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Sale.' . $this->Sale->primaryKey => $id));
			$this->request->data = $this->Sale->find('first', $options);
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
		$this->Sale->id = $id;
		if (!$this->Sale->exists()) {
			throw new NotFoundException(__('Invalid sale'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Sale->delete()) {
			$this->Session->setFlash(__('The sale has been deleted.'));
		} else {
			$this->Session->setFlash(__('The sale could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
/**
 * 
 * @param string $productid
 */
	public function createSale($productid=null){
		
		if ($this->request->is('post')) {
			$this->Sale->create();
			if ($this->Sale->save($this->request->data)) {
				$this->Session->setFlash(__('The sale has been saved.'));
				return $this->redirect(array('action' => 'historySale'));
			} else {
				$this->Session->setFlash(__('The sale could not be saved. Please, try again.'));
			}
			
		}else {
			
			$userid = $this->Session->read('userid');
			$amount = 1;
			$product = $this->Product->find('first',array('id'=>$productid));
			$sumprice = $amount * $product['Product']['price'];
			
			
			$this->request->data['Sale']['productid'] = $productid;
			$this->request->data['Sale']['userid'] = $userid;
			$this->request->data['Sale']['name'] = $product['Product']['name'];
			$this->request->data['Sale']['price'] = $product['Product']['price'];
			$this->request->data['Sale']['amount'] = $amount;
			$this->request->data['Sale']['sumprice'] = $sumprice;
			$this->request->data['Sale']['saledate'] = date('Y-m-d H:i:s');
		}
	}
	
/**
 * historySale method
 *
 * @return void
 */
	public function historySale(){
		
		$userid = $this->Session->read('userid');
		$conditions = array('userid'=>$userid);
		$order = 'saledate desc';
		$limit = 10;
		
		$this->paginate = array(
				'conditions'=>$conditions,
				'order'=>$order,
				'limit'=>$limit,
		);
		$data = $this->paginate();
		$this->set('sales', $data);
		
		
		$sumprice = $this->Sale->getSumpriceByUserid($userid);
		$this->set('sumprice',$sumprice);
	}
}
