<?php
$serverName = "localhost";
$username = "root";
$password = "";
$dbname = "db_eproject_sem2";

$conn = mysqli_connect($serverName, $username, $password, $dbname);

if(!$conn){
    die("Error: " . mysqli_connect_error());
}

?>