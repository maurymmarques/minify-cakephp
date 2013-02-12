<?php
/**
 * Minify Controller
 *
 * @package	Minify.Controller
 */
class MinifyController extends Controller {

/**
 * Index method.
 *
 * @return void
 */
	public function index($type) {
		App::import('Vendor', 'Minify.minify/index');

		$this->response->statusCode('304');
		exit();
	}

}
?>