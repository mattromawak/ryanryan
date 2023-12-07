<?php
// This controller is for displaying the data
require_once('C:\xampp\htdocs\carshopWebsite\db_connection.php');
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="customers.css">
</head>

<body>
    <?php
    // Query to fetch unique branches
    $sqlBranches = "SELECT branchname FROM branch ORDER BY branchname DESC";
    $branchList = $conn->query($sqlBranches);

    if ($branchList->num_rows > 0) {
        while ($branchRow = $branchList->fetch_assoc()) {
            $branch = $branchRow['branchname'];

            echo '<table class="customersTable">
                <caption>' . $branch . '</caption>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Contact Info</th>
                        <th>Address</th>
                        <th>Bought Car</th>
                        <th>Operations</th>
                    </tr>
                </thead>
                <tbody>';

            // Query to fetch customers for the current branch
            $sqlView = "SELECT * FROM customer WHERE branch = '$branch'";
            $list = $conn->query($sqlView);

            if ($list->num_rows > 0) {
                while ($row = $list->fetch_assoc()) {
                    $customerID = $row['customerID'];
                    $name = $row['name'];
                    $contact = $row['contact'];
                    $address = $row['address'];
                    $buyedcar = $row['buyedcar'];

                    echo '<tr>';
                    echo '<input type="hidden" name="customerid" value="' . $customerID . '">';
                    echo '<td>' . $name . '</td>';
                    echo '<td>' . $contact . '</td>';
                    echo '<td>' . $address . '</td>';
                    echo '<td>' . $buyedcar . '</td>';
                    echo '<td>';
                    echo '<form method="POST">';
                    echo '<input type="hidden" id="customerid" name="customerid" value="' . $customerID . '">';
                    echo '<input type="hidden" name="buyedcar" value="' . $buyedcar . '">';
                    echo '<input type="hidden" name="customername" value="' . $name . '">';
                    // Edit button
                    echo "<button type='submit' name='edit_customer' class='tableBtn edit_customer' style='margin-right:5px; cursor:pointer' id='editBtn'>";
                    echo "<img src='./images/edit.png' alt='Edit' style='width: 25px; height: 25px; vertical-align: middle;'>";
                    echo "<span style='vertical-align: middle;'>Edit</span>";
                    echo "</button>";
                    // Delete button
                    echo '<button type="submit" name="delete_customer" style="margin-right:5px" class="tableBtn delete_customer"';
                    echo 'data-customerid="' . $customerID  . '">';
                    echo "<img src='./images/delete.png' alt='Delete' style='width: 25px; height: 25px; vertical-align: middle;'>";
                    echo "<span>Delete</span>";
                    echo '</button>';
                    echo '</form>';
                    echo '</td>';
                    echo '</tr>';
                }
            } else {
                echo '<tr><td colspan="5">No customers in this branch.</td></tr>';
            }

            echo '</tbody></table>';
        }
    } else {
        echo 'No branches and customers found';
    }
    ?>
</body>
</html>
