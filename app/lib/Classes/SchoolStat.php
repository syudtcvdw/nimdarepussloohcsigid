<?php
/**
 * @Author
 * Falua Temitope Oyewole.
 * faluatemitopeo@gmail.com
 * Web Developer
 * Date: 6/3/2017
 */

namespace App\Lib\Classes;

use App\Core\Classes;


class SchoolStat extends Classes
{
    private $id;
    private $uid;
    private $schoolTable;

    /*
     * Constructor for School Statistics
     * */
    public function __construct($data = null)
    {
        parent::__construct();
        $this->schoolTable = "schools";
    }

    /*
     * Get the details of each schools
     * */
    public function getOneSchoolStat($uid) {
        return $this->db->selectAll($this->schoolTable);

    }
}