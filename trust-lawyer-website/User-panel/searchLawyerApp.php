<?php
require_once "../config.php";
if(isset($_GET['status']) &&  isset($_GET['lawyerId'])){
    $status = $_GET['status'];
    $lawyerId = $_GET['lawyerId'];
        $searchApp = "SELECT appointments.id, customers.custName, customers.email, appointments.appDateTime FROM appointments JOIN lawyers ON lawyers.id = appointments.lawyers_id JOIN customers ON customers.id = appointments.customers_id WHERE lawyers_id = '$lawyerId' && status = '$status'";
        $searchAppResult = mysqli_query($conn,$searchApp);
    
   
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    .notFoundImg {
        width: 100%;
        height:300px;
    }

    .notFoundImg img {
        width: 100%;
        height: 100%;
        object-fit: contain;

    }
    </style>
</head>

<body>
    
    <?php
    
    if(mysqli_num_rows($searchAppResult)>0){
        ?>
        <thead>
        <tr>
            <th>Id</th>
            <th>Customer Name</th>
            <th>Customer Email</th>
            <th>Appointment Date & Time</th>
            <?php
            if($status === 'pending'){
                echo "<th>Actions</th>";
            }
            ?>

        </tr>
    </thead>
    <?php
        while($rows=mysqli_fetch_assoc($searchAppResult)){
            ?>
    <tr>
        <td><?php echo $rows['id'];?></td>
        <td><?php echo $rows['custName'];?></td>
        <td><?php echo $rows['email'];?></td>
        <td><?php echo $rows['appDateTime'];?></td>
        <?php
        if($status === "pending"){
            echo "<td>
            <a href='approveApp.php?id=".$rows['id']."'><button type='button' class='btn btn-success' >Approve</button></a>
            <a href='rejectApp.php?id=".$rows['id']."'><button type='button' class='btn btn-danger' >Reject</button></a>
        </td>";
        }
        ?>

    </tr>
    <?php
        }
    }else{
       ?>
       <div class="notFoundImg">
        <img src="assets/images/notFoundImg.jpg" alt="">
    </div>
       <?php
    }
    ?>
</body>

</html>