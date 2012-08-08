# Minify plugin for CakePHP

Copyright 2012, Maury M. Marques
Licensed under The MIT License
Redistributions of files must retain the above copyright notice.


### Minify

[Minify](https://github.com/mrclay/minify) is an application that combines multiple CSS or Javascript files, removes unnecessary whitespace and comments, and serves them with gzip encoding and optimal client-side cache headers. 

More info: http://code.google.com/p/minify

For this plugin, the application Minify is inside Vendor

### Version

Written for CakePHP 2.0+


### Installation

You can clone the plugin into your project (or if you want you can use as a [submodule](http://help.github.com/submodules)):

```
cd path/to/app/Plugin or /plugins
git clone https://github.com/maurymmarques/minify-cakephp.git Minify
```

Bootstrap the plugin in app/Config/bootstrap.php:

```php
<?php
CakePlugin::load(array('Minify' => array('routes' => true)));
```


### Configuration

Set the configuration file in your app/Config/core.php

```php
<?php
Configure::write('MinifyAsset', true);
```

If you do not want to use compression, set false.

### Note

Create a folder called **"minify"** in `app/tmp/cache` and give permission to **read** and **write**.

### Usage

Enable the helper using the [plugin syntax](http://book.cakephp.org/2.0/en/appendices/glossary.html#term-plugin-syntax)

```php
<?php
class BakeriesController extends AppController {
    public $helpers = array('Minify.Minify');
}
```

This plugin uses [HtmlHelper](http://book.cakephp.org/2.0/en/core-libraries/helpers/html.html), and works virtually the same.

In the view you can use something like:

```php
<?php
echo $this->Minify->css(array('default', 'global'));
echo $this->Minify->script(array('jquery', 'interface'));
```