<?php
/**
 * Filters a request and tests whether it is a file in the webroot folder or not and
 * serves the file to the client if appropriate.
 *
 * @package Vendor.Routing.Filter
 */
class Asset {

/**
 * Builds asset file path based off url
 *
 * @param string $url
 * @return string Absolute path for asset file
 */
	static function getAssetFile($url) {
		$parts = explode('/', $url);
		if ($parts[0] === 'theme') {
			$themeName = $parts[1];
			unset($parts[0], $parts[1]);
			$fileFragment = urldecode(implode(DS, $parts));
			$path = App::themePath($themeName) . 'webroot';
			return array($path, $fileFragment);
		}

		$plugin = Inflector::camelize($parts[0]);
		if (CakePlugin::loaded($plugin)) {
			unset($parts[0]);
			$fileFragment = urldecode(implode(DS, $parts));
			$pluginWebroot = CakePlugin::path($plugin) . 'webroot';
			return array($pluginWebroot, $fileFragment);
		} else {
			return array(WWW_ROOT, $_GET['f']);
		}
	}

}
