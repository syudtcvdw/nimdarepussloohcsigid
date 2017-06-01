<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 6/1/17
 * Time: 2:05 PM
 */

namespace App\Lib;


class Generators
{

  /**
   * Generates a random password
   * @return string
   * @internal param $password
   */
  public static function generatePassword() {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomPassword = '';
    for ($i = 0; $i < 8; $i++)
      $randomPassword .= $characters(rand(0, strlen($characters) - 1));
    return $randomPassword;
  }

}