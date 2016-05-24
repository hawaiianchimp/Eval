<?php

include '../inc/db.php';

$stn = $mysqli->real_escape_string($_GET['stn']);
$stn2 = $mysqli->real_escape_string($_GET['stn2']);
$pid = $mysqli->real_escape_string($_GET['pid']);
$output = new stdClass();
$error = new stdClass();
$error->count = 0;

if ($pid === '') {
  $error->message = "No player id provided";
  $error->count++;
} else if (!is_numeric($pid)) {
  $error->message = "Player id needs to be a number";
  $error->count++;
} else if ($stn === '' && $stn2 === '') {
  $error->message = "No stn try1 or stn try2 provided";
  $error->count++;
}

if (is_numeric($stn) && is_numeric($stn2) && $stn2 >= 0 && $stn >= 0) {
  $sql = "UPDATE players
          SET stn = '".$stn."',
          stn2 = '".$stn2."'
          WHERE id = ".$pid;
} else if (is_numeric($stn2) && $stn2 >= 0) {
  $sql = "UPDATE players
          SET stn2 = '".$stn2."'
          WHERE id = ".$pid;
} else if (is_numeric($stn) && $stn >= 0) {
  $sql = "UPDATE players
          SET stn = '".$stn."',
          end_stamp = NOW()
          WHERE id = ".$pid;
} else {
  $error->message = "stn try1 and stn try2 need to be numbers";
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