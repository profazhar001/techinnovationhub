<?php
/*
$servername = "sql212.infinityfree.com";
$username = "if0_34373034";
$password = "g9LDz1n2hE"; // Replace with your actual MySQL password
$dbname = "if0_34373034_db_jms";*/
/* Database credentials*/
/*
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'jms');*/

$servername = "sql212.infinityfree.com";
$username = "if0_34373034";
$password = "g9LDz1n2hE"; // Replace with your actual MySQL password
$dbname = "if0_34373034_db_jms";
/* Attempt to connect to MySQL database */
//$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
