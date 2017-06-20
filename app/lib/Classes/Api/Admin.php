<?php
/**
 * @author
 * Created by victor.
 * A.I. engineer & Software developer
 * javafolabi@gmail.com
 * On 02 06, 2017 @ 1:27 PM
 * Copyright victor © 2017. All rights reserved.
 */

namespace App\Lib\Classes\Api;


use app\models\FeedbackModel;

class Admin extends APIAble
{

  /**
   * Generates a random password
   * @param null|API $api
   * @return array|string
   */
  function pwd($api = null)
  {
    if ($api->method !== "GET") return "Admin: Invalid invocation";
    $obj = ['data' => _generate_id()];
    return $obj;
  }

  /**
   * @param null|API $api
   * @return array|string
   */
  function feedback($api = null)
  {
    if (count($api->args) > 0) {
      $id = $api->args[0];
      $feedback = new FeedbackModel;
      switch ($api->method) {
        case "POST":
          if (isset($api->args[1])) {
            $status = $api->args[1];
            if ($feedback->setFeedbackStatus($id, $status)) return ["status" => "success"];
            return [
              "status" => "failed",
              "msg" => "Could not update record."
            ];
          }
          return [
            "status" => "failed",
            "msg" => "Missing param 'status'"
          ];
        case "GET":
          $status = $feedback->getFeedbackStatus($id);
          return [
            "status" => "success",
            "response" => ["id" => $id, "feedback_status" => $status]
          ];
      }
    }
    return [
      "status" => "failed",
      "msg" => "Admin: Missing param 'id'"
    ];
  }
}