<?php


if (isset($_SESSION['username'])) {
    header("Location: carPage.php");
    exit();
}

include("db_connection.php");

$error_message = "";  // Variable to store error messages

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize user input
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);

    // Check if any field is empty
    if (empty($username) ||empty($name) ||  empty($contact) || empty($email) || empty($password) || empty($confirm_password)) {
        $error_message = "All fields must be filled.";
    } else {
        // Check if passwords match
        if ($password !== $confirm_password) {
            $error_message = "Passwords do not match.";
        } else {
            // Check if the username is already taken
            $check_username_query = "SELECT * FROM users WHERE username='$username'";
            $result_username = $conn->query($check_username_query);

            // Check if the email is already taken
            $check_email_query = "SELECT * FROM users WHERE email='$email'";
            $result_email = $conn->query($check_email_query);

            if ($result_username->num_rows > 0) {
                $error_message = "Username already taken. Please choose a different username.";
            } elseif ($result_email->num_rows > 0) {
                $error_message = "Email already taken. Please choose a different email.";
            } else {
                // Hash the password
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                // SQL query to insert data into the database
                $sql = "INSERT INTO users (username, name,  contact, email, password) VALUES ('$username','$name', '$contact', '$email', '$hashed_password')";

                if ($conn->query($sql) === TRUE) {
                    // Registration successful, redirect to welcome.php
                    header("Location: loginPage.php");
                    exit();
                } else {
                    $error_message = "Error: " . $sql . "<br>" . $conn->error;
                }
            }
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styles.css">
    <script src = "./script/script.js"></script>
</head>
<body class = "registerBody">
<div class = "registerContainer">
    <h2>Register</h2>
    <?php
    if (!empty($error_message)) {
        echo '<p style = "color: #9f1212">' . $error_message . '</p>';
    }
    ?>
    <form method = "post" onsubmit = "return validateForm()">
        <input type = "text" id = "username" maxlength = "16" name = "username" placeholder = "Username">
        <input type = "text" id ="name" maxlength = "16" name = "name" placeholder = "Name">
        <input type = "text" id = "contact" maxlength = "11" name = "contact" placeholder = "Contact">
        <input type = "email" id = "email" name = "email" placeholder = "Email">
        <input type = "password" id = "password" maxlength = "16" name = "password" placeholder = "Password">
        <input type = "password" id = "confirm_password" maxlength = "16" name = "confirm_password" placeholder = "Confirm Password">
        <button type = "submit">Register</button>
    </form>
    <p>Already Registered? <a href = "loginPage.php" class="loginButton">Login</a></p>
</div>
<div class = "transparentbgRegister"></div>
<img class = "registrationBackground" src = "./images/backgroundcar.jpg" alt = "Car Image">
</body>
</html>
