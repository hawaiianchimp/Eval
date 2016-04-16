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

?>