<?php
include ('connection.php');
$username = $_POST['first'];
$password = $_POST['password'];

$default_username = 'admin';
$default_password = 'password';

// Check if the submitted credentials match the default ones
if ($username === $default_username && $password === $default_password) {
    $_SESSION['message'] = "Login successful!";
    header("Location: ../dataExplorer/index.php");
    exit(); // Stop further execution
}

$username = mysqli_real_escape_string($con, $username);
$password = mysqli_real_escape_string($con, $password);

$sql = "SELECT * FROM form WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($con, $sql);
$count = mysqli_num_rows($result);

if ($count == 1) {
    session_start();
    $_SESSION['message'] = "Login successful!";
    header("Location: ../dataExplorer/index.php");
} else {
    session_start();
    $_SESSION['message'] = "Login failed. Invalid username or password.";
    header("Location: form.php");
}
?>