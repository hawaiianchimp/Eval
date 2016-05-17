<?php

include '../inc/db.php';

$spd1 = round($_GET['spd1'], 1);
$spd2 = round($_GET['spd2'], 1);
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
} else if ($spd1 === '' && $spd2 === '') {
  $error->message = "No spd1 or spd2 provided";
  $error->count++;
}

if (is_numeric($spd1) && is_numeric($spd2) && $spd2 >= 0 && $spd1 >= 0) {
  $sql = "UPDATE players
          SET spd1 = '".$spd1."',
          spd2 = '".$spd2."'
          WHERE id = ".$pid;
} else if (is_numeric($spd2) && $spd2 >= 0) {
  $sql = "UPDATE players
          SET spd2 = '".$spd2."'
          WHERE id = ".$pid;
} else if (is_numeric($spd1) && $spd1 >= 0) {
  $sql = "UPDATE players
          SET spd1 = '".$spd1."'
          WHERE id = ".$pid;
} else {
  $error->message = "spd1 and spd2 need to be numbers";
  $error->count++;
}

if ($error->count === 0) {

  if ($mysqli->query($sql) === true) {
    http_response_code(200);

    $speed = @min(array_filter([$spd1, $spd2]));
    $sql = "UPDATE players
          SET speed = ".$speed."
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