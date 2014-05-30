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
	

	public function findProductsByMakerid($makerid=null,$limit=null){
		$fields = array('product.*','maker.*');
		$joins[] = array(
				'type'=>'INNER',
				'table'=>'maker',
				'alias'=>'Maker',
				'conditions'=>array('product.makerid = maker.id',)
		);
		$cond =array('Product.makerid' => $makerid);
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
	
	public function findProductsByMakeridAndKeyword($makerid=null,$keyword=null,$limit=null){
		$fields = array('product.*','maker.*');
		$joins[] = array(
				'type'=>'INNER',
				'table'=>'maker',
				'alias'=>'Maker',
				'conditions'=>array('product.makerid = maker.id',)
		);
		$cond = array("AND"=>array(
							'Product.makerid' => $makerid,
							"OR" => array(
									'Product.name like'=>"%$keyword%",
									'Product.catchcopy like'=>"%$keyword%"
									)
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

	public function findRecommendProductsByProductid($productid=null,$limit=null){
		$sql = "SELECT Product.* FROM vnproducts.product as Product WHERE Product.id IN
					(
						SELECT DISTINCT Sale.productid FROM vnproducts.sale as Sale WHERE Sale.userid IN
						(SELECT Sale.userid FROM vnproducts.sale as Sale WHERE Sale.productid = {$productid})
    				) AND Product.id != {$productid}
    				ORDER BY Product.createdate DESC
    				LIMIT {$limit}
		";
		$ret = $this->query($sql);
		return $ret;
	}
}
