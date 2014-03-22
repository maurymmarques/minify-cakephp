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
			$file = '';
			$fileFragments = explode(',', $url);
			$fileNumber = count($fileFragments);
			foreach ($fileFragments as $k => $fileFragment) {
				$fileParts = explode('/', $fileFragment);
				unset($fileParts[0], $fileParts[1]);
				if ($fileNumber == $k+1) {
					$file .= urldecode(implode(DS, $fileParts));
				} else {
					$file .= urldecode(implode(DS, $fileParts)) . ',';
				}
			}
			$themeName = $parts[1];
			$path = Configure::read('App.www_root') . 'theme' . DS . $themeName;
			if (!file_exists($path)) {
				$path = App::themePath($themeName) . 'webroot';
			}
			return array($path, $file);
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
