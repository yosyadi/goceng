<?php
$host 		= "localhost";
$username 	= "root";
$password 	= "";
$dbname 	= "goceng";

// $username 	= "d14495666_gocengtp";
// $password 	= "shFf)fGr#IG%63xls5UF";
// $dbname 	= "id14495666_goceng_db";

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error)
{
  die("Connection failed: " . $conn->connect_error);
}

 ?>

