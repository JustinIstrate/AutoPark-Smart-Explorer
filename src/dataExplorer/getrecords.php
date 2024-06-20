<?php
require_once "databaseconn.php";

// Function to get the total number of rows in the database
function get_total_rows_in_database($tableName) {
    $conn = getdb();
    $sql = "SELECT COUNT(*) as total FROM $tableName";
    $result = $conn->query($sql);


    if (!$result) {
        die("Error: " . $sql . "<br>" . $conn->error);
    }

    $row = $result->fetch_assoc();

    // Close connection
    $conn->close();

    // Return the total number of rows
    return $row['total'];
}


// Function to calculate the total number of pages
function calculate_total_pages($rowsPerPage, $tableName) {
    $totalRows = get_total_rows_in_database($tableName);
    return ceil($totalRows / $rowsPerPage);
}

function get_all_records($currentPage, $rowsPerPage, $tableName) {
    $conn = getdb();
    $offset = ($currentPage - 1) * $rowsPerPage;
    $sql = "SELECT * FROM $tableName LIMIT ?, ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $offset, $rowsPerPage);
    $stmt->execute();
    $result = $stmt->get_result();  
    
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
            echo "<tr><td>" . $row['JUDET'] . "</td>
                      <td>" . $row['CATEGORIE_NATIONALA'] . "</td>
                      <td>" . $row['CATEGORIE_COMUNITARA'] . "</td>
                      <td>" . $row['MARCA'] . "</td>
                      <td>" . $row['DESCRIERE_COMERCIALA'] . "</td>
                      <td>" . $row['TOTAL_VEHICULE'] . "</td></tr>";        
        }
        echo "</tbody></table></div>";
        
    } else {
        echo "You have no records.";
    }

    $stmt->close();
    $conn->close();
}
?>