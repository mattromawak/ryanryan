<?php
    // This controller is for editing the data in database
    require_once('C:\xampp\htdocs\carshopWebsite\db_connection.php');

    if (isset($_POST['editcustomerBtn'])) {
        $customerID = sanitizeInput($_POST['customerid']);
        $customername = sanitizeInput($_POST['name']);
        $contact = sanitizeInput($_POST['contact']);
        $address = sanitizeInput($_POST['address']);
        $branch = sanitizeInput($_POST['branch']);
        $buyedcar = sanitizeInput($_POST['buyedcar']);
        
        $sql = "UPDATE customer SET name = '$customername', contact = '$contact', address = '$address', branch = '$branch', buyedcar = '$buyedcar' WHERE customerID = '$customerID'";
        $conn->query($sql);
    }
?>