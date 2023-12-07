<?php
    require_once('C:\xampp\htdocs\carshopWebsite\db_connection.php');
    
    // Loop through the fetched data and create rows in the table
    // Query to fetch data from the database
    $sql = "SELECT * FROM cars";
    $result = $conn->query($sql);

    // Check if the table has data
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $carID = $row['carID'];
            $carname = $row['carname'];

            echo "<tr>";
            echo "<form method='POST'>";
            echo "<input type='hidden' name='car_code' value='" . $carID . "'>";
            echo "<td>" . $carname . "</td>";
            echo "<td>" . $row["branch"] . "</td>";
            echo "<td>" . $row["description"] . "</td>";
            echo "<td>" . $row["price"] . "</td>";
            echo "<td>";
            
            // Edit Button
            echo "<button type='submit' name='edit_car' class='tableBtn' style='margin-right:5px; cursor:pointer'>";
            echo "<img src='./images/edit.png' alt='Edit' style='width: 25px; height: 25px; vertical-align: middle;'>";
            echo "<span style='vertical-align: middle;'>Edit</span>";
            echo "</button>";
            
            // Delete Button
            echo "<button type='submit' style='cursor:pointer' name='delete_car' id='delete_car' class='tableBtn delete_car' data-carid='" . $carID . "'>";
            echo "<img src='./images/delete.png' alt='Delete' style='width: 25px; height: 25px; vertical-align: middle;'>";
            echo "<span style='vertical-align: middle;'>Delete</span>";
            echo "</button>";
            
            echo "</form>";
            echo "</td>";
            echo "</tr>";
        }
    } else {
        echo "<td colspan='5'>No cars available</td>";
    }
?>
