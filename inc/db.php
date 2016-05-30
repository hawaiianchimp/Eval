<?php
  /**
   * Include this file to setup a database connection
   **/

  require_once 'passwords.php';
  require_once 'helpers.php';

  /**
   * Define the database depending on which mysql server is running
   *
   **/
  function define_db() {
    $url = parse_url(getenv("CLEARDB_DATABASE_URL")); //if heroku cleardb credentials are defined

    if (count($url) > 1) {
      define('DBDATABASE', substr($url["path"], 1));  //cleardb database
      define('DBSERVER', $url["host"]); 				      //cleardb host server
      define('DBUSERNAME', $url["user"]);			        //cleardb username
      define('DBPASSWORD', $url["pass"]);             //cleardb password
    } else if (getenv('C9_USER')) {
      define('DBDATABASE', 'c9');  			              //c9 Database Name
      define('DBSERVER', getenv('IP')); 				      //c9 Server
      define('DBUSERNAME', getenv('C9_USER'));			  //c9 Username
      define('DBPASSWORD', ''); 			                //c9 Password
    } else {
      define('DBDATABASE', DATABASE);  			          //MySQL Database Name
      define('DBSERVER', IPADDRESS); 				          //MySQL Server
      define('DBUSERNAME', USERNAME);			            //MySQL Username
      define('DBPASSWORD', PASSWORD); 			          //MySQL Password
    }
  }

  define_db();

  $mysqli = new mysqli(DBSERVER, DBUSERNAME, DBPASSWORD, DBDATABASE);

  if ($mysqli->connect_errno) {
    $output = new stdClass();
    $output->error = $mysqli->connect_error;
    die("Error: ".$output->error);
  }
?>