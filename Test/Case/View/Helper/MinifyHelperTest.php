<?php
App::uses('MinifyHelper', 'View/Helper');

/**
 * MinifyHelper Test Case
 *
 */
class MinifyHelperTestCase extends CakeTestCase {
/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$View = new View();
		$this->Minify = new MinifyHelper($View);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Minify);

		parent::tearDown();
	}

/**
 * testScript method
 *
 * @return void
 */
	public function testScript() {

	}
/**
 * testCss method
 *
 * @return void
 */
	public function testCss() {

	}
}
