<?php

include '../inc/db.php';

$lp1 = @round($_GET['lp1'], 1);
$lp2 = @round($_GET['lp2'], 1);
$pid = $_GET['pid'];
$output = new stdClass();
$error = new stdClass();
$error->count = 0;

if ($pid === '') {
  $error->message = "No player id provided";
  $error->count++;
} else if (!is_numeric($pid)) {
  $error->message = "Player id needs to be a number";
  $error->count++;
} else if ($lp1 === '' && $lp2 === '') {
  $error->message = "No leap 1 or leap 2 provided";
  $error->count++;
}

if (is_numeric($lp1) && is_numeric($lp2) && $lp2 >= 0 && $lp1 >= 0) {
  $sql = "UPDATE players
          SET lp1 = '".$lp1."',
          lp2 = '".$lp2."'
          WHERE id = ".$pid;
} else if (is_numeric($lp2) && $lp2 >= 0) {
  $sql = "UPDATE players
          SET lp2 = '".$lp2."'
          WHERE id = ".$pid;
} else if (is_numeric($lp1) && $lp1 >= 0) {
  $sql = "UPDATE players
          SET lp1 = '".$lp1."'
          WHERE id = ".$pid;
} else {
  $error->message = "leap 1 and leap 2 need to be numbers";
  $error->count++;
}

if ($error->count === 0) {

  if ($mysqli->query($sql) === true) {
    http_response_code(200);

    $leap = @max([$lp1, $lp2]);
    $sql = "UPDATE players
          SET leap = ".$leap."
          WHERE id = ".$pid;
    $mysqli->query($sql);

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