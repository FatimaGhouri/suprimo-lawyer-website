<?php
require_once "config.php";
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $deleteSql = "DELETE FROM customers WHERE id = '$id'";
    $deleteResult= mysqli_query($conn, $deleteSql);

    if($deleteResult){
        header("location:customers.php");
    }

}
?>