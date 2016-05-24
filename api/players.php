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
  $players = array();
  while ($row = $result->fetch_assoc()) {
    array_push($players, $row);
  }
  $output->data = $players;
}

echo json_encode($output);

?>