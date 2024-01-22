<?php
require_once "../config.php";
if(isset($_GET['status']) &&  isset($_GET['id'])){
    $status = $_GET['status'];
    $clientId = $_GET['id'];
        $searchApp = "SELECT appointments.id, lawyers.fullname, lawyers.services, lawyers.email, appointments.appDateTime FROM appointments JOIN lawyers ON lawyers.id = appointments.lawyers_id JOIN customers ON customers.id = appointments.customers_id WHERE customers_id = '$clientId' && status = '$status'";
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
            <th>Lawyer Name</th>
            <th>Lawyer Service</th>
            <th>Lawyer Email</th>
            <th>Appointment Date & Time</th>

        </tr>
    </thead>
    <?php
        while($rows=mysqli_fetch_assoc($searchAppResult)){
            ?>
    <tr>
        <td><?php echo $rows['id'];?></td>
        <td><?php echo $rows['fullname'];?></td>
        <td><?php echo $rows['services'];?></td>
        <td><?php echo $rows['email'];?></td>
        <td><?php echo $rows['appDateTime'];?></td>
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