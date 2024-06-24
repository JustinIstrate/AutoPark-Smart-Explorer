<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AutoPark Data</title>
    <link rel="icon" href="../common/carr.png" type="image/png">
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;1,100;1,200;1,300;1,400&family=Tilt+Neon&display=swap"
        rel="stylesheet">
    <style>
        .dropdown-menu {
            display: none;
        }

        .show {
            display: block;
        }

        .chart-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            box-sizing: border-box;
            text-align: center;
        }

        .chart-container canvas {
            margin: 20px auto;
            display: block;
            max-width: 100%;
            height: auto;
        }

        .chart-buttons {
            margin-bottom: 20px;
        }

        .chart-buttons button {
            margin: 0 10px;
        }

        .chart-section {
            display: none;
            /* Initially hide all chart sections */
        }

        .chart-section.active {
            display: block;
            /* Show the active chart section */
        }
    </style>
    <script>
        function showDropdown(type) {
            document.getElementById('fileType').dataset.type = type;
            document.getElementById('fileTypeDropdown').classList.add('show');
        }

        function selectFileType() {
            const type = document.getElementById('fileType').dataset.type;
            document.getElementById(type).click();
        }

        function hideDropdown() {
            document.getElementById('fileTypeDropdown').classList.remove('show');
        }
    </script>
</head>

<body>
    <?php include '../common/navBar.php'; ?>
    <div id="wrap">
        <div class="container">
            <form class="form-horizontal" action="functions.php" method="post" name="upload_excel"
                enctype="multipart/form-data">
                <div class="form-group">
                    <input type="file" name="file" id="file" class="input-large">

                    <button type="button" class="btn btn-success" onclick="showDropdown('Export')">Export As</button>
                    <div id="fileTypeDropdown" class="dropdown-menu">
                        <select name="fileType" id="fileType" class="input-large" onchange="selectFileType()">
                            <option value="">Select file type</option>
                            <option value="csv">CSV</option>
                            <option value="json">JSON</option>
                        </select>
                    </div>
                    <button type="submit" id="Import" name="Import" class="btn btn-primary"
                        style="display:none;"></button>
                    <button type="submit" id="Export" name="Export" class="btn btn-success"
                        style="display:none;"></button>
                </div>
            </form>
            <?php
            require_once "getrecords.php"; // Include the PHP file where your functions are defined
            $tableName = isset($_GET['table_name']) ? $_GET['table_name'] : '';
            // Get the current page number
            $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

            // Define pagination parameters
            $rowsPerPage = 15; // Number of rows per page
            
            // Calculate total pages
            $totalPages = calculate_total_pages($rowsPerPage, $tableName);

            // Display records with pagination
            get_all_records($currentPage, $rowsPerPage, $tableName);
            ?>

            <!-- Pagination -->
            <div class="pagination">
                <?php if ($currentPage > 1): ?>
                    <a href="?page=<?php echo ($currentPage - 1); ?>&table_name=<?php echo $tableName; ?>">Previous</a>
                <?php endif; ?>

                <select id="pageDropdown"
                    onchange="window.location.href = '?page=' + this.value + '&table_name=<?php echo $tableName; ?>';">
                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                        <option value="<?php echo $i; ?>" <?php if ($i == $currentPage)
                               echo 'selected'; ?>><?php echo $i; ?>
                        </option>
                    <?php endfor; ?>
                </select>

                <?php if ($currentPage < $totalPages): ?>
                    <a href="?page=<?php echo ($currentPage + 1); ?>&table_name=<?php echo $tableName; ?>">Next</a>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="chart-container crt">
        <div class="chart-buttons">
            <button id="showBarChart" class="btn btn-primary">Show Bar Chart</button>
            <button id="showDoughnutChart" class="btn btn-primary">Show Doughnut Chart</button>
            <button id="showLineChart" class="btn btn-primary">Show Line Chart</button>
        </div>

        <div class="chart-container">
            <div id="barChartSection" class="chart-section"> <!-- Unique ID for bar chart section -->
                <canvas id="barChart" width="500" height="400"></canvas>
                <button id="bexportWebP">Export as WebP</button>
                <button id="bexportSVG">Export as SVG</button>
            </div>
            <div id="dogChartSection" class="chart-section"> <!-- Unique ID for doughnut chart section -->
                <canvas id="dogChart" width="500" height="400"></canvas>
                <button id="dexportWebP">Export as WebP</button>
                <button id="dexportSVG">Export as SVG</button>
            </div>
            <div id="lineChartSection" class="chart-section"> <!-- Unique ID for line chart section -->
                <canvas id="lineChart" width="500" height="400"></canvas>
                <button id="lexportWebP">Export as WebP</button>
                <button id="lexportSVG">Export as SVG</button>
            </div>
        </div>
    </div>

    <script src="scripts.js/charts.js"></script>        <!-- the dom should render and then the script -->         
    <script>
        const chartData = <?php echo $jsonData; ?>;
    </script>

</body>

</html>