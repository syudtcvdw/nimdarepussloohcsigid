<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 6/1/17
 * Time: 2:05 PM
 */

namespace App\Lib\Classes;


class Generators
{

  /**
   * Generates a random password
   * @param int $length
   * @return string
   * @internal param $password
   */
  public static function generatePassword($length = 8)
  {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomPassword = '';
    for ($i = 0; $i < $length; $i++)
      $randomPassword .= $characters[rand(0, strlen($characters) - 1)];
    return $randomPassword;
  }

}