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
    private $slug;
    private $schoolTable;

    /*
     * Constructor for School Statistics
     * */
    public function __construct($slug)
    {
        parent::__construct();
        $this->slug = $slug;
        $this->schoolTable = "schools";
    }

    /**
     * Get this school's basic info
     */
    public function getBasicInfo() {
        $q = $this->db->query("SELECT * FROM `{$this->schoolTable}` WHERE `slug` = :slug LIMIT 1", ['slug' => $this->slug]);
        return $q->fetch(\PDO::FETCH_ASSOC);
    }
}