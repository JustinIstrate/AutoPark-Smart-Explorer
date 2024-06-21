<?php
session_start();

// Check if the session variable 'username' is set to redirect logged-in admin
if (isset($_SESSION['username'])) {
    header("Location: ../csvExplorerAdmin/index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="form.css" />
    <title>AutoPark Smart Explorer</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;1,100;1,200;1,300;1,400&family=Tilt+Neon&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body>
    <?php include '../common/navBar.php'; ?>
    <div class="main">
        <h8>Are you an admin?</h8>
        <p class="description">As an admin, you can import data for the website. Please enter your credentials below.</p>
        <form name="form" action="auth.php" onsubmit="return validation()" method="POST">
            <label for="first">Email:</label>
            <input type="text" id="first" name="first" placeholder=" Enter 'admin' in case of no access to database" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter 'password' in case of no access to database" required>

            <div class="wrap">
                <button type="submit">Sign in</button>
            </div>
            <?php if (isset($_SESSION['message'])) : ?>
                <p class="message"><?php echo $_SESSION['message']; ?></p>
                <?php unset($_SESSION['message']); ?>
            <?php endif; ?>
        </form>
    </div>
    <script>
        function validation() {
            var id = document.form.first.value;
            var ps = document.form.password.value;
            if (id.length == "" && ps.length == "") {
                alert("User Name and Password fields are empty");
                return false;
            } else {
                if (id.length == "") {
                    alert("User Name is empty");
                    return false;
                }
                if (ps.length == "") {
                    alert("Password field is empty");
                    return false;
                }
            }
        }
    </script>
</body>

</html>
