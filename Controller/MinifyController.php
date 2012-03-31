<?php
App::import('Minify.Vendor', 'minify' . DS . 'index');

/**
 * Minify Controller
 *
 * Classe responsável pela compressão de arquivos javascript e css.
 *
 * @package		app.Controller
 */
class MinifyController extends AppController {

	public $name = 'Minify';

	/**
	 * Take care of any minifying requests.
	 *
	 * @return void
	 */
	public function index() {
		$this->response->statusCode('304');
		exit;
	}

	/**
	 * Checks if the Auth component is being used to give permission to the index() method.
	 *
	 * @return void
	 */
	public function beforeFilter() {
		if (Set::check($this->Auth)) {
			$this->Auth->allowedActions = array('index');
		}
	}

}
?>