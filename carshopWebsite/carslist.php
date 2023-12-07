<?php
    // This controller is for displaying the cars as options
    include('db_connection.php');
    $branch = $_POST['branch'];

    $sql = "SELECT * FROM cars WHERE branch = '$branch'";
    $result = $conn->query($sql);

    echo '<option>Choose Car</option>';
    while ($row = $result->fetch_assoc()) {
        echo '<option value="'.$row['carname'].'">'.$row['carname'].'</option>';
    }
?>