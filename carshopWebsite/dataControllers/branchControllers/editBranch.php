<?php
    // This controller is for editing the data in database
    require_once('C:\xampp\htdocs\carshopWebsite\db_connection.php');

    // Function to edit a branch
    if(isset($_POST['edit_branchbtn'])) {
        $branchid = $_POST['branch_id'];
        $branchname = sanitizeInput($_POST['branchname']);

        $sql = "UPDATE branch SET branchname = '$branchname' WHERE branchID = '$branchid'";
        
        $conn->begin_transaction();

        if($conn->query($sql) === TRUE) {
                $conn->commit();
            } else {
                $conn->rollback();
            }
    }
?>