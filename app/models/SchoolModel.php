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
        public $admin_username;
        public $admin_password;
        public $s_population;
        public $date_created;
        private $schoolTable;
        public $uID;

        public function __construct($data = null)
        {
            parent::__construct();
            $this->schoolTable = 'schools';
            $this->generateSchoolID();
            if ( !empty($data) ) {
                foreach ($data as $key => $value)
                    if (!empty($value))
                        $this->{$key} = $value;
            }
            return $this;
        }

        public function create(){
            $this->date_created = time();
            $this->uID = _generate_id(6);
            $insertID = $this->db->insert($this->schoolTable, [ "name"=>$this->name,
                "location"=>$this->location, "admin_uname" => $this->admin_username,
                "admin_password" => password_hash($this->admin_password,PASSWORD_BCRYPT),
                "date_created" => date("Y-m-d H:i:s",$this->date_created),"uid" => $this->uID]);
            if($insertID){
                $this->id = $insertID;
                return true;
            }
            return false;
        }
}