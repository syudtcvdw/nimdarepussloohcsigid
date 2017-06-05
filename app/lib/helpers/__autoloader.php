<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 5/28/17
 * Time: 9:10 AM
 */

spl_autoload_register(function($className){
  $className = preg_replace('/\\\/', DIRECTORY_SEPARATOR, $className);
  require_once __DIR__ . '/../../../' . strtolower($className) . '.php';
});