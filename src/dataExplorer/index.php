<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AutoPark Smart Explorer</title>
    <link rel="stylesheet" href="styles.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;1,100;1,200;1,300;1,400&family=Tilt+Neon&display=swap"
        rel="stylesheet">
</head>

<body>
    <div class="navBar">
        <?php include '../common/navBar.php'; ?>
    </div>
    <div id="wrap">
        <div class="container">
            <form class="form-horizontal" action="functions.php" method="post" name="upload_excel"
                enctype="multipart/form-data">
                <div class="form-group">
                    <input type="file" name="file" id="file" class="input-large">
                    <button type="submit" id="submit" name="Import" class="btn btn-primary button-loading"
                        data-loading-text="Loading...">Import</button>
                    <input type="submit" name="Export" class="btn btn-success" value="Export" />
                </div>
            </form>
            <?php
            require_once "getrecords.php"; // Include the PHP file where your functions are defined
            
            // Define pagination parameters
            $rowsPerPage = 15; // Number of rows per page
            $currentPage = isset($_GET['page']) ? $_GET['page'] : 1; // Current page number, default to 1
            
            // Display records with pagination
            display_records_with_pagination($currentPage, $rowsPerPage);
            ?>
        </div>
    </div>
    <div class="diagram-section">
        <div class="container">
            <h2>Example Diagram</h2>
            <img src="diagram.png" alt="Example Diagram">
        </div>
    </div>
</body>

</html>