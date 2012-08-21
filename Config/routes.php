<?php
/**
 * Routes configuration
 *
 * These need to have -js and -css post-fixes because of YUI. In the YUI loader setup, it realizes that
 * there are two different URL's, one for js modules, one for css modules.
 * It will call the appropriate url depending on what assets we're calling in our YUI Loader.
 * If we only had one URL, YUI would try to concatenate JS and CSS files into one HTTP request which would break everything
 */
	Router::connect('/min-js', array('plugin' => 'Minify', 'controller' => 'minify', 'action' => 'index', 'js'));
	Router::connect('/min-css', array('plugin' => 'Minify', 'controller' => 'minify', 'action' => 'index', 'css'));