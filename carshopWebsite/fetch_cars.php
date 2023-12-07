<?php
    // Get the selected branch
    $selectedBranch = $_POST['branch'];

    // Query to fetch car options based on the selected branch
    $sqlCars = "SELECT * FROM cars WHERE branch = '$selectedBranch'";
    $carList = $conn->query($sqlCars);

    // Fetch the car options from the database
    while ($row = $carList->fetch_assoc()) {
        $carName = $row['carname'];
        $carOptions .= '<option value="' . $carName . '">' . $carName . '</option>';
    }

    // Return the HTML for the car options
    echo $carOptions;
?>
