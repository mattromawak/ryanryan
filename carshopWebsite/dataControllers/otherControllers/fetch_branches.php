<?php

    // Query to fetch car options based on the selected branch
    $sqlCars = "SELECT * FROM branch";
    $carList = $conn->query($sqlCars);

    echo '';
    // Fetch the car options from the database
    while ($row = $carList->fetch_assoc()) {
        $branchName = $row['branchname'];
        $branchOptions .= '<option value="' . $branchName . '">' . $branchName . '</option>';
    }

    // Return the HTML for the car options
    echo $branchOptions;
?>
