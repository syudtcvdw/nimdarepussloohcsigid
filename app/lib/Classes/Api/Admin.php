<?php
/**
 * @author
 * Created by victor.
 * A.I. engineer & Software developer
 * javafolabi@gmail.com
 * On 02 06, 2017 @ 1:27 PM
 * Copyright victor © 2017. All rights reserved.
 */

namespace App\Lib\Classes\Api;



class Admin extends APIAble
{

    /**
     * Generates a random password
     * @param null|API $api
     * @return array|string
     */
    function pwd($api = null) {
        if ($api->method !== "GET") return "Admin: Invalid invocation";
        $obj = [ 'data' => _generate_id() ];
        return $obj;
    }
}