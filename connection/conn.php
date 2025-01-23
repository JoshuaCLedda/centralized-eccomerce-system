<?php 

$host 		= 'localhost';
$user_name 	= 'root';
$passwd 	= '';
$schema 	= 'atbi';
$db 		= mysqli_connect($host,$user_name,$passwd,$schema);

if ($db) {
	// echo "connected!";
	// die();
}else{
	echo "not connected!";
	die();
}

?>