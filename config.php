<?php
$servername= "localhost";
$username = "root";
$password = "";
$db_name = "db_eproject_sem2";

$conn = mysqli_connect($servername, $username, $password, $db_name);

if(!$conn){
    die("Error: " . mysqli_connect_error());
}

@session_start();

// Check if the connection is secure (HTTPS)
$isSecure = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on';

// Get the protocol
$protocol = $isSecure ? 'https://' : 'http://';

// Get the current host
$host = $_SERVER['HTTP_HOST'];

// Construct the full URL
$currentUrl = $protocol . $host . $_SERVER['REQUEST_URI'];

// Extract the file name using pathinfo()
$pathInfo = pathinfo($currentUrl);
$fileName = $pathInfo['basename'];
?>