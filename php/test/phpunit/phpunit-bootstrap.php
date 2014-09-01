<?php
$phpunitPath = realpath(dirname(__FILE__) . '/../..');

set_include_path(
    "$phpunitPath/php:" .
    "$phpunitPath/test:" .
    get_include_path()
);

$_SERVER['SRC_ROOT'] = realpath(dirname(__FILE__) . '/../..');

$_SERVER['IN_PHPUNIT'] = "true";

