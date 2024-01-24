<?php
require_once "config.php";
if (isset($_GET['query'])) {
    $searchQuery = $_GET['query'];
    if (!empty($searchQuery)) {
        $searchSql = "SELECT * FROM lawyers WHERE fullname LIKE '%$searchQuery%'";
    } else {
        $searchSql = "SELECT * FROM lawyers";
    }
    $searchResult = mysqli_query($conn, $searchSql);

    if (!$searchResult) {
        die('Error: ' . mysqli_error($conn));
    }
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
    <?php
if (mysqli_num_rows($searchResult) > 0) {
    while ($rows = mysqli_fetch_assoc($searchResult)) {
        ?>
    <tr>
        <td>
            <?php echo $rows['id']; ?>
        </td>
        <td>
            <?php echo $rows['fullname']; ?>
        </td>
        <td>
            <?php echo $rows['email']; ?>
        </td>
        <td>
            <?php echo $rows['password']; ?>
        </td>
        <td>
            <?php echo $rows['contact']; ?>
        </td>
        <td>
            <?php echo $rows['services']; ?>
        </td>
        <td>
            <?php echo $rows['location']; ?>
        </td>
        <td><img src="../images/uploads/<?php echo $rows['image']; ?>" alt="lawyer pic" height="200"></td>
        <td>
            <a href="updateLawyers.php?id=<?php echo $rows['id']; ?>"><button type="button" class="btn btn-info">View &
                    Update</button></a>
            <a href="deleteLawyers.php?id=<?php echo $rows['id']; ?>"><button type="button"
                    class="btn btn-danger">Delete</button></a>
        </td>

    </tr>
    <?php
}
} else {
    echo "<tr><td colspan='3'>No records found</td></tr>";
}
?>
</body>

</html>