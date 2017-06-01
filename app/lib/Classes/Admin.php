<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 5/31/17
 * Time: 6:12 PM
 */

namespace App\Lib\Classes;

use App\Core\Classes;
use App\Lib\Classes\Session;

class Admin extends Classes
{

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
     * Registers new administrator
     * @return bool
     */
    public function register()
    {
        if (!$this->__adminExists()) {
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
     * @param string $redirect
     * @return bool
     */
    public function login($redirect = "/")
    {
        if ($this->__adminExists()) {
            Session::set("loggedIn", true);
            header("Location: " . _redirect($redirect));
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
        header("Location: " . _redirect($redirect));
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
