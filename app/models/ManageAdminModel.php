<?php
/**
 * Created by PhpStorm.
 * User: EMMATHEM
 * Date: 5/31/2017
 * Time: 7:48 PM
 */

namespace App\Models;


use App\Core\Model;
use App\Lib\Classes\Admin;

class ManageAdminModel extends Model
{
    private $admin;

    /**
     * ManageAdminModel constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->admin = new Admin;
    }

    /**
     * Admin register model
     * @param $admin_details
     * @return bool
     */
    public function register($admin_details)
    {
        $this->admin = new Admin($admin_details);
        return $this->admin->register();
    }

    /**
     * Gets all admins
     * @return bool
     */
    public function getAdmins()
    {
        return $this->admin->getAdmins();
    }

    public function deleteAdmins($id)
    {
        return $this->admin->deleteAdmins($id);
    }

    /**
     * Update Admin entries
     * @param $id
     * @param $newValues
     * @return mixed
     */
    public function updateAdmins($id, $newValues)
    {
        return $this->admin->updateAdmins($id, $newValues);
    }

}
