<?php

/**
 * Created by PhpStorm.
 * User: victor
 * Date: 5/28/17
 * Time: 9:11 AM
 */

namespace App\Models;

use App\Core\Model;
use App\Lib\Session;

class UserModel extends Model
{

  /*public $id;
  public $username;
  public $password;
  public $firstname;
  public $lastname;*/
  private $userTableName;

  public function __construct($data=null)
  {
    parent::__construct();
    $this->userTableName = "test";
    if ( !empty($data) )
      foreach ( $data as $key => $value )
        if ( !empty($value) )
          $this->{$key} = $value;
  }

  public function login()
  {
    if ( $this->userExists() ) {
      Session::set("loggedIn", true);
      return true;
    }
    return false;
  }

  public function register()
  {
    if ( !$this->userExists() ) {
      $insertId = $this->db->insert($this->userTableName, ["firstname"=>$this->firstname, "lastname"=>$this->lastname,
          "username"=>$this->username, "password"=>password_hash($this->password, PASSWORD_BCRYPT)]);
      if ( $insertId ) {
        $this->id = $insertId;
        return true;
      }
    }
    return false;
  }


  public function logout($redirect="")
  {
    Session::destroy();
    header("Location: ". PROJECT_PATH . $redirect);
  }

  public function userExists()
  {
    $result = $this->db->query("SELECT password FROM " . $this->userTableName . " WHERE username=:username", ["username"=>$this->username]);
    return ( $result->rowCount() > 0 ) ?
      password_verify($this->password, $result->fetch(\PDO::FETCH_ASSOC)['password']) : false;
  }

}