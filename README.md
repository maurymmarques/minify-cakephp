# Minify plugin for CakePHP

This plugin was developed to facilitate Minify use with CakePHP

[Minify](https://github.com/mrclay/minify) is an application that combines multiple CSS or Javascript files, removes unnecessary whitespace and comments, and serves them with gzip encoding and optimal client-side cache headers. 

More info: http://code.google.com/p/minify

For this plugin, the Minify application is inside Vendor

### Version

Written for CakePHP 2.x

### Copyright

Copyright (c) 2011 Maury M. Marques

## Installation

You can install this plugin using Composer, GIT Submodule, GIT Clone or Manually

_[Using [Composer](http://getcomposer.org/)]_

Add the plugin to your project's `composer.json` - something like this:

```javascript
{
  "require": {
    "maurymmarques/minify-plugin": "dev-master"
  },
  "extra": {
		"installer-paths": {
			"app/Plugin/Minify": ["maurymmarques/minify-plugin"]
		}
	}
}
```
Then just run `composer install`

Because this plugin has the type `cakephp-plugin` set in it's own `composer.json`, composer knows to install it inside your `/Plugin` directory, rather than in the usual vendors file.

_[GIT Submodule]_

In your app directory (`app/Plugin`) type:

```bash
git submodule add git://github.com/maurymmarques/minify-cakephp.git Plugin/Minify
git submodule init
git submodule update
```

_[GIT Clone]_

In your plugin directory (`app/Plugin` or `plugins`) type:

```bash
git clone https://github.com/maurymmarques/minify-cakephp.git Minify
```

_[Manual]_

* Download the [Minify archive](https://github.com/maurymmarques/minify-cakephp/archive/master.zip).
* Unzip that download.
* Rename the resulting folder to `Minify`
* Then copy this folder into `app/Plugin/` or `plugins`

## Configuration

Bootstrap the plugin in app/Config/bootstrap.php:

```php
CakePlugin::load(array('Minify' => array('routes' => true)));
```

Set the configuration file in your app/Config/core.php

```php
Configure::write('MinifyAsset', true);
```

If you do not want to use compression, set `false`.

### Note

Create a folder called **"minify"** in `app/tmp/cache` and give it permission to **read** and **write**.

## Usage

Enable the helper using the [plugin syntax](http://book.cakephp.org/2.0/en/appendices/glossary.html#term-plugin-syntax)

```php
class BakeriesController extends AppController {
    public $helpers = array('Minify.Minify');
}
```

This plugin uses [HtmlHelper](http://book.cakephp.org/2.0/en/core-libraries/helpers/html.html), and virtually it works in the same way.

In the view you can use something like:

```php
echo $this->Minify->css(array('default', 'global'));
echo $this->Minify->script(array('jquery', 'interface'));
```
