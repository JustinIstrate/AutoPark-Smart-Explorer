<?php
session_start();
include('connection.php');

$username = $_POST['first'];
$password = $_POST['password'];

// Check against the default admin credentials
$default_username = 'admin';
$default_password = 'password';

if ($username === $default_username && $password === $default_password) {
    $_SESSION['username'] = $username; // Store username in session
    $_SESSION['message'] = "Login successful!";
    header("Location: ../csvExplorerAdmin/index.php");
    exit(); // Stop further execution
}

// Check against credentials stored in the database table 'form'
$username = mysqli_real_escape_string($con, $username);
$password = mysqli_real_escape_string($con, $password);

$sql = "SELECT * FROM form WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($con, $sql);
$count = mysqli_num_rows($result);

if ($count == 1) {
    $_SESSION['username'] = $username; // Store username in session
    $_SESSION['message'] = "Login successful!";
    header("Location: ../csvExplorerAdmin/index.php");
    exit(); // Stop further execution
} else {
    $_SESSION['message'] = "Login failed. Invalid username or password.";
    header("Location: index.php");
    exit(); // Stop further execution
}
?>
