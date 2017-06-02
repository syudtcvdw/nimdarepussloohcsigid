<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 5/31/17
 * Time: 6:12 PM
 */

namespace App\Lib\Classes;

use App\Core\Classes;


class Admin extends Classes
{

  private $id;
  private $fullname;
  private $useremail;
  private $userpass;
  private $adminTableName;

  /**
   * Admin constructor.
   * @param null $data
   */
  public function __construct($data = null)
  {
    parent::__construct();
    $this->adminTableName = "admins";
    if (!empty($data))
      foreach ($data as $key => $value)
        if (!empty($value))
          $this->{$key} = $value;
  }

  /**
   * Check if an admin is logged in
   * @return bool
   */
  public static function isLoggedIn()
  {
    return Cookie::get("adminSalt") ? true : Session::get("loggedIn");
  }

  /**
   * Retrieves the logged in admin's salt
   * @return bool
   */
  public static function getLoggedInAdmin()
  {
    return Cookie::get("adminSalt") ? Cookie::get("adminSalt") : Session::get("adminSalt");
  }

  /**
   * Registers new administrator
   * @return bool
   */
  public function register()
  {
    if (!$this->isAdminRegistered($this->useremail)) {
      $insertId = $this->db->insert($this->adminTableName, ["fullname" => $this->fullname, "useremail" => $this->useremail, "userpass" => _hash($this->userpass, PASSWORD_BCRYPT)]);
      if ($insertId) {
        $this->id = $insertId;
        return true;
      }
    }
    return false;
  }

  /**
   * Logs the admin in
   * option of staying logged in up to 3 months
   * @param string $redirect
   * @param bool $rememberMe
   * @return bool
   */
  public function login($redirect = "/", $rememberMe = false)
  {
    if ($this->__adminExists()) {
      Session::set("loggedIn", true);
      Session::set("adminSalt", Generators::generateSalt($this->useremail));
      if ($rememberMe) // sets a cookie for period of 3 months
        Cookie::set("adminId", $this->id, Cookie::EXPIRE_THREE_MONTH);
      _redirect($redirect);
    }
    return false;
  }

  /**
   * Logs the Admin out
   * @param string $redirect
   */
  public function logout($redirect = "/")
  {
    Session::destroy();
    Cookie::destroy("adminId");
    _redirect($redirect);
  }

  /**
   * Returns the list of all admins in the db
   * @return array
   */
  public function getAdmins()
  {
    return $this->db->selectAll($this->adminTableName);
  }

  /**
   * Deletes an administrator
   * @param $id
   * @return bool|\PDOStatement
   */
  public function deleteAdmins($id)
  {
    return $this->db->delete($this->adminTableName, $id);
  }

  /**
   * Updates admin entry
   * @param $id
   * @param $newValues
   * @return bool|\PDOStatement
   */
  public function updateAdmins($id, $newValues)
  {
    return $this->db->update($this->adminTableName, $id, $newValues);
  }

  public function isAdminRegistered($adminEmail) {
    $result = $this->db->query("SELECT id FROM " . $this->adminTableName . " WHERE useremail=:useremail",
      ["useremail"=>$adminEmail]);
    return $result->rowCount() > 0;
  }

  /**
   * Checks if an admin exists
   * @return bool
   */
  private function __adminExists()
  {
    $result = $this->db->query("SELECT userpass FROM " . $this->adminTableName . " WHERE useremail=:useremail", ["useremail" => $this->useremail]);
    return ($result->rowCount() > 0) ?
      _verify_hash($this->userpass, $result->fetch(\PDO::FETCH_ASSOC)['userpass']) : false;
  }

}
