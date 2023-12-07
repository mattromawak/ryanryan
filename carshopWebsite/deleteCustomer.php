<?php
    // This controller is for deleting data in database
    require_once('C:\xampp\htdocs\carshopWebsite\db_connection.php');

    
    // Function to delete a customer
    if (isset($_POST["customerID"])) {
        $customerID = $_POST["customerID"];
        // Perform the deletion in your database
            echo "Customer Deleted!!";
            $sqlDelete = "DELETE FROM customer WHERE customerID = $customerID";
            $conn->query($sqlDelete);
    }
?>