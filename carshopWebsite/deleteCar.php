<?php
    require_once('C:\xampp\htdocs\carshopWebsite\db_connection.php');

    // Check if the form is submitted
    if (isset($_POST['carID'])) {
        $carID = $_POST['carID'];

        $sql = "SELECT * FROM cars WHERE carID = '$carID'";
        $result = $conn->query($sql);

        $row = $result->fetch_assoc();
        $carname = $row['carname'];
        $branch = $row['branch'];

        $sql2 = "SELECT COUNT(*) AS customer_count FROM customer WHERE buyedcar = '$carname' AND branch = '$branch'";
        $result2 = $conn->query($sql2);

        if($result2) {
            $row2 = $result2->fetch_assoc();
            $customer_count = $row2['customer_count'];

            if($customer_count > 0) {
                echo "Car cannot be deleted because it has $customer_count customers";
            } else {
                echo "Car Deleted!!";
                $sql = "DELETE FROM cars WHERE carID = '$carID'";
                $conn -> query($sql);
            }
        }
    }
?>