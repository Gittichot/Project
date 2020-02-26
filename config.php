<?php
date_default_timezone_set("Asia/Bangkok");


// Always provide a TRAILING SLASH (/) AFTER A PATH
define('URL', 'http://localhost/Project/');

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__FILE__));
define('WWW_PATH', ROOT . DS );

define('CSS', URL . 'public/css/');
define('JS', URL . 'public/js/');
define('IMAGES', URL . 'public/images/');
define('PLUGINS', URL . 'public/plugins/');

include('condb.php');