<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cumintec_leaves";
$actual_link = "http://$_SERVER[HTTP_HOST]/#";

// create connection
$connect = new mysqli($servername, $username, $password, $dbname);

// check connection 
if($connect->connect_error) {
	die("Connection Failed : " . $connect->connect_error);
} else {
	// echo "Successfully Connected";
}