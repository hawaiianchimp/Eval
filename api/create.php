<?php

include '../inc/db.php';

$firstname = $mysqli->real_escape_string($_GET['firstname']);
$lastname = $mysqli->real_escape_string($_GET['lastname']);
$birthday = $mysqli->real_escape_string($_GET['birthday']);
$age = $mysqli->real_escape_string($_GET['age']);

$output = new stdClass();
$error = new stdClass();
$error->count = 0;

if (!$firstname) {
  $error->message .= 'First name is required. ';
  $error->count++;
}

if (!$lastname) {
  $error->message .= 'Last name is required. ';
  $error->count++;
}

if (!$birthday) {
  $error->message .= 'Birthday is required. ';
  $error->count++;
}

if (!$age) {
  $error->message .= 'Age is required. ';
  $error->count++;
}

if ($error->count === 0) {
  $sql = 'INSERT INTO players (firstname, lastname, birthday, age)
        VALUES ("'.$firstname.'", "'.$lastname.'", "'.$birthday.'", "'.$age.'");';

  if ($mysqli->query($sql) === true) {
    http_response_code(200);
    $output->status = http_response_code();
    $output->message = 'Update Successful';
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