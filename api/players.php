<?php

include '../inc/db.php';

$output = new stdClass();

$sql = "SELECT * FROM players";

if (!$result = $mysqli->query($sql)) {
  $output->errno = $mysqli->connect_errno;
  $output->error = $mysqli->connect_error;
} else if ($result->num_rows === 0) {
  console('No rows found', 'error');
  $output->error = 'No Rows';
} else {
  $players = $result->fetch_all(MYSQLI_ASSOC);
  $output->data = $players;
}

echo json_encode($output);

?>