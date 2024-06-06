<?php
function get_records_from_csv($startRow, $rowsPerPage, $filters = array())
{
    $file = fopen("parcauto2016.csv", "r"); // Open the CSV file for reading
    $data = array(); // Initialize an empty array to store the data
    $header = fgetcsv($file); // Read the header row from the CSV file

    // Initialize a counter for the number of rows processed
    $rowCount = 0;

    // Read each row from the CSV file until reaching the desired start row
    while ($rowCount < $startRow && ($row = fgetcsv($file)) !== false) {
        // Check if row matches filters
        if (matchesFilters($row, $filters)) {
            $rowCount++;
        }
    }

    // Read and store the rows corresponding to the desired number of rows per page
    while ($rowCount < $startRow + $rowsPerPage && ($row = fgetcsv($file)) !== false) {
        // Check if row matches filters
        if (matchesFilters($row, $filters)) {
            $data[] = $row; // Add the row to the data array
            $rowCount++;
        }
    }

    fclose($file); // Close the file handle

    // Return the data array along with the header
    return array($header, $data);
}

// Function to check if a row matches given filters
function matchesFilters($row, $filters)
{
    // Example implementation: Check if the row matches filter conditions
    // Replace this with your actual filter logic based on your CSV structure
    foreach ($filters as $key => $value) {
        if (!isset($row[$key]) || strpos(strtolower($row[$key]), strtolower($value)) === false) {
            return false;
        }
    }
    return true;
}

function display_records_with_pagination($currentPage, $rowsPerPage, $filters = array())
{
    // Calculate the start row based on the current page number and the rows per page
    $startRow = ($currentPage - 1) * $rowsPerPage + 1;

    // Call the function to get records from the CSV file with pagination and filters
    list($header, $records) = get_records_from_csv($startRow, $rowsPerPage, $filters);

    // Output the header
    echo "<table><tr>";
    foreach ($header as $cell) {
        echo "<th>" . htmlspecialchars($cell) . "</th>";
    }
    echo "</tr>";

    // Output the records in a table format
    foreach ($records as $row) {
        echo "<tr>";
        foreach ($row as $cell) {
            echo "<td>" . htmlspecialchars($cell) . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";

    // Display next and previous page buttons with filters
    $queryFilters = http_build_query($filters); // Convert filters to URL query string

    $totalRows = count(file("parcauto2016.csv")); // Get total number of rows in the CSV file
    $totalPages = ceil($totalRows / $rowsPerPage); // Calculate total number of pages

    echo '<div class="pagination">';
    if ($currentPage > 1) {
        echo '<a href="?page=' . ($currentPage - 1) . '&' . $queryFilters . '">Previous</a>';
    }
    if ($currentPage < $totalPages) {
        echo '<a href="?page=' . ($currentPage + 1) . '&' . $queryFilters . '">Next</a>';
    }
    echo '</div>';
}
?>