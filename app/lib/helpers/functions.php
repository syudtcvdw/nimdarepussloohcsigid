<?php
/**
 * Contains boilerplate functions universally available in the framework
 */

/**
 * Preserves the text supplied in HTML inputs
 * @param $key
 * @return string
 */
function _preserveInputs($key)
{
    return isset($_REQUEST[$key]) ? htmlspecialchars($_REQUEST[$key]) : '';
}

/**
 * Preserve the state of a checkbox
 * @param $key
 * @return string
 */
function _preserveCheckBox($key)
{
    return isset($_POST[$key]) ? "checked" : "";
}

/**
 * Redirects to supplied uri
 * @param $uri
 */
function _redirect($uri)
{
    echo '<script>document.title = "Redirecting..."; window.location="' . PROJECT_PATH . $uri . '"</script>';
    die();
}


/**
 * Hash a password using PASSWORD_BCRYPT default algorithm
 * @param $password
 * @param int $algorithm
 * @return bool|string
 */
function _hash($password, $algorithm = PASSWORD_BCRYPT)
{
    return password_hash($password, $algorithm);
}


/**
 * Verifies hashed password
 * @param $password
 * @param $hash
 * @return bool
 */
function _verify_hash($password, $hash)
{
    return password_verify($password, $hash);
}

/**
 * Generates random mixed case string
 * @param $length
 * @return string
 */
function _generate_id($length = 8)
{
    $chars = array_merge(range('A', 'Z'), range(0, 9), range('a', 'z'));
    shuffle($chars);
    if ($length > count($chars)) $length = count($chars);
    return implode(array_slice($chars, 0, $length));
}

/**
 * Redirects unlogged visitors to login, does the reverse [on /login] when $protected is false
 * @param bool $protected
 */
function _logged_only($protected = true)
{
    if (!\App\Lib\Classes\Session::get("adminSalt")) _redirect("login");
}

/**
 * Generates a random salt
 * @param $name
 * @param int $algorithm
 * @return bool|string
 */
function _generate_salt($name, $algorithm = PASSWORD_BCRYPT)
{
    return _hash($name, $algorithm);
}

/**
 * Verifies a salt
 * @param $name
 * @param $salt
 * @return bool
 */
function _verify_salt($name, $salt)
{
    return password_verify($name, $salt);
}

/**
 * Generates a unique slug for a specified table; assumes the `slug` column exists
 * @credit Banjo Mofesola Paul
 * @param  string $string The string to slug
 * @param  string [$check_table = ''] The database table to check in
 * @return string
 */
function _generate_slug($string, $check_table = '', $check_col = 'slug')
{
    #!- regex
    $s = array('/[^A-Za-z0-9\s]/', '/\s+/');
    $r = array('-', '-');

    #!- initial slug
    $pregged = preg_replace($s, $r, strtolower($string));
    $pregged = preg_replace('/\-+/', '-', $pregged);
    $slug = $s = substr($pregged, 0, 30);

    #!- clean up
    if ($check_table != '') {
        $db = new \App\Lib\Classes\Database();
        while ($db->exists($slug, $check_col, $check_table)) $slug = $s . '-' . rand(0, 999);
    }

    return $slug;
}

/**
 * Cleans up dashes(-) in the controller/method names
 * @param $subject
 * @return mixed
 */
function _cleanUpDashes($subject)
{
    return str_replace("-", "", $subject);
}