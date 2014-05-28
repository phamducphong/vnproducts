<?php
App::uses('Maker', 'Model');

/**
 * Maker Test Case
 *
 */
class MakerTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.maker',
		'app.product'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Maker = ClassRegistry::init('Maker');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Maker);

		parent::tearDown();
	}

}
