<?php

include '../inc/db.php';

$output = new stdClass();

$sql = "SELECT * FROM users";

if (!$result = $mysqli->query($sql)) {
  $output->errno = $mysqli->connect_errno;
  $output->error = $mysqli->connect_error;
}

if ($result->num_rows === 0) {
  console('No rows found', 'error');
  $output->error = 'No Rows';
}

$output->data = [$result->fetch_assoc()];

echo json_encode($output);

?>