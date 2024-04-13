<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AutoPark Smart Explorer</title>
    <link rel="stylesheet" href="styles.css">
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
            require_once "getrecords.php";
            get_all_records();
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
