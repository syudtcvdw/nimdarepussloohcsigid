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