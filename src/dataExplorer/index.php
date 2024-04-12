<?php
require_once "databaseconn.php"; // Include the file with your database connection function
require_once "getrecords.php"; // Include the file with your get_all_records() function
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AutoPark Smart Explorer</title>
    <link rel="stylesheet" href="../dataExplorer/styles.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;1,100;1,200;1,300;1,400&family=Tilt+Neon&display=swap"
        rel="stylesheet">
</head>

<body>
    <?php include '../common/navBar.php'; ?>
    <div id="wrap">
        <div class="container">
            <div class="form-group">
                <div class="col-md-4">
                    <input type="file" name="file" id="file" class="input-large">
                </div>
                <div class="col-md-4">
                    <button type="submit" id="submit" name="Import" class="btn btn-primary button-loading"
                        data-loading-text="Loading...">Import</button>
                </div>
                <div class="col-md-4">
                    <input type="submit" name="Export" class="btn btn-success" value="Export" />
                </div>
            </div>
            <?php get_all_records(); ?>
        </div>
    </div>
</body>

</html>