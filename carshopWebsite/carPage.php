<?php
session_start(); // Start the session

if (!isset($_SESSION['username'])) {
    header("Location: loginPage.php");
    exit();
}

function sanitizeInput($input)
{
    // Remove leading and trailing spaces
    $input = trim($input);

    // Remove or escape specific characters
    $input = str_replace(["'", "\"", "--", "/", "\\"], "", $input);

    // You can add more sanitization and validation rules here

    return $input;
}

require_once('C:\xampp\htdocs\carshopWebsite\db_connection.php');
require_once('./dataControllers/carControllers/addCar.php');
require_once('./dataControllers/carControllers/updateCar.php');
require_once('./dataControllers/carControllers/clearFields.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Models</title>
    <link rel="stylesheet" href="./css/carpage.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <script src="./script/jqueryscript.js"></script>
    <script src="./script/script.js"></script>
</head>

<body class="bg" style='font-family: Montserrat; font-size:12px'>
    <div class="addForm addcarForm">
        <form method="POST" id="carForm">
            <p>ADD CAR</p>
            <input type="hidden" name="car_code" value="<?php require_once('./dataControllers/carControllers/caridFetcher.php') ?>">
            <input type="text" maxlength="16" name="carName" placeholder="Name of the car" class="addcarTxt" required value="<?php require_once('./dataControllers/carControllers/carnameFetcher.php') ?>">
            <input type="date" maxlength="16" name="carDate" class="addcarTxt" required value="<?php require_once('./dataControllers/carControllers/cardateFetcher.php') ?>">
            <input type="number" min="0" max="99999999" name="carPrice" placeholder="Price of the car" class="addcarTxt" required value="<?php require_once('./dataControllers/carControllers/carpriceFetcher.php') ?>">
            <select name="branch_name" placeholder="Branch" class="addcarTxt" required>
                <option value="<?php require_once('./dataControllers/carControllers/carbranchFetcher.php') ?>" required>Choose Branch</option>
                <?php require_once('./dataControllers/otherControllers/fetch_branches.php') ?>
            </select>
            <textarea name="carDescription" maxlength="25" cols="5" rows="7" placeholder="Car Description" class="cardescriptxtbox" required><?php require_once('./dataControllers/carControllers/descriptionFetcher.php') ?></textarea>
            <input type="submit" name="addcar_button" value="ADD" class="branchaddBtn">
            <input type="submit" name="updatecar_button" value="UPDATE" class="branchaddBtn">
            <input type="submit" name="clear_button" value="CLEAR" class="branchaddBtn">
        </form>
    </div>
    <div class="headerContainers">
        <div class="adminPosition">
            <img src="./images/admin.jpg" alt="admin.jpg" class="adminProfile">
        </div>
        <h2 style="text-align: center;">ADMIN</h2>
        <div class="navBtns">
            <a href="carPage.php">Models</a>
            <a href="branchlistPage.php">Branch</a>
            <a href="customerlistPage.php">Customer</a>
        </div>
        <div class="logoutBtn" style="cursor: pointer;">
            <a onclick="logout()">
                <span>LOGOUT</span>
                <img src="./images/exit.png" alt="" class="exitBut">
            </a>
        </div>
    </div>
    <div class="mainSection">
        <h1>MODELS</h1>
        <div class="carlistTable">
            <table>
                <thead>
                    <th>Car Name</th>
                    <th>Branch</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Operations</th>
                </thead>
                <tbody>
                    <?php require_once('./dataControllers/carControllers/displayCars.php'); ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>