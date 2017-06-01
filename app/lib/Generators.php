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

  /**
   * Generates a random salt
   * @param $name
   * @param int $algorithm
   * @return bool|string
   */
  public static function generateSalt($name, $algorithm = PASSWORD_BCRYPT)
  {
    return password_hash($name, $algorithm);
  }

  /**
   * Verifies a salt
   * @param $name
   * @param $salt
   * @return bool
   */
  public static function verifySalt($name, $salt)
  {
    return password_verify($name, $salt);
  }

}