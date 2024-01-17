<?php
$servername= "localhost";
$username = "root";
$password = "";
$db_name = "db_eproject_sem2";

$conn = mysqli_connect($servername, $username, $password, $db_name);

if(!$conn){
    die("Error: " . mysqli_connect_error());
}

?>