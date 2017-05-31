<?php

function preserveInputs($key) {
  return isset($_REQUEST[$key]) ? htmlspecialchars($_REQUEST[$key]) : '';
}