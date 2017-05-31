<?php

/**
 * Created by PhpStorm.
 * User: victor
 * Date: 5/28/17
 * Time: 12:52 PM
 */

use App\Lib\Session;

require_once 'app/lib/config/paths.php';
require_once 'app/lib/config/database.php';
require_once 'app/lib/helpers/functions.php';
require_once 'app/lib/helpers/__autoloader.php';

Session::init();
