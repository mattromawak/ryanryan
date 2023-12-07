<?php
session_start(); // Start the session

if (!isset($_SESSION['username'])) {
    header("Location: loginPage.php");
    exit();
}

require_once('db_connection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KotCheck | Cars</title>
    <link rel="stylesheet" href="./css/customerpageperCars.css">
    <link rel="javacript" href="./script/script.js">
</head>

<body class="bg">
    <div class="clearfix">
        <div class="headerContainers">
            <div class="adminPosition">
                <img src="./images/admin.jpg" alt="admin.jpg" class="adminProfile">
            </div>
            <h2 style="text-align: center;">ADMIN</h2>
            <div class="navBtns">
                <a href="carPage.php" class="navBtns">Models</a>
                <a href="branchlistPage.php" class="navBtns">Branch</a>
                <a href="customerlistPage.php" class="navBtns">Customer</a>
            </div>
            <div class="logoutBtn">
                <a onclick="logout()">
                    <span>LOGOUT</span>
                    <img src="./images/exit.png" alt="" class="exitBut">
                </a>
            </div>
        </div>
        <div class="mainsectionCpprb"> <!-- Changed "mainsectionCpprb" to "mainSection" -->
            <div class="carlistTable">
                <?php require_once('./dataControllers/otherControllers/customerpercarDisplay.php') ?>
            </div>
        </div>
    </div>
</body>

</html>