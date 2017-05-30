<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 5/29/17
 * Time: 10:54 AM
 */

namespace App\Models;


use App\Core\Model;
use App\Lib\Session;

class AdminModel extends Model
{

  public $id;
  public $firstName;
  public $lastName;
  public $username;
  public $password;
  private $adminTableName;

  public function __construct($data=null)
  {
    parent::__construct();
    $this->adminTableName = "admin";
    if ( !empty($data) )
      foreach ( $data as $key => $value )
        if ( !empty($value) )
          $this->{$key} = $value;
  }

  public function login()
  {
    if ( $this->adminExists() ) {
      Session::set("admin", true);
      Session::set("adminId", $this->id);
      return true;
    }
    return false;
  }

  public function register()
  {
    if ( !$this->adminExists() ) {
      $insertId = $this->db->insert($this->adminTableName, ["firstname"=>$this->firstName, "lastname"=>$this->lastName,
        "username"=>$this->username, "password"=>$this->password]);
      if ( $insertId ) {
        $this->id = $insertId;
        return true;
      }
    }
    return false;
  }

  public function logout($redirect="admin")
  {
    Session::destroy();
    header("Location: ". PROJECT_PATH . $redirect);
  }

  public function adminExists()
  {
    $result = $this->db->query("SELECT password FROM " . $this->adminTableName . " WHERE username=:username", ["username"=>$this->username]);
    return ( $result->rowCount() > 0 ) ?
      password_verify($this->password, $result->fetch(\PDO::FETCH_ASSOC)['password']) : false;
  }

}