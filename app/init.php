<?php

/**
 * Created by PhpStorm.
 * User: victor
 * Date: 5/28/17
 * Time: 12:52 PM
 */

use App\Lib\Classes\Session;

require_once __DIR__ . '/../app/lib/config/consts.php';
require_once __DIR__ . '/../app/lib/config/paths.php';
require_once __DIR__ . '/../app/lib/config/database.php';
require_once __DIR__ . '/../app/lib/helpers/functions.php';
require_once __DIR__ . '/../app/lib/helpers/__autoloader.php';

Session::init();
