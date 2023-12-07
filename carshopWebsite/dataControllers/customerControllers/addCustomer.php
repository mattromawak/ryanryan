<?php
    // This controller is for adding the data in database
    require_once('db_connection.php');

        // Function to add customer
        // Retrieve the selected values
    if(isset($_POST['addcustomerBtn'])) {
        $name = sanitizeInput($_POST['name']);
        $contact = sanitizeInput($_POST['contact']);
        $address = sanitizeInput($_POST['address']);
        $branch = sanitizeInput($_POST['branch']);
        $buyedcar = sanitizeInput($_POST['buyedcar']);
    
        $sql = "SELECT COUNT(*) FROM branch WHERE branchname = '$branch'";
        $result = $conn->query($sql);
    
        if ($result) {
            $row = $result->fetch_assoc();
            $branchExists = $row['COUNT(*)'];
    
            if ($branchExists > 0) {
                // Branch exists, so you can proceed with the customer insertion
                $sqladdCustomer = "INSERT INTO customer (name, contact, address, branch, buyedcar, datepurchased) 
                VALUES ('$name', '$contact', '$address', '$branch', '$buyedcar', NOW())";

                $conn->query($sqladdCustomer);
            } else {
                // Branch doesn't exist, handle the error or provide feedback to the user
                echo "<script>alert('The branch does not exist, choose a valid one')</script>";
            }
        }
    }
?>