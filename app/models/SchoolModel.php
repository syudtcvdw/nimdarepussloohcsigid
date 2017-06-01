<?php
/**
 * Created by PhpStorm.
 * User: tomiiide
 * Date: 6/1/2017
 * Time: 1:48 PM
 */

namespace App\Models;


use App\Core\Model;

class SchoolModel extends Model
{
        public $id;
        public $name;
        public $location;
        public $status;
        public $admin_uname;
        public $admin_password;
        public $s_population;
        public $date_created;

        public function __construct($data)
        {
            parent::__construct();
            $this->schoolTable = 'schools';

        }

        public function register(){
            $insertID = $this->db->insert($this->schoolTable, [ "name"=>$this->name,
                "location"=>$this->location, "status" => $this->status, "admin_uname" => $this->admin_uname,
                "admin_password" => password_hash($this->admin_password,PASSWORD_BCRYPT),
                "date_created" => ]);
        }
}