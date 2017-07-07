<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 5/31/17
 * Time: 5:00 PM
 */

namespace App\Lib\Classes;


class Validators
{

  /**
   * Checks for a valid email (e.g example@domain.com)
   * @param $email
   * @return bool
   */
  public static function validateEmail($email)
  {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
  }

  /**
   * Password Validator ensures password is at least 4 characters long
   * @param $password
   * @return bool
   */
  public static function validatePassword($password)
  {
    return strlen($password) > 3;
  }

  /**
   * Validates that all fields are required
   * @param $data
   * @return array|bool
   */
  public static function validateForm($data)
  {
    $errors = [];
    foreach ($data as $key => $value)
      if (empty($value))
        $errors[$key] = "Field is required";
    return empty($errors) ? false : $errors;
  }

  /**
   * Checks if there are any empty fields
   * @credit: Victor I. Afolabi
   * @param $data ['username'=>'', 'password'=>''];
   * @return bool
   */
  public static function anyEmpty($data)
  {
    return array_reduce($data,function($carry,$item){
      return $carry || empty($item);
    },false);
  }

}