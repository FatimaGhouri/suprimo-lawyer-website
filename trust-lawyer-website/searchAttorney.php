<?php
require_once "config.php";

if(isset($_GET['service'])){
    $selectedService = $_GET['service'];
    $searchSql = "SELECT * FROM lawyers WHERE services = '$selectedService'";
    $result = mysqli_query($conn, $searchSql);
}
if(isset($_GET['location'])){
    $selectedLocation = $_GET['location'];
    $searchSql = "SELECT * FROM lawyers WHERE location = '$selectedLocation'";
    $result = mysqli_query($conn, $searchSql);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="row">
        <?php
        if(mysqli_num_rows($result)>0){
            while($rows = mysqli_fetch_assoc($result)){
                ?>
                <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="attorneys-info attorneys-hv-link mg-60" id="content-block">
                            <div class="attorneys-avatar hv-link-content">
                                <div class="image">
                                    <img src="../admin-dashboard/template/images/uploads/<?php echo $rows['image'];?>"
                                        alt="images">
                                </div>
                                <div class="overlay-box">
                                    <div class="content">
                                        <a href="attorney-profile.php?id=<?php echo $rows['id'];?>">View Profile</a>
                                    </div>
                                </div>
                            </div>
                            <div class="attorneys-content">
                                <div class="content-wrap">
                                    <h3 class="name"><a href="#"><?php echo 'Name: '.ucwords($rows['fullname']);  ?></a></h3>
                                    <p class="position"><?php echo 'Service: '.$rows['services'];?></p>
                                    <p class="location"><?php echo 'Location: '.$rows['location'];?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
            }
        }else{
            echo "No such lawyers found !";
        }
        ?>
    </div>
</body>
</html>