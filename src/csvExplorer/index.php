<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AutoPark Data</title>
    <link rel="icon" href="../common/carr.png" type="image/png">
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;1,100;1,200;1,300;1,400&family=Tilt+Neon&display=swap" rel="stylesheet">
</head>

<body>
    <?php include '../common/navBar.php'; ?>
    <div class="container">
        <h1>CSV Explorer</h1>

        <div class="csv-list-container">
            <!-- Search Bar -->
            <div class="search-container">
                <input type="text" placeholder="Search...">
                <button class="button">Search</button>
            </div>

            <!-- Filter Area -->
            <div class="filter-container">
                <select>
                    <option value="">Filter by...</option>
                    <option value="date">Date</option>
                    <option value="name">Name</option>
                    <option value="size">Size</option>
                </select>
                <button class="button">Apply Filter</button>
            </div>
        </div>

        <!-- CSV File List -->
        <table>
            <tr>
                <th>File Name</th>
                <th>Actions</th>
            </tr>
            <?php
            require_once '../dataExplorer/databaseconn.php';
            $conn = getdb();

            // Query to get all table names
            $result = mysqli_query($conn, "SHOW TABLES LIKE 'parc%'");
            while ($row = mysqli_fetch_array($result)) {
                $tableName = $row[0];
                echo "<tr>
                        <td>{$tableName}</td>
                        <td>
                            <a href=\"../dataExplorerUser/index.php?table_name={$tableName}\" class=\"action-link\">Preview</a>
                            <div class=\"dropdown\">
                                <button class=\"dropbtn action-link\">Download</button>
                                <div class=\"dropdown-content\">
                                    <a href=\"../csvExplorer/download.php?table_name={$tableName}&format=csv\" class=\"action-link\">CSV</a>
                                    <a href=\"../csvExplorer/download.php?table_name={$tableName}&format=json\" class=\"action-link\">JSON</a>
                                </div>
                            </div>
                        </td>
                    </tr>";
            }
            ?>
        </table>
    </div>
</body>

</html>