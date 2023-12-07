<?php
    // This controller is for fetching the data in database
    require_once('C:\xampp\htdocs\carshopWebsite\db_connection.php');

    if(isset($_POST['edit_customer'])) {
        $customerid = $_POST['customerid'];

        $sql = "SELECT * FROM customer WHERE customerID = '$customerid'";
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
        echo $row['address'];
        }
    }
?>