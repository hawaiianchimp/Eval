<?php
echo 'Initializing Setup<br>';
/** Instructions for setup
 *
 * Each page requires at the beginning "require_once 'inc/standard.php';"
 * If you are going to create a new page, be sure to include that at the beginning.
 * The template for every page can be found in the Page.class.php object class.
 * When you create a new Page($name, $access) object, you must specify a $name and $access
 * Access levels can be found in the constants.inc.php.
 * Most of the pages use objects to construct most of the visuals and layouts,
 * so be sure to look into the Classes for clarification.
 *
 *
 *
 **/
require_once 'inc/db.php';

echo '<br>Checking Install<br>';
if (DBDATABASE && DBUSERNAME && DBSERVER) {
  $sql = 'SELECT COUNT( DISTINCT table_name) FROM information_schema.columns WHERE table_schema = "'.DBDATABASE.'";';
  $result = $mysqli->query($sql);
  echo "<br>table count: ".$result->num_rows."<br>";
  if ($result->num_rows === 0) {
    echo '<br>No tables found, creating tables...<br>';
    $sql = explode(';', file_get_contents('inc/setup.sql'));
    echo 'Getting setup.sql<br>';
    foreach ($sql as $row) {
      $short = str_split($row, 100);
      echo 'Running '.$short[0].'...<br>';
      if ($row) {
        $mysqli->query($row);
      }
    }
    echo 'Database finished setup<br>';
  }
  else{
    $message = 'Databases and tables have already been installed.<br>';
    die($message);
  }
} else {
  	$message = 'Please enter in all credentials on the /inc/passwords.php<br>';
  	$message .= "<br>WEBMASTER_USERNAME: ".WEBMASTER_USERNAME."<br>WEBMASTER_EMAIL: ".WEBMASTER_EMAIL."<br>WEBMASTER_PASSWORD: ".WEBMASTER_PASSWORD ."<br>DBDATABASE: ". DBDATABASE ."<br>DBUSERNAME: ". DBUSERNAME ."<br>DBSERVER: ". DBSERVER ."<br>DBPASSWORD: ".DBPASSWORD."<br>";
  	die($message);
}
?>