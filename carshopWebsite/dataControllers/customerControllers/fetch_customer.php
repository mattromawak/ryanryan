<?php
    // Query to fetch car options based on the selected branch
    if(isset($_POST['edit_customer'])) {
        $customerID = $_POST['customerid'];
        $sqlCustomers = "SELECT * FROM customer WHERE customerID = '$customerID'";
        $customerList = $conn->query($sqlCustomers);
    
        // Fetch the car options from the database
        while ($row = $customerList->fetch_assoc()) {
            $name = $row['name'];
            $contact = $row['contact'];
            $address = $row['address'];
            $branch = $row['branch'];
            $buyedcar = $row['buyedcar'];
        }

    }
?>