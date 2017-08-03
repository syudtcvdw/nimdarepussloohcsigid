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
   * Add new feedback
   * @credit: Victor I. Afolabi
   * @param array
   * @return bool
   */
  public function add($data)
  {
    // insert into db
    $insId = $this->db->insert($this->tableName, $data);
    // check for insert error
    return ($insId) ? true : false;
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
      return $result->fetch()->status;
    return false;
  }

  public function setFeedbackStatus($id, $status = "treated")
  {
    $result = $this->db->query("SELECT id FROM {$this->tableName} WHERE id=:id", ["id" => $id]);
    if ($result->rowCount() > 0)
      return $this->db->update($this->tableName, $id, ["status" => $status]);
    return false;
  }

  /**
   * Gets a set number of feedback, applying specified offset
   * @param null $id
   * @param int $limit
   * @param int $offset
   * @return array
   */
  public function getFeedback($id = null, $limit = 5, $offset = 0)
  {
    if (!$id) {
      $query = <<<EOT
        SELECT {$this->tableName}.id, {$this->tableName}.body, {$this->tableName}.status, schools.name AS
        school_name FROM {$this->tableName} INNER JOIN schools ON {$this->tableName}.school_id = schools.id 
        ORDER BY {$this->tableName}.id ASC LIMIT {$offset},{$limit}
EOT;
      $bindings = ["limit" => $limit];
    }
    else {
      $query = <<<EOT
        SELECT {$this->tableName}.id, {$this->tableName}.body, {$this->tableName}.status, schools.name AS 
        school_name FROM {$this->tableName} INNER JOIN schools ON {$this->tableName}.school_id = schools.id 
        WHERE id=:id ORDER BY {$this->tableName}.id ASC LIMIT {$offset},{$limit}
EOT;
      $bindings = ["id" => $id, "limit" => $limit];
    }

    $result = $this->db->query($query, $bindings);
    return $result->rowCount() > 0 ? $result->fetchAll() : [];
  }

}