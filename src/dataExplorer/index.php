<?php
ini_set('max_execution_time', 60);
?>
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
                <fieldset>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="filebutton">Select File</label>
                        <div class="col-md-4">
                            <input type="file" name="file" id="file" class="input-large">
                        </div>
                    </div>
                    <!-- Button -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="singlebutton">Import data</label>
                        <div class="col-md-4">
                            <button type="submit" id="submit" name="Import" class="btn btn-primary button-loading"
                                data-loading-text="Loading...">Import</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="singlebutton">Export data</label>
                        <form class="form-horizontal" action="functions.php" method="post" name="upload_excel"
                            enctype="multipart/form-data">
                            <div class="col-md-4 ">
                                <input type="submit" name="Export" class="btn btn-success" value="Export" />
                            </div>
                        </form>
                    </div>
                </fieldset>
            </form>
            <?php
            require_once "getrecords.php";
            get_all_records();
            ?>
        </div>
    </div>
</body>

</html>