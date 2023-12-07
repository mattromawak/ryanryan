<?php
    // This controller is for viewing the data in database
    require_once('C:\xampp\htdocs\carshopWebsite\db_connection.php');

    //Function to view customers per car
    if(isset($_GET['view_customers'])) {
        $carname = $_GET['carname'];
                                                                    
        $sql = "SELECT * FROM customer WHERE buyedcar = '$carname'";
        $result = $conn -> query($sql);
    
        header("Location: customerpageperCars.php?carname=$carname");
    }
?>