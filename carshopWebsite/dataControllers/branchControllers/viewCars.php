<?php
    // This controller is for editing the data in database
    require_once('C:\xampp\htdocs\carshopWebsite\db_connection.php');

    // Function to view cars per branch
    if(isset($_POST['view_branch'])) {
        $branchname = $_POST['branch_name'];
        $branchid = $_POST['branch_id'];
                                                
        $sql = "SELECT * FROM branch WHERE branchname = '$branchname'";
        $result = $conn -> query($sql);
    
        header("Location: carpageperBranch.php?branchname=$branchname");
    }
?>