<?php
require_once "config.php";
if (isset($_GET['query'])) {
    $searchQuery = $_GET['query'];
    if (!empty($searchQuery)) {
        $formattedDateTime = date('Y-m-d H:i:s', strtotime($searchQuery));
        $searchSql = "SELECT appointments.id, lawyers.fullname, lawyers.services, customers.custName, appointments.appDateTime FROM appointments JOIN lawyers ON lawyers.id = appointments.lawyers_id JOIN customers ON customers.id = appointments.customers_id WHERE appDateTime = '$formattedDateTime'";
    } else {
        $searchSql = "SELECT appointments.id, lawyers.fullname, lawyers.services, customers.custName, appointments.appDateTime FROM appointments JOIN lawyers ON lawyers.id = appointments.lawyers_id JOIN customers ON customers.id = appointments.customers_id";
    }
    $searchResult = mysqli_query($conn, $searchSql);
    if (!$searchResult) {
        die('Error:' . mysqli_error($conn));
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

    <!-- Include other HTML elements before the table -->
<table>
    <thead>
        <tr>
            <!-- Table headers -->
            <th>ID</th>
            <th>Fullname</th>
            <th>Services</th>
            <th>Customer Name</th>
            <th>Appointment DateTime</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (mysqli_num_rows($searchResult) > 0) {
            while ($rows = mysqli_fetch_assoc($searchResult)) {
                ?>
                <tr>
                    <!-- Populate table rows with data -->
                    <td><?php echo $rows['id']; ?></td>
                    <td><?php echo $rows['fullname']; ?></td>
                    <td><?php echo $rows['services']; ?></td>
                    <td><?php echo $rows['custName']; ?></td>
                    <td><?php echo $rows['appDateTime']; ?></td>
                    <td>
                        <a href="updateApp.php?id=<?php echo $rows['id']; ?>"><button type="button" class="btn btn-info">Update</button></a>
                        <a href="deleteApp.php?id=<?php echo $rows['id']; ?>"><button type="button" class="btn btn-danger">Delete</button></a>
                    </td>
                </tr>
            <?php
            }
        } else {
            echo "<tr><td colspan='6'>No records found</td></tr>"; // Adjust colspan based on the number of columns
        }
        ?>
    </tbody>
</table>

</body>

</html>