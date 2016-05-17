<?php

include '../inc/db.php';

$jmp1 = @round($_GET['jmp1'], 1);
$jmp2 = @round($_GET['jmp2'], 1);
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
} else if ($jmp1 === '' && $jmp2 === '') {
  $error->message = "No jmp1 or jmp2 provided";
  $error->count++;
}

if (is_numeric($jmp1) && is_numeric($jmp2) && $jmp2 >= 0 && $spd1 >= 0) {
  $sql = "UPDATE players
          SET jmp1 = ".$jmp1.",
          jmp2 = ".$jmp2."
          WHERE id = ".$pid;
} else if (is_numeric($jmp2) && $jmp2 >= 0) {
  $sql = "UPDATE players
          SET jmp2 = ".$jmp2."
          WHERE id = ".$pid;
} else if (is_numeric($jmp1) && $jmp1 >= 0) {
  $sql = "UPDATE players
          SET jmp1 = ".$jmp1."
          WHERE id = ".$pid;
} else {
  $error->message = "jmp1 and jmp2 need to be numbers";
  $error->count++;
}

if ($error->count === 0) {

  if ($mysqli->query($sql) === true) {
    http_response_code(200);

    $jump = @max([$jmp1, $jmp2]);
    $sql = "UPDATE players
          SET jump = ".$jump."
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