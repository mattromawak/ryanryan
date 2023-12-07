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

require_once('db_connection.php');
require_once('./dataControllers/customerControllers/addCustomer.php');
require_once('./dataControllers/customerControllers/editCustomer.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customers</title>
    <link rel="stylesheet" href="./css/customers.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <script src="./script/jqueryscript.js"></script>
    <script src="./script/script.js"></script>
</head>

<body class="bg" style='font-family: Montserrat; font-size:12px'>
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
        <div class="customertitle">
            <h1>CUSTOMERS</h1>
        </div>
        <div class="customerlistTable" id="customerlistTable">
            <?php require_once('./dataControllers/customerControllers/displayCustomer.php') ?>
        </div>
    </div>

    <div class="addForm addcustomerForm">
        <form method="POST" id="customerForm" onsubmit="return validateForm()">
            <p>ADD/EDIT CUSTOMER</p>
            <input type="hidden" name="customerid" id="customerid" value="<?php require_once('./dataControllers/customerControllers/customeridFetcher.php') ?>">
            <input type="text" maxlength="20" name="name" id="name" placeholder="Name" class="addcustomerTxt" required value="<?php require_once('./dataControllers/customerControllers/customernameFetcher.php') ?>">
            <input type="number" name="contact" oninput="limitInputLength(this, 11)" id="contact" placeholder="Contact Info" class="addcustomerTxt" required value="<?php require_once('./dataControllers/customerControllers/customercontactFetcher.php') ?>">
            <input type="text" maxlength="20" name="address" id="address" placeholder="Address" class="addcustomerTxt" required value="<?php require_once('./dataControllers/customerControllers/customeraddressFetcher.php') ?>">

            <select name="branch" id="branch" class="addcustomerTxt" placeholder="Branch">
                <option value="">Choose Branch</option>
                <?php require_once('./dataControllers/otherControllers/fetch_branches.php') ?>
            </select>

            <select name="buyedcar" id="buyedcar" class="addcustomerTxt">
                <?php require_once('carslist.php') ?>
            </select>
            <input type="submit" name="addcustomerBtn" id="addcustomerBtn" value="ADD" class="addcustomerBtn">
            <input type="submit" name="editcustomerBtn" id="editcustomerBtn" value="EDIT" class="addcustomerBtn">
        </form>
    </div>
</body>

</html>