<?php

define('TITLE', 'LJFL Eval');





function define_db()
{
    $url = parse_url(getenv("CLEARDB_DATABASE_URL")); //if heroku cleardb credentials are defined

    //Save space if the database is using ClearDB
    if( getenv("CLEARDB_DATABASE_URL") ){
        define('DISABLE_ERRORS', true);
    }

    if(count($url) > 1) {
        define('DBDATABASE', substr($url["path"], 1));      //cleardb database
        define('DBSERVER', $url["host"]); 				    //cleardb host server
        define('DBUSERNAME', $url["user"]);			        //cleardb username
        define('DBPASSWORD', $url["pass"]);                 //cleardb password
    } else if( getenv('C9_USER') ) {
        define('DBDATABASE', 'c9');  			            //c9 Database Name. try 'escan'
        define('DBSERVER', getenv('IP')); 				    //c9 Server. Try 'localhost' or '127.0.0.1'
        define('DBUSERNAME', getenv('C9_USER'));			//c9 Username. Try 'escan'
        define('DBPASSWORD', ''); 			                //c9 Password. Lookup in ESC transition files
    } else {
        define('DBDATABASE', DATABASE);  			        //MySQL Database Name. try 'escan'
        define('DBSERVER', IPADDRESS); 				    //MySQL Server. Try 'localhost' or '127.0.0.1'
        define('DBUSERNAME', USERNAME);			            //MySQL Username. Try 'escan'
        define('DBPASSWORD', PASSWORD); 			            //MySQL Password. Lookup in ESC transition files
    }
}

define_db();

?>