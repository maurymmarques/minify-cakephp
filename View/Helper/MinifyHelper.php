<?php
App::uses('AppHelper', 'View/Helper');

/**
 * Cakephp view helper to interface with http://code.google.com/p/minify/ project.
 * Minify: Combines, minifies, and caches JavaScript and CSS files on demand to speed up page loads.
 * Requirements:
 * 		An entry in core.php - "MinifyAsset" - value of which is either set 'true' or 'false'.
 * 		False would be usually set during development and/or debugging. True should be set in production mode.
 * @package		app.View.Helper
 */
class MinifyHelper extends AppHelper {

	public $helpers = array('Html');

	public function script($url, $options = array()) {
		if (Configure::read('MinifyAsset') === true) {
			return $this->Html->script($this->_path($url, 'js'), $options);
		} else {
			return $this->Html->script($url, $options);
		}
	}

	public function css($path, $rel = null, $options = array()) {
		if (Configure::read('MinifyAsset') === true) {
			return $this->Html->css($this->_path($path, 'css'), $rel, $options);
		} else {
			return $this->Html->css($path, $rel, $options);
		}
	}

	public function _path($assets, $ext) {
		if (!is_array($assets)) {
			$assets = array($assets);
		}

		$path = '/min-' . $ext . '?f=';

		foreach ($assets as $asset) {
			$path .= ($ext . '/' . $asset . '.' . $ext . ',');
		}

		return substr($path, 0, count($path) - 2);
	}
}

?>