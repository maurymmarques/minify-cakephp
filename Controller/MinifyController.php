<?php
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
	 * The import is not defined outside the class to avoid errors if the class is read from the console.
	 *
	 * @return void
	 */
	public function index($type) {
		$files = array_unique(explode(',', $_GET['f']));
		$plugins = array();
		$pluginSymlinks = array();
		$newFiles = array();
		foreach ($files as &$file)
		{
		    if (empty($file))
		    {
			continue;
		    }
		    
		    $plugin = false;
		    list($first, $second) = pluginSplit($file);
		    if (CakePlugin::loaded($first) === true) {
			$file = $second;
			$plugin = $first;
		    }

		    $pluginPath = (!empty($plugin) ? '..' . DS . 'Plugin' . DS . $plugin . DS . WEBROOT_DIR . DS : '');
		    $file = $pluginPath . $type . DS . $file . '.' . $type;
		    $newFiles[] = $file;

		    if (!empty($plugin) && !isset($plugins[$plugin]))
		    {
			$plugins[$plugin] = true;

			$pluginSymlinks['/' . $this->request->base . '/' . Inflector::underscore($plugin)] = APP . 'Plugin' . DS . $plugin . DS . WEBROOT_DIR;
		    }
		}
		$_GET['f'] = implode(',', $newFiles);
		$_GET['symlinks'] = $pluginSymlinks;

		App::import('Vendor', 'Minify.minify/index');

		$this->response->statusCode('304');
		exit;
	}

}
?>