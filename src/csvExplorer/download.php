<?php
require_once '../dataExplorer/databaseconn.php';

// Check if table_name parameter is set
if (isset($_GET['table_name']) && isset($_GET['format'])) {
    $tableName = $_GET['table_name'];
    $format = $_GET['format'];

    // Get database connection
    $conn = getdb();

    // Fetch data from the table
    $query = "SELECT * FROM $tableName";
    $result = mysqli_query($conn, $query);

    // Check if there are any rows returned
    if (mysqli_num_rows($result) > 0) {
        $data = array();

        // Fetch associative array
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }

        // Close connection
        mysqli_close($conn);

        // Set headers based on format
        if ($format === 'csv') {
            // Set headers for CSV download
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment; filename="' . $tableName . '.csv"');

            // Output CSV data
            $output = fopen('php://output', 'w');
            fputcsv($output, array_keys($data[0])); // Write CSV headers
            foreach ($data as $row) {
                fputcsv($output, $row);
            }
            fclose($output);

        } elseif ($format === 'json') {
            // Set headers for JSON download
            header('Content-Type: application/json');
            header('Content-Disposition: attachment; filename="' . $tableName . '.json"');

            // Output JSON
            echo json_encode($data, JSON_PRETTY_PRINT);
        }

        exit;
    } else {
        // Handle case where no data is found
        echo "No data found in the table.";
    }
} else {
    // Handle case where table_name or format parameter is missing
    echo "Table name or format parameter is missing.";
}
?>
