<?php
App::uses('AppHelper', 'View/Helper');

/**
 * Cakephp view helper to interface with http://code.google.com/p/minify/ project.
 * Minify: Combines, minifies, and caches JavaScript and CSS files on demand to speed up page loads.
 * Requirements:
 * 		An entry in core.php - "MinifyAsset" - value of which is either set 'true' or 'false'.
 * 		False would be usually set during development and/or debugging. True should be set in production mode.
 *
 * @package		app.View.Helper
 */
class MinifyHelper extends AppHelper {

	public $helpers = array('Html');

/**
 * Returns one or many `<script>` tags depending on the number of scripts given.
 *
 * @param string|array $url String or array of javascript files to include
 * @param array|boolean $options Array of options, and html attributes see above. If boolean sets $options['inline'] = value
 * @return mixed String of `<script />` tags or null if $inline is false or if $once is true and the file has been
 *   included before.
 * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/html.html#HtmlHelper::script
 */
	public function script($url, $options = array()) {
		if (Configure::read('MinifyAsset') === true) {
			return $this->Html->script($this->_path($url, 'js'), $options);
		} else {
			return $this->Html->script($url, $options);
		}
	}

/**
 * Creates a link element for CSS stylesheets.
 *
 * @param string|array $path The name of a CSS style sheet or an array containing names of
 *   CSS stylesheets. If `$path` is prefixed with '/', the path will be relative to the webroot
 *   of your application. Otherwise, the path will be relative to your CSS path, usually webroot/css.
 * @param string $rel Rel attribute. Defaults to "stylesheet". If equal to 'import' the stylesheet will be imported.
 * @param array $options Array of HTML attributes.
 * @return string CSS <link /> or <style /> tag, depending on the type of link.
 * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/html.html#HtmlHelper::css
 */
	public function css($path, $rel = null, $options = array()) {
		if (Configure::read('MinifyAsset') === true) {
			return $this->Html->css($this->_path($path, 'css'), $rel, $options);
		} else {
			return $this->Html->css($path, $rel, $options);
		}
	}

/**
 * Build path for minified files
 *
 * @param mixed $assets
 * @param string $ext
 * @return string
 */
	private function _path($assets, $ext) {
		if (!is_array($assets)) {
			$assets = array($assets);
		}

		$path = '/min-' . $ext . '?f=';
		$path .= implode(',', $assets);

		return $path;
	}
}
?>