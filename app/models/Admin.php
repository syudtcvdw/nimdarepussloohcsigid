<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 5/31/17
 * Time: 6:12 PM
 */

namespace App\Models;


use App\Core\Model;
use App\Lib\Session;

class Admin extends Model
{

  public $id;
  public $fullname;
  public $email;
  public $password;
  private $adminTableName;

  /**
   * Admin constructor.
   * @param null $data
   */
  public function __construct($data=null)
  {
    parent::__construct();
    $this->adminTableName = "admins";
    if ( !empty($data) )
      foreach ( $data as $key => $value )
        if ( !empty($value) )
          $this->{$key} = $value;
  }

  /**
   * Registers the admin
   * @return bool
   */
  public function register()
  {
    if ( !$this->__adminExists() ) {
      $insertId = $this->db->insert($this->adminTableName, ["fullname"=>$this->fullname, "useremail"=>$this->email, "userpass"=>_hash($this->password, PASSWORD_BCRYPT)]);
      if ( $insertId ) {
        $this->id = $insertId;
        return true;
      }
    }
    return false;
  }


  /**
   * Logs in the admin
   * @return bool
   */
  public function login()
  {
    if ( $this->__adminExists() ) {
      Session::set("loggedIn", true);
      return true;
    }
    return false;
  }

  /**
   * Logs the admin out.
   * @param string $redirect
   */
  public function logout($redirect="")
  {
    Session::destroy();
    header("Location: ". PROJECT_PATH . $redirect);
  }

  /**
   * Checks if an administrator exists
   * @return bool
   */
  public function __adminExists()
  {
    $result = $this->db->query("SELECT userpass FROM " . $this->adminTableName . " WHERE useremail=:useremail", ["useremail"=>$this->email]);
    return ( $result->rowCount() > 0 ) ?
      _verify_hash($this->password, $result->fetch(\PDO::FETCH_ASSOC)['userpass']) : false;
  }
}