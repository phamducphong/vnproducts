<?php
App::uses('AppModel', 'Model');
/**
 * Product Model
 *
 */
class Product extends AppModel {

/**
 * Use database config
 *
 * @var string
 */
	public $useDbConfig = 'vnproducts';

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'product';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'price' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'quantity' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'makerid' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'createdate' => array(
			'datetime' => array(
				'rule' => array('datetime'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	
/**
 * 
 * @param string $limit
 * @return Ambigous <multitype:, NULL>
 */
	public function findProductsNew($limit=null){
		$cond = array(
				'order' => 'Product.createdate DESC',
				'limit' => $limit
				);
		$ret = $this->find('all',$cond);
		return $ret;
	}
	
/**
 * 
 * @param string $makerid
 * @param string $limit
 * @return Ambigous <multitype:, NULL>
 */
	public function findProductsByMakerID($makerid=null,$limit=null){
		$cond = array(
				'conditions' => array('Product.makerid' => $makerid),
				'order' => 'Product.createdate DESC',
				'limit' => $limit
				);
		$ret = $this->find('all',$cond);
		return $ret;
	}
	
/**
 * 
 * @param string $keyword
 * @param string $limit
 * @return Ambigous <multitype:, NULL>
 */
	public function findProductsByKeyword($keyword=null,$limit=null){
		$cond = array(
				'conditions' => array("OR"=>array(
											'Product.name like'=>"%$keyword%",
											'Product.catchcopy like'=>"%$keyword%"
											)),
				'order' => 'Product.createdate DESC',
				'limit' => $limit
		);
		$ret = $this->find('all',$cond);
		return $ret;
	}
	
	public function findProductsMakerByKeyword($keyword=null,$limit=null){
		$fields = array('product.*','maker.*');
		$joins[] = array(
				'type'=>'INNER',
				'table'=>'maker',
				'alias'=>'Maker',
				'conditions'=>array('product.makerid = maker.id',)
		);
		$cond = array("OR"=>array(
						'Product.name like'=>"%$keyword%",
						'Product.catchcopy like'=>"%$keyword%"
				)
		);
		$order = 'Product.createdate DESC';
			
		
		$ret = $this->find('all',array(
				'fields'=>$fields,
				'joins'=>$joins,
				'conditions'=>$cond,
				'order'=>$order,
				'limit'=>$limit
		));
		return $ret;
	}
}
