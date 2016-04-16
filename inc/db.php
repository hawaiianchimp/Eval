<?php
include 'passwords.php';
include 'setup.php';
include 'helpers.php';

$mysqli = new mysqli(DBSERVER, DBUSERNAME, DBPASSWORD, DBDATABASE);

$output = new stdClass();

if ($mysqli->connect_errno) {
    $output->error = $mysqli->connect_errno;
}
?>