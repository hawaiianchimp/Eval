<?php

/**
 * Print to errors to the console
 * @param $data {Array|String}
 * @param $type {String} debug, error, log, info
 **/
function console($data, $type='log') {

  if (is_array($data))
      $output = "<script>console.".$type."( 'Debug Objects: " . implode( ',', $data) . "' );</script>";
  else
      $output = "<script>console.".$type."( 'Debug Objects: " . $data . "' );</script>";

  echo $output;
}

/**
 * Get the age from birthdate
 * @param $birthdate {Date}
 **/
function getAge($birthdate) {
    $then = date('Ymd', strtotime($birthdate));
    $diff = date('Ymd') - $then;
    return substr($diff, 0, -4);
}


/**
 * Display 3 digit numbers
 * @param $number {Number}
 **/
function tripleDigit($number) {
    return sprintf("%'.03d", $number);
}


?>