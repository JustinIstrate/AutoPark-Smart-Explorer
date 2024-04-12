<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AutoPark Smart Explorer</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body
    style="background-image: url('../homePage/background.jpg'); background-size: cover; background-position: center top;">
    <!-- asa incluzi componente -->
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
            <tr1>
                <th>File Name</th>
                <th>Size</th>
                <th>Actions</th>
            </tr1>
            <tr>
                <td>AUTODATA2011.csv</td>
                <td>10 KB</td>
                <td>
                    <a href="#">Download</a> |
                    <a href="../dataExplorer/index.php">Preview</a>
                </td>
            </tr>
            <tr>
                <td>AUTODATA2012.csv</td>
                <td>15 KB</td>
                <td>
                    <a href="#">Download</a> |
                    <a href="../dataExplorer/index.php">Preview</a>
                </td>
            </tr>
            <tr>
                <td>AUTODATA2013.csv</td>
                <td>14 KB</td>
                <td>
                    <a href="#">Download</a> |
                    <a href="../dataExplorer/index.php">Preview</a>
                </td>
            </tr>
            <tr>
                <td>AUTODATA2013.csv</td>
                <td>12 KB</td>
                <td>
                    <a href="#">Download</a> |
                    <a href="../dataExplorer/index.php">Preview</a>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>