<?php
require_once "../config.php";
if(isset($_GET['id'])){
    $appId = $_GET['id'];
    $updateMsg = "UPDATE appointments 
                  SET status = 'rejected'
                  WHERE id = '$appId'";
    $updateResult = mysqli_query($conn, $updateMsg);
    if($updateResult){
        header("location:lawyerPanel.php");
    }
    else{
        echo "got some issue in rejecting an appointment";
    }
}
?>