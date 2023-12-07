<?php
    // This controller fetch the id of branch
    require_once('C:\xampp\htdocs\carshopWebsite\db_connection.php');

    // Check if the edit is clicked
    if(isset($_POST['edit_branch'])) {
        $branchid = $_POST['branch_id'];

        $sql = "SELECT branchID FROM branch WHERE branchID = '$branchid'";
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            $branchid = $row['branchID'];
            echo $branchid;
        }
    }
?>