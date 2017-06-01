<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 5/31/17
 * Time: 6:12 PM
 */

namespace App\Lib\Classes;

use App\Core\Model;
use App\Lib\Session;

class Admin extends Model
{
    private $adminTableName;

    public function __construct($data=null)
    {
        parent::__construct();
        $this->adminTableName = "admins";
        if ( !empty($data) )
            foreach ( $data as $key => $value )
                if ( !empty($value) )
                    $this->{$key} = $value;
    }

    public function register()
    {
        if ( !$this->__adminExists() ) {
            $insertId = $this->db->insert($this->adminTableName, ["fullname"=>$this->fullname, "useremail"=>$this->useremail, "userpass"=>password_hash($this->userpass, PASSWORD_BCRYPT)]);
            if ($insertId) {
                $this->id = $insertId;
                return true;
            }
        }
        return false;
    }

    public function login()
    {
        if ( $this->__adminExists() ) {
            Session::set("loggedIn", true);
            return true;
        }
        return false;
    }

    public function logout($redirect="")
    {
        Session::destroy();
        header("Location: ". PROJECT_PATH . $redirect);
    }

    public function viewSuperAdmins() {
        $result = $this->db->query("SELECT * FROM " .$this->adminTableName);
        return ( $result->rowCount() > 0 ) ?
            $result->fetchall(\PDO::FETCH_ASSOC) : false;
    }

    private function __adminExists()
    {
        $result = $this->db->query("SELECT userpass FROM " . $this->adminTableName . " WHERE useremail=:useremail", ["useremail"=>$this->useremail]);
        return ( $result->rowCount() > 0 ) ?
            password_verify($this->userpass, $result->fetch(\PDO::FETCH_ASSOC)['userpass']) : false;
    }

}
