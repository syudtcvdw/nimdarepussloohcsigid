<?php

/**
 * Preserves the text supplied in HTML inputs
 * @param $key
 * @return string
 */
function preserveInputs($key) {
  return isset($_REQUEST[$key]) ? htmlspecialchars($_REQUEST[$key]) : '';
}

/**
 * Redirects to supplied uri
 * @param $uri
 */
function redirect($uri) {
    echo '<script>window.location="' . PROJECT_PATH . $uri . '"</script>';
    die();
}


/**
 * Hash a password using PASSWORD_BCRYPT default algorithm
 * @param $password
 * @param int $algorithm
 * @return bool|string
 */
function hash($password, $algorithm=PASSWORD_BCRYPT) {
  return password_hash($password, $algorithm);
}

/**
 * Verifies hashed password
 * @param $password
 * @param $hash
 * @return bool
 */
function verify_hash($password, $hash) {
  return password_verify($password, $hash);
}