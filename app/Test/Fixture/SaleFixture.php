<?php
/**
 * SaleFixture
 *
 */
class SaleFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'sale';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'productid' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'userid' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'amount' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'sumprice' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'saledate' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'productid' => 1,
			'userid' => 1,
			'amount' => 1,
			'sumprice' => 1,
			'saledate' => '2014-05-27 05:07:18'
		),
	);

}
