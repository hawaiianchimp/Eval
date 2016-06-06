<?php

include '../inc/db.php';

$weight = $mysqli->real_escape_string(@round($_GET['weight']));
$height = $mysqli->real_escape_string(@round($_GET['height']));
$pid = $_GET['pid'];
$output = new stdClass();
$error = new stdClass();
$error->count = 0;

if ($pid === '') {
  $error->message = "No player id provided";
  $error->count++;
} else if (!is_numeric($pid) || $pid <= 0) {
  $error->message = "Player id needs to be a number";
  $error->count++;
} else if ($weight === '' && $height === '') {
  $error->message = "No weight or height provided";
  $error->count++;
}

if (is_numeric($weight) && is_numeric($height) && $weight >= 0 && $height >= 0) {
  $sql = "UPDATE players
          SET weight = '".$weight."',
          height = '".$height."',
          stamp_wt = NOW()
          WHERE id = ".$pid;
} else if (is_numeric($height) && $height >= 0) {
  $sql = "UPDATE players
          SET height = '".$height."',
          stamp_wt = NOW()
          WHERE id = ".$pid;
} else if (is_numeric($weight) && $height >= 0) {
  $sql = "UPDATE players
          SET weight = '".$weight."',
          stamp_wt = NOW()
          WHERE id = ".$pid;
} else {
  $error->message = "Height and weight need to be numbers";
  $error->count++;
}

if ($error->count === 0) {

  if ($mysqli->query($sql) === true) {
    http_response_code(200);
    $output->status = http_response_code();
    $output->message = "Update Successful";
    echo json_encode($output);
  } else {
    http_response_code(400);
    $output->status = http_response_code();
    $error->message = $mysqli->error;
    $output->error = $error;
    echo json_encode($output);
  }
} else {
  http_response_code(400);
  $output->status = http_response_code();
  $output->error = $error;
  echo json_encode($output);
}
?>