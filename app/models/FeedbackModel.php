<?php
/**
 * @author
 * Created by victor.
 * A.I. engineer & Software developer
 * javafolabi@gmail.com
 * On 05 06, 2017 @ 4:17 PM
 * Copyright victor © 2017. All rights reserved.
 */

namespace app\models;


use App\Core\Model;

class FeedbackModel extends Model
{

  /**
   * FeedbackModel constructor.
   */
  public function __construct()
  {
    parent::__construct();
  }

  /**
   * Returns the feedback status (fresh, treated, closed)
   * @param $id
   * @return bool
   */
  public function getFeedbackStatus($id)
  {
    $result = $this->db->query("SELECT status FROM feedback WHERE id=:id", ["id"=>$id]);
    if ( $result->rowCount() > 0 )
      return $result->fetch(\PDO::FETCH_ASSOC)["status"];
    return "No record";
  }

}