<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AutoPark Smart Explorer</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;1,100;1,200;1,300;1,400&family=Tilt+Neon&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script>
        function confirmDelete(tableName) {
            if (confirm('Are you sure you want to delete this table?')) {
                document.getElementById('delete-form').table_name.value = tableName;
                document.getElementById('delete-form').submit();
            }
        }

        function filterTable() {
            const searchInput = document.getElementById('searchInput').value.toLowerCase();
            const table = document.getElementById('csvTable');
            const rows = table.getElementsByTagName('tr');

            for (let i = 1; i < rows.length; i++) {
                const cells = rows[i].getElementsByTagName('td');
                const fileName = cells[0].textContent.toLowerCase();
                const matchesSearch = fileName.includes(searchInput);

                if (matchesSearch) {
                    rows[i].style.display = '';
                } else {
                    rows[i].style.display = 'none';
                }
            }
        }

        function sortTable() {
            const sortSelect = document.getElementById('sortSelect').value;
            const table = document.getElementById('csvTable');
            const rows = Array.from(table.getElementsByTagName('tr')).slice(1);
            const parseYear = fileName => parseInt(fileName.match(/(\d{4})/)[0]);
            const parseSize = sizeText => parseInt(sizeText);

            let comparator;

            switch (sortSelect) {
                case 'yearAsc':
                    comparator = (a, b) => parseYear(a.cells[0].textContent) - parseYear(b.cells[0].textContent);
                    break;
                case 'yearDesc':
                    comparator = (a, b) => parseYear(b.cells[0].textContent) - parseYear(a.cells[0].textContent);
                    break;
                case 'sizeAsc':
                    comparator = (a, b) => parseSize(a.cells[1].textContent) - parseSize(b.cells[1].textContent);
                    break;
                case 'sizeDesc':
                    comparator = (a, b) => parseSize(b.cells[1].textContent) - parseSize(a.cells[1].textContent);
                    break;
                default:
                    return;
            }

            rows.sort(comparator);

            rows.forEach(row => table.appendChild(row));
        }

        function showFileInput() {
            document.getElementById('file').click();
        }

        function selectFileType(type) {
            document.getElementById('importFileType').value = type;
            document.getElementById('file').click();
        }
    </script>
</head>

<body>
    <?php include '../common/navBar.php'; ?>
    <div class="container">
        <h1>CSV Explorer</h1>
        <div class="csv-list-container">
            <!-- Search and Import Bar -->
            <div class="search-container">
                <input type="text" id="searchInput" placeholder="Search...">
                <button class="button" onclick="filterTable()">Search</button>
            </div>

            <!-- Sort Area -->
            <div class="sort-container">
                <select id="sortSelect">
                    <option value="">Sort by...</option>
                    <option value="yearAsc">Year Ascending</option>
                    <option value="yearDesc">Year Descending</option>
                    <option value="sizeAsc">Size Ascending</option>
                    <option value="sizeDesc">Size Descending</option>
                </select>
                <button class="button" onclick="sortTable()">Sort</button>
            </div>

            <div class="logout-button">
                <a href="../login/logout.php" title="Logout">
                    <span class="logout-icon material-symbols-outlined">logout</span>
                </a>
            </div>
        </div>

        <!-- CSV File List -->
        <table id="csvTable">
            <tr>
                <th>File Name</th>
                <th>Size</th>
                <th>Actions</th>
            </tr>
            <?php
            require_once '../dataExplorer/databaseconn.php';
            $conn = getdb();

            // Query to get all table names
            $result = mysqli_query($conn, "SHOW TABLES LIKE 'parc%'");
            while ($row = mysqli_fetch_array($result)) {
                $tableName = $row[0];
                // Get the size of the table (number of rows)
                $sizeResult = mysqli_query($conn, "SELECT COUNT(*) AS size FROM $tableName");
                $sizeRow = mysqli_fetch_assoc($sizeResult);
                $size = $sizeRow['size'];

                echo "<tr>
                        <td>{$tableName}</td>
                        <td>{$size}</td>
                        <td>
                            <a href=\"../dataExplorer/index.php?table_name={$tableName}\" class=\"action-link\">Preview</a>
                            <div class=\"dropdown\">
                                <button class=\"dropbtn action-link\">Download</button>
                                <div class=\"dropdown-content\">
                                    <a href=\"../csvExplorer/download.php?table_name={$tableName}&format=csv\" class=\"action-link\">CSV</a>
                                    <a href=\"../csvExplorer/download.php?table_name={$tableName}&format=json\" class=\"action-link\">JSON</a>
                                </div>
                            </div>
                            <span class=\"material-symbols-outlined\" onclick=\"confirmDelete('{$tableName}')\">delete</span>
                        </td>
                    </tr>";
            }
            ?>
        </table>
        <form id="delete-form" action="deleteTable.php" method="post" style="display:none;">
            <input type="hidden" name="table_name" value="">
        </form>
    </div>
</body>

</html>
