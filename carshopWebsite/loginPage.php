<?php
session_start();
include("db_connection.php");

$username = "";
$password = "";
$errorMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize user input
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Check if any field is empty
    if (empty($username) || empty($password)) {
        $errorMessage = "All fields must be filled.";
    } else {
        // SQL query to retrieve user data
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                // Login successful, redirect
                $_SESSION['username'] = $username;
                header("Location: carPage.php");
                exit();
            } else {
                $errorMessage = "Invalid password";
            }
        } else {
            $errorMessage = "User not found";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel = "stylesheet" href = "./css/styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body class = "loginBody">
<div class = "loginContainer">
    <h2>Login</h2>
    <form method = "post">
        <input type = "text" id = "username" name = "username" maxlength = "16" placeholder = "Username" value = "<?php echo $username; ?>">
        <input type = "password" id = "password" name = "password" maxlength = "16" placeholder = "Password" value = "<?php echo $password; ?>">
        <?php
        if (!empty($errorMessage)) {
            echo '<div style = "color: #9f1212; font-size:12px; padding-left: 80px;">' . $errorMessage . '</div>';
        }
        ?>
        <button type = "submit">LOGIN</button>
    </form>
    <p>Not registered yet? <a href = "registerPage.php">Register here</a></p>
</div>
<div class = "transparentbgLogin"></div>
<img class = "loginBackground" src = "./images/backgroundcar.jpg" alt = "Login Image">
</body>
</html>
