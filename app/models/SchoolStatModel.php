<?php
/**
 * @Author
 * Falua Temitope Oyewole.
 * faluatemitopeo@gmail.com
 * Web Developer
 * Date: 6/3/2017
 */

namespace App\Models;

use App\Core\Model;
use App\Lib\Classes\SchoolStat;

class SchoolStatModel extends Model
{
    private $schoolStat;

    /**
     * School Statistics Model Constructor
     */

    public function __construct()
    {
        parent::__construct();
        $this->schoolStat = new SchoolStat;
    }

    public function getOneSchoolStat() {
        return $this->schoolStat->getOneSchoolStat();
    }

}