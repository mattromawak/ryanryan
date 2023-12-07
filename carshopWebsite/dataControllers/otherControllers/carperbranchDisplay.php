<?php
// This controller is for displaying the data in the database
require_once('C:\xampp\htdocs\carshopWebsite\db_connection.php');
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="carpageperBranch.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
</head>

<body class="bg" style='font-family: Montserrat; font-size:12px'>
    <div class="mainSection">
        <?php
        if (isset($_GET['branchname'])) {
            $branchname = $_GET['branchname'];

            // Query to fetch unique branches
            $sqlBranches = "SELECT * FROM cars WHERE branch = '$branchname'";
            $branchList = $conn->query($sqlBranches);

            echo '<table class="carlistTable">
                    <caption>' . $branchname . '</caption>
                    <thead>
                        <th>Car Name</th>
                        <th>Description</th>
                        <th>Sold</th>
                        <th>Price</th>
                        <th>Operations</th>
                    </thead>
                    <tbody>';

            if ($branchList->num_rows > 0) {
                while ($branchRow = $branchList->fetch_assoc()) {
                    $carID = $branchRow['carID'];
                    $carname = $branchRow['carname'];
                    $description = $branchRow['description'];
                    $price = $branchRow['price'];

                    $sql1 = "SELECT COUNT(*) AS cars_count FROM customer WHERE buyedcar = '$carname' AND branch = '$branchname'";
                    $result = $conn->query($sql1);
                    $row = $result->fetch_assoc();
                    $soldcar = $row['cars_count'];

                    echo '<form method="GET">';
                    echo '<input type="hidden" name="carname" value="' . $carname . '">';
                    echo '<tr>';
                    echo '<input type="hidden" name="carid" value="' . $carID . '">';
                    echo '<td>' . $carname . '</td>';
                    echo '<td>' . $description . '</td>';
                    echo '<td>' . $soldcar . '</td>';
                    echo '<td>' . $price . '</td>';
                    echo '<td>';
                    echo '<button type="submit" name="view_customers" class="tableBtn" style="margin-right:5px">';
                    echo "<img src='./images/view.png' alt='View' style='width: 25px; height: 25px; vertical-align: middle;'>";
                    echo "<span>View</span>";
                    echo '</button>';
                    echo '</td>';
                    echo '</tr>';
                    echo '</form>';
                }
            } else {
                echo '<tr><td colspan="5">No cars in this branch.</td></tr>';
            }
            echo '</tbody></table>';
        } else {
            echo 'No cars in this branch';
        }
        ?>
    </div>
</body>

</html>