<?php
/**
 * @author
 * Created by victor.
 * A.I. engineer & Software developer
 * javafolabi@gmail.com
 * On 05 06, 2017 @ 4:17 PM
 * Copyright victor © 2017. All rights reserved.
 */

namespace App\Models;


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
    $result = $this->db->query("SELECT status FROM {$this->tableName} WHERE id=:id", ["id" => $id]);
    if ($result->rowCount() > 0)
      return $result->fetch()["status"];
    return "No record";
  }

  public function setFeedbackStatus($id, $status="treated")
  {
    return $this->db->update($this->tableName, $id, ["status" => $status]);
  }

  /**
   * Gets a set number of feedback
   * @param null $id
   * @param int $limit
   * @return array
   */
  public function getFeedback($id = null, $limit = 5)
  {
    if (!$id) {
      $query = "SELECT {$this->tableName}.id, {$this->tableName}.body, {$this->tableName}.status, schools.name AS 
school_name FROM {$this->tableName} INNER JOIN schools ON {$this->tableName}.school_id = schools.id ORDER BY {$this->tableName
}.id ASC LIMIT {$limit}";
      $result = $this->db->query($query, ["limit" => $limit]);
    } else {
      $query = "SELECT {$this->tableName}.id, {$this->tableName}.body, {$this->tableName}.status, schools.name AS school_name 
FROM {$this->tableName} INNER JOIN schools ON {$this->tableName}.school_id = schools.id WHERE id=:id ORDER BY {$this->tableName}.id ASC LIMIT {$limit}";
      $result = $this->db->query($query, ["id" => $id, "limit" => $limit]);
    }
    return $result->rowCount() > 0 ? $result->fetchAll() : [];
  }

}