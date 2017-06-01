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
    public function __construct()
    {
        parent::__construct();
    }
    /*
     * The function registers new superAdmins
     * */
    public function register($admin_details) {
        $addSuperAdmin = new Admin($admin_details);
        return $addSuperAdmin->register();
    }

    /*Function to view all super Admins in the database*/
    public function viewSuperAdmins() {
        $viewAdmins = new Admin();
        return $viewAdmins ->viewSuperAdmins();
    }

    /*Function to delete a SuperAdmins from Database*/
    public function deleteSuperAdmins($id) {
        $deleteAdmin = new Admin();
        return $deleteAdmin ->deleteSuperAdmins($id);
    }
    /*Update the password of the super Admin*/
    public function updateSuperPassword($id) {
        $passupdate = new Admin();
        return $passupdate ->updateSuperPassword($id);
    }
}
