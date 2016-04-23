<?php

include '../inc/db.php';

$bib = $_GET['bib'];
$pid = $_GET['pid'];
$output = new stdClass();
$error = new stdClass();
$error->count = 0;

if (!$pid) {
  $error->message = "No player id provided";
  $error->count++;
} else if (!is_numeric($pid)) {
  $error->message = "Player id needs to be a number";
  $error->count++;
} else if (!$bib) {
  $error->message = "No bib provided";
  $error->count++;
} else if (!is_numeric($bib)) {
  $error->message = "bib need to be numbers";
  $error->count++;
}

if ($error->count === 0) {
  $sql = "UPDATE players
        SET bib = '".$bib."',
        bib_update = NOW()
        WHERE id = ".$pid;

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