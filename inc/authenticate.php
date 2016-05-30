<?php
  session_start();
  require_once 'setup.php';

  //Set the timeout to 60 minutes
  if ($_SESSION['timeout'] + 60 * 60 < time()) {
    $err = 'Session timedout';
    session_unset();
  }

  $_SESSION['timeout'] = time();

  if ($_POST['action']) {
    if ($_POST['username'] === ADMIN_USERNAME && $_POST['psswrd'] === ADMIN_PASSWORD) {
      $_SESSION['loggedin'] = true;
      $_SESSION['access'] = ADMIN_USERNAME;
    } else if ($_POST['username'] === VOLUNTEER_USERNAME && $_POST['psswrd'] === VOLUNTEER_PASSWORD) {
      $_SESSION['loggedin'] = true;
      $_SESSION['access'] = VOLUNTEER_USERNAME;
    } else if ($_POST['username'] === COACH_USERNAME && $_POST['psswrd'] === COACH_PASSWORD) {
      $_SESSION['loggedin'] = true;
      $_SESSION['access'] = COACH_USERNAME;
    }
  }
  if (!$_SESSION['loggedin']) {
    if ($_POST) {
      $err = 'Bad Login';
    }
    require_once 'login.php';
    die;
  }
  if (!in_array($_SESSION['access'], $ACCESS)) {
    $err = 'You do not have access to this page. Please login with the correct user.';
    require_once 'login.php';
    die;
  }
?>