<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 5/28/17
 * Time: 1:19 PM
 */

#!- read config.ini
$ini = parse_ini_file(__DIR__ . '/../../config.ini');

# path config
define('DOC_ROOT', $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR);
define('PROJECT_PATH', $ini['project_path']);
define('APP_ROOT', __DIR__ . '/../../');
define('ASSET_PATH', PROJECT_PATH . 'assets/');
define('VIEW_PATH', APP_ROOT . 'views/');
define('LAYOUT_PATH', VIEW_PATH . '_layouts/');
define('VIEW_INCLUDE_PATH', VIEW_PATH . '_includes/');
