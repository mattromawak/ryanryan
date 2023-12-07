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
require_once('./dataControllers/branchControllers/addBranch.php');
require_once('./dataControllers/branchControllers/viewCars.php');
require_once('./dataControllers/branchControllers/editBranch.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Branch</title>
    <link rel="stylesheet" href="./css/branchpage.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <script src="./script/jqueryscript.js"></script>
    <script src="./script/script.js"></script>
</head>

<body class="bg" style='font-family: Montserrat; font-size:12px'>
    <div class="clearfix">
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
            <h1>BRANCH</h1>
        </div> 
            <div class="branchlistTable">
                <table>
                    <thead>
                        <th>Branch Name</th>
                        <th>Sold Cars</th>
                        <th>Operations</th>
                    </thead>
                    <tbody>
                        <?php require_once('./dataControllers/branchControllers/displayBranch.php') ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="addForm addcarForm">
            <form method="POST">
                <p>ADD/EDIT BRANCH</p>
                <input type="hidden" name="branch_id" id="branch_id" value="<?php require_once('./dataControllers/branchControllers/branchidFetcher.php') ?>">
                <input type="text" maxlength="16" name="branchname" placeholder="Name of the branch" class="addbranchTxt" id="branchtxtBox" required value="<?php require_once('./dataControllers/branchControllers/branchnameFetcher.php') ?>">
                <input type="text" maxlength="16" name="addressBranch" placeholder="Branch Address" class="addbranchTxt" id="branchtxtBox" required value="<?php require_once('./dataControllers/branchControllers/branchnameFetcher.php') ?>">
                <input type="submit" name="add_branch" id="add_branch" value="ADD BRANCH" class="branchaddBtn">
                <input type="submit" name="edit_branchbtn" id="edit_branchbtn" class="branchaddBtn" value="EDIT BRANCH">
            </form>
        </div>
    </div>

</body>

</html>