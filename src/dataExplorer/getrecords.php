<?php
function get_records_from_csv($startRow, $rowsPerPage)
{
    $file = fopen("parcauto2016.csv", "r"); // Open the CSV file for reading
    $data = array(); // Initialize an empty array to store the data
    $header = fgetcsv($file); // Read the header row from the CSV file

    // Initialize a counter for the number of rows processed
    $rowCount = 0;

    // Read each row from the CSV file until reaching the desired start row
    while ($rowCount < $startRow && ($row = fgetcsv($file)) !== false) {
        $rowCount++;
    }

    // Read and store the rows corresponding to the desired number of rows per page
    while ($rowCount < $startRow + $rowsPerPage && ($row = fgetcsv($file)) !== false) {
        $data[] = $row; // Add the row to the data array
        $rowCount++;
    }

    fclose($file); // Close the file handle

    // Return the data array along with the header
    return array($header, $data);
}

function display_records_with_pagination($currentPage, $rowsPerPage)
{
    // Calculate the start row based on the current page number and the rows per page
    $startRow = ($currentPage - 1) * $rowsPerPage + 1;

    // Call the function to get records from the CSV file with pagination
    list($header, $records) = get_records_from_csv($startRow, $rowsPerPage);

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

    // Display next and previous page buttons
    $totalRows = count(file("parcauto2016.csv")); // Get total number of rows in the CSV file
    $totalPages = ceil($totalRows / $rowsPerPage); // Calculate total number of pages

    echo '<div class="pagination">';
    if ($currentPage > 1) {
        echo '<a href="?page=' . ($currentPage - 1) . '">Previous</a>';
    }
    if ($currentPage < $totalPages) {
        echo '<a href="?page=' . ($currentPage + 1) . '">Next</a>';
    }
    echo '</div>';
}
/*
require_once "databaseconn.php";
function get_all_records(){
    $conn = getdb();
    $Sql = "SELECT * FROM autoparkdatabase";
    $result = mysqli_query($conn, $Sql);  
    if (mysqli_num_rows($result) > 0) {
     echo "<div class='table-responsive'><table id='myTable' class='table table-striped table-bordered'>
             <thead><tr><th>JUDET</th>
                          <th>CATEGORIE_NATIONALA</th>
                          <th>CATEGORIE_COMUNITARA</th>
                          <th>MARCA</th>
                          <th>DESCRIERE_COMERCIALA</th>
                          <th>TOTAL_VEHICULE</th>
                        </tr></thead><tbody>";
     while($row = mysqli_fetch_assoc($result)) {
         echo "<tr><td>" . $row['JUDET']."</td>
                   <td>" . $row['CATEGORIE_NATIONALA']."</td>
                   <td>" . $row['CATEGORIE_COMUNITARA']."</td>
                   <td>" . $row['MARCA']."</td>
                   <td>" . $row['DESCRIERE_COMERCIALA']."</td>
                   <td>" . $row['TOTAL_VEHICULE']."</td></tr>";        
     }
    
     echo "</tbody></table></div>";
     
} else {
     echo "you have no records";
}
}
*/
?>