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
    private $slug;

    /**
     * School Statistics Model Constructor
     * @param string $slug
     */
    public function __construct($slug = '')
    {
        parent::__construct();
        $this->slug = $slug;
        $this->schoolStat = new SchoolStat($this->slug);
    }

    public function getBasicInfo() {
        return $this->schoolStat->getBasicInfo();
    }

}