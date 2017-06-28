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
  public $slug;
  public $uID;
  public $status;

  /**
   * SchoolModel constructor.
   * @param null $data
   */
  public function __construct($data = null)
  {
    parent::__construct();
    $this->schoolTable = 'schools';

    if (!empty($data)) {
      foreach ($data as $key => $value)
        if (!empty($value))
          $this->{$key} = $value;
    }
    return $this;
  }

  /**
   * Creates a new school
   * @return bool
   */
  public function create()
  {
    $this->date_created = time();
    $this->uID = _generate_id(6);

    while ($this->db->exists($this->uID, 'uid', $this->schoolTable)) $this->uID = _generate_id(6);
    $this->slug = _generate_slug($this->name, $this->schoolTable);
    $this->status = "active";
    $insertID = $this->db->insert($this->schoolTable, ["name" => $this->name,
      "location" => $this->location, "admin_uname" => $this->admin_username,
      "admin_password" => _hash($this->admin_password),
      "date_created" => date("Y-m-d H:i:s", $this->date_created), "uid" => $this->uID,
      "slug" => $this->slug, "status" => $this->status, "s_population" => $this->s_population]);
    if ($insertID) {
      $this->id = $insertID;
      return true;
    }
    return false;
  }

  /**
   * Returns list of all schools
   * @return array|bool
   */
  public function getAllSchools()
  {
    $getAllSchools = $this->db->selectAll($this->schoolTable);
    if (count($getAllSchools) > 0) {
      return $getAllSchools;
    }
    return false;
  }

  /**
   * Returns school information
   * @credit: Victor I. Afolabi
   * @param $fields array
   * @return array|bool
   */
  public function getSchoolInfo($fields)
  {
    if ( $this->verifyAdmin() ) {
      $fields = implode(", ", $fields);
      $stmt = $this->db->query("SELECT {$fields} FROM {$this->schoolTable} WHERE admin_uname=:admin_uname", ["admin_uname" => $this->admin_username]);
      return $stmt->rowCount() ? $stmt->fetchAll()[0] : false;
    }
    return false;
  }

  /**
   * Toggles the status of specified school
   * @param $school_slug
   */
  public function toggleStatus($school_slug)
  {
    $this->db->query("UPDATE `{$this->schoolTable}` SET `status` = !`status` WHERE `slug` = :slug",
      ['slug' => $school_slug]);
  }

  public function verifyAdmin()
  {
    $stmt = $this->db->query("SELECT admin_password FROM {$this->schoolTable} WHERE admin_uname=:admin_uname", ["admin_uname" => $this->admin_username]);
    $password = $stmt->fetch()->admin_password;
    return _verify_hash($this->admin_password, $password);
  }

}