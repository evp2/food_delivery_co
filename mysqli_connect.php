<?php
// Opens a connection to the database
// Since it is a php file it won't open in a browser
// It should be saved outside of the main web documents folder
// and imported when needed


// Defined as constants so that they can't be changed
DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', 'pwdpwd');//<------------ use your password
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'dd_database');//<----------- use the database name you created student table in

// $dbc will contain a resource link to the database
// @ keeps the error from showing in the browser

$dbc1 = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
OR die(mysqli_connect_error() .
    'Could not connect to MySQL: ');
 ?>