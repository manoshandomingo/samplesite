<?php
function dbConnect1()
{
 global $db;
 $db_database = "Project_tracker";
 $db_username = "ttUser";
 $db_hostname = "localhost";
 $db_password = "DMF331";

// Cennecting to the database------------------------------//
$db = new mysqli($db_hostname, $db_username, $db_password, $db_database);
if ($db->connect_error){
	$connection = '';
}
else{
	$connection = 'OK';
}
return $connection;
// End of Cennecting to the database------------------------------//
}
?>
