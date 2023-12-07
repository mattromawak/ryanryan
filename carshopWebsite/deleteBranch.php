<?php
// This controller is for deleting the data in database
    require_once('C:\xampp\htdocs\carshopWebsite\db_connection.php');

    if (isset($_POST['branchID']) && isset($_POST['branchName'])) {
        $branch_id = $_POST['branchID'];
        $branch_name = $_POST['branchName'];
    
        // Count the number of customers for the specified branch
        $sql = "SELECT COUNT(*) AS customer_count FROM customer WHERE branch = '$branch_name'";
        $result = $conn->query($sql);
        
        if ($result) {
            $row = $result->fetch_assoc();
            $customer_count = $row['customer_count'];
    
            if ($customer_count > 0) {
                // Alert that the branch cannot be deleted
                echo "Branch cannot be deleted because it has $customer_count customers";
            } else {
                // Delete the branch
                echo "Branch Deleted!!";
                $sql = "DELETE FROM branch WHERE branchID = '$branch_id'";
                $result = $conn->query($sql);
            }
        }
    }
?>