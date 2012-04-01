<?php
App::import('Minify.Vendor', 'minify' . DS . 'index');

/**
 * Minify Controller
 *
 * Classe responsável pela compressão de arquivos javascript e css.
 *
 * @package		app.Controller
 */
class MinifyController extends Controller {

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

}
?>