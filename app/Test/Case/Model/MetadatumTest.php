<?php
App::uses('Metadatum', 'Model');

/**
 * Metadatum Test Case
 *
 */
class MetadatumTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.metadatum',
		'app.node'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Metadatum = ClassRegistry::init('Metadatum');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Metadatum);

		parent::tearDown();
	}

}
