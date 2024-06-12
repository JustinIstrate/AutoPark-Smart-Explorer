<?php
require_once "databaseconn.php";
require_once "tablesCreation.php";
// Function to import records from CSV
function import_from_csv($handle, $stmt)
{
    $firstLine = fgets($handle);
    $delimiter = strpos($firstLine, ',') !== false ? ',' : ';';
    fgetcsv($handle, 10000, $delimiter); // Skip the header row
    while (($getData = fgetcsv($handle, 10000, $delimiter)) !== FALSE) {
        // Check if all columns are present in the CSV row
        if (count($getData) != 6) {
            continue; // Skip this row if it doesn't have all columns
        }

        // Assign values from CSV to variables
        $judet = $getData[0];
        $categorie_nationala = $getData[1];
        $categorie_comunitara = $getData[2];
        $marca = $getData[3];
        $descriere_comerciala = $getData[4] ?: null; // Set to NULL if empty
        $total_vehicule = $getData[5];

        // Bind parameters and execute the prepared statement
        mysqli_stmt_bind_param($stmt, "sssssi", $judet, $categorie_nationala, $categorie_comunitara, $marca, $descriere_comerciala, $total_vehicule);
        mysqli_stmt_execute($stmt);
    }
}

// Function to import records from JSON
function import_from_json($data, $stmt)
{
    foreach ($data as $row) {
        // Handle null values for 'DESCRIERE_COMERCIALA'
        $descriere_comerciala = $row['DESCRIERE_COMERCIALA'] ?: null;

        // Bind parameters and execute the prepared statement
        mysqli_stmt_bind_param($stmt, "sssssi", $row['JUDET'], $row['CATEGORIE_NATIONALA'], $row['CATEGORIE_COMUNITARA'], $row['MARCA'], $descriere_comerciala, $row['TOTAL_VEHICULE']);
        mysqli_stmt_execute($stmt);
    }
}

$conn = getdb();

if (isset($_POST["Import"])) {
    $filename = $_FILES["file"]["name"];
    $tmp_name = $_FILES["file"]["tmp_name"];
    $fileType = $_POST["fileType"];
    $table_name = pathinfo($filename, PATHINFO_FILENAME);

    // Check if the file exists
    if (file_exists($tmp_name)) {
        // Check if the table already exists
        if (!create_table_if_not_exists($conn, $table_name)) {
            echo "<script type=\"text/javascript\">
                alert(\"CSV already exists.\");
                window.location = \"index.php\"
                </script>";
            exit();
        }

        if ($fileType == "csv") {
            // Prepare the SQL statement
            $sql = "INSERT INTO $table_name (JUDET, CATEGORIE_NATIONALA, CATEGORIE_COMUNITARA, MARCA, DESCRIERE_COMERCIALA, TOTAL_VEHICULE) 
                    VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($conn, $sql);

            // Open the CSV file
            if (($handle = fopen($tmp_name, "r")) !== FALSE) {
                // Import records in batches
                while (!feof($handle)) {
                    // Start a transaction
                    mysqli_begin_transaction($conn);

                    // Import records in a batch
                    import_from_csv($handle, $stmt);

                    // Commit the transaction
                    mysqli_commit($conn);
                }
                fclose($handle);
                echo "<script type=\"text/javascript\">
                alert(\"File successfully imported.\");
                window.location = \"index.php\";
              </script>";
            }
        } elseif ($fileType == "json") {
            // Read JSON file
            $json_data = file_get_contents($tmp_name);
            $data = json_decode($json_data, true);

            // Prepare the SQL statement
            $sql = "INSERT INTO $table_name (JUDET, CATEGORIE_NATIONALA, CATEGORIE_COMUNITARA, MARCA, DESCRIERE_COMERCIALA, TOTAL_VEHICULE) 
                    VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($conn, $sql);

            // Import records in batches
            $batchSize = 1000;
            $totalRecords = count($data);
            for ($i = 0; $i < $totalRecords; $i += $batchSize) {
                // Start a transaction
                mysqli_begin_transaction($conn);

                // Get a batch of records
                $batch = array_slice($data, $i, $batchSize);

                // Import records in a batch
                import_from_json($batch, $stmt);

                // Commit the transaction
                mysqli_commit($conn);
                echo "<script type=\"text/javascript\">
                alert(\"File successfully imported.\");
                window.location = \"index.php\";
              </script>";
            }
        }
    } else {
        echo "<script type=\"text/javascript\">
            alert(\"File not found.\");
            window.location = \"index.php\"
            </script>";
    }
}

if (isset($_POST["Export"])) {
    $fileType = $_POST["fileType"];
    if ($fileType == "csv") {
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=data.csv');
        $output = fopen("php://output", "w");
        fputcsv($output, array('JUDET', 'CATEGORIE_NATIONALA', 'CATEGORIE_COMUNITARA', 'MARCA', 'DESCRIERE_COMERCIALA', 'TOTAL_VEHICULE'));
        $query = "SELECT * from $table_name ORDER BY JUDET ASC";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            fputcsv($output, $row, ";");
        }
        fclose($output);
    } elseif ($fileType == "json") {
        header('Content-Type: application/json; charset=utf-8');
        header('Content-Disposition: attachment; filename=data.json');
        $query = "SELECT * from $table_name ORDER BY JUDET ASC";
        $result = mysqli_query($conn, $query);
        $data = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        echo json_encode($data, JSON_PRETTY_PRINT);
        exit();
    }
}
?>