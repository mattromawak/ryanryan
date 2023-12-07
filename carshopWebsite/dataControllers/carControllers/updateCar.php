<?php
require_once('C:\xampp\htdocs\carshopWebsite\db_connection.php');

if (isset($_POST['updatecar_button'])) {
    $carID = sanitizeInput($_POST['car_code']);
    $newcarName = sanitizeInput($_POST['carName']);
    $carprice = sanitizeInput($_POST['carPrice']);
    $newBranch = sanitizeInput($_POST['branch_name']); // Updated branch name
    $carDescription = sanitizeInput($_POST['carDescription']);

    // Check if the branch exists
    $sql = "SELECT COUNT(*) as branchExists FROM branch WHERE branchname = '$newBranch'";
    $result = $conn->query($sql);

    if ($result) {
        $row = $result->fetch_assoc();
        $branchExists = $row['branchExists'];

        if ($branchExists > 0) {
            // The branch exists; now check if the car already exists in that branch
            $sql = "SELECT COUNT(*) as carExists FROM cars WHERE branch = '$newBranch' AND carname = '$newcarName' 
            AND description = '$carDescription' AND price = '$carprice'";
            $result = $conn->query($sql);

            if ($result) {
                $row = $result->fetch_assoc();
                $carExists = $row['carExists'];

                if ($carExists > 0) {
                    // Car already exists in the branch, handle the error or provide feedback to the user
                    echo "<script>alert('The car already exists in the branch, choose a different name or branch')</script>";
                } else {
                    // Car doesn't exist in the new branch; update the data in the database
                    // Retrieve the current branch of the car
                    $sql = "SELECT * FROM cars WHERE carID = '$carID'";
                    $result = $conn->query($sql);

                    if ($result) {
                        $row = $result->fetch_assoc();
                        if (isset($row['branch'])) {
                                                    $currentBranch = $row['branch'];
                        $currentcarName = $row['carname'];

                        // Update the car's branch
                        $sql = "UPDATE cars
                        SET carname = '$newcarName', branch = '$newBranch', description = '$carDescription', price = '$carprice'
                        WHERE carID = '$carID'";

                        $conn->query($sql);

                        // Update the customer's branch who bought the car
                        $sql2 = "UPDATE customer SET branch = '$newBranch', buyedcar = '$newcarName' WHERE branch = '$currentBranch' AND buyedcar = '$currentcarName'";

                        $conn->query($sql2);
                        }
                    }
                }
            }
        } else {
            // Branch doesn't exist, handle the error or provide feedback to the user
            echo "<script>alert('The branch does not exist, choose a valid one')</script>";
        }
    }
}
?>
