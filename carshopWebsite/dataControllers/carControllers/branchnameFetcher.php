<?php
    //This controller is for fetching data in the database
    require_once('C:\xampp\htdocs\carshopWebsite\db_connection.php');

    // Check if the edit button is clicked
    if (isset($_POST['edit_car'])) {
        $carID = $_POST['car_code'];

        // Get the data from cars table
        $sql = "SELECT * FROM cars WHERE carID = '$carID'";
        $result = $conn -> query($sql);

        while ($row = $result -> fetch_assoc()) {
        $branch_name = $row['branch'];
        echo $branch_name;
        }
    }
?>