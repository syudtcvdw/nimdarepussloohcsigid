<?php
/**
 * Created by PhpStorm.
 * User: tomiiide
 * Date: 6/1/2017
 * Time: 1:48 PM
 */

namespace App\Models;


use App\Core\Model;
use App\Lib\Classes\Database;

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

    public function create()
    {
        $this->date_created = time();
        $this->uID = _generate_id(6);

        while ($this->db->exists($this->uID, 'uid', $this->schoolTable)) $this->uID = _generate_id(6);
        $this->slug = _generate_slug($this->name, $this->schoolTable);
        $this->status = "active";
        $insertID = $this->db->insert($this->schoolTable, ["name" => $this->name,
            "location" => $this->location, "admin_uname" => $this->admin_username,
            "admin_password" => password_hash($this->admin_password, PASSWORD_BCRYPT),
            "date_created" => date("Y-m-d H:i:s", $this->date_created), "uid" => $this->uID,
            "slug" => $this->slug, "status" => $this->status, "s_population" => $this->s_population]);
        if ($insertID) {
            $this->id = $insertID;
            return true;
        }
        return false;
    }

    public function getAllSchools()
    {
        $getAllSchools = $this->db->selectAll($this->schoolTable);
        if (count($getAllSchools) > 0) {
            return $getAllSchools;
        } else {
            return false;
        }
    }

    /**
     * Toggles the status of specified school
     * @param $school_slug
     */
    public function toggleStatus($school_slug) {
        $this->db->query("UPDATE `{$this->schoolTable}` SET `status` = !`status` WHERE `slug` = :slug", [
            'slug' => $school_slug
        ]);
    }
}