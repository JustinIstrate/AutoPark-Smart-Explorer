<?php 
require_once "databaseconn.php";
function create_table_if_not_exists($conn, $table_name) {
    // Check if the table already exists
    $check_sql = "SHOW TABLES LIKE '$table_name'";
    $result = mysqli_query($conn, $check_sql);
    
    if (mysqli_num_rows($result) == 0) {
        // Table doesn't exist, create it
        $create_sql = "CREATE TABLE $table_name (
            JUDET TEXT NOT NULL,
            CATEGORIE_NATIONALA TEXT NOT NULL,
            CATEGORIE_COMUNITARA TEXT NOT NULL,
            MARCA TEXT NOT NULL,
            DESCRIERE_COMERCIALA TEXT,
            TOTAL_VEHICULE INT(11) NOT NULL
        )";
        mysqli_query($conn, $create_sql);
        return true;
    } else {
        return false;
    }
}
?>
