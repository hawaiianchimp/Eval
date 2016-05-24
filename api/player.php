<?php

include '../inc/db.php';

$firstname = mysql_real_escape_string($_GET['firstname']);
$lastname = mysql_real_escape_string($_GET['lastname']);
$birthdate = mysql_real_escape_string($_GET['birthdate']);
$age = mysql_real_escape_string($_GET['age']);

$output = new stdClass();
$error = new stdClass();
$error->count = 0;

if (!$firstname) {
  $error->message = 'First name is required';
  $error->count++;
} else if (!$lastname) {
  $error->message = 'Last name is required';
  $error->count++;
} else if (!$birthdate) {
  $error->message = 'Birthdate is required';
  $error->count++;
} else if (!$age) {
  $error->message = 'Age is required';
  $error->count++;
}

if ($error->count === 0) {
  $sql = 'INSERT INTO players (firstname, lastname, birthdate, age)
        VALUES ('.$firstname.', '.$lastname.', '.$birthdate.', '.$age.');';

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