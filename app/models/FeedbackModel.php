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
  private $tableName;

  /**
   * FeedbackModel constructor.
   */
  public function __construct()
  {
    parent::__construct();
    $this->tableName = "feedback";
  }

  /**
   * Returns the feedback status (fresh, treated, closed)
   * @param $id
   * @return bool
   */
  public function getFeedbackStatus($id)
  {
    $result = $this->db->query("SELECT status FROM {$this->tableName} WHERE id=:id", ["id"=>$id]);
    if ( $result->rowCount() > 0 )
      return $result->fetch()["status"];
    return "No record";
  }

  /**
   * Gets a set number of feedback
   * @param null $id
   * @param int $limit
   * @return array
   */
  public function getFeedback($id=null, $limit=15)
  {
    if ( !$id )
     return $this->db->selectAll("feedback", $limit);
    $result = $this->db->query("SELECT * FROM {$this->tableName} WHERE id=:id LIMIT = :limit", ["id"=>$id,
      "limit"=>$limit]);
    return $result->rowCount() > 0 ? $result->fetchAll(\PDO::FETCH_ASSOC) : [];
  }

}