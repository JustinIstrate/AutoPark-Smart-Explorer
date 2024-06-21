<?php
require_once '../dataExplorer/databaseconn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tableName = $_POST['table_name'];

    if (!empty($tableName)) {
        $conn = getdb();
        $query = "DROP TABLE $tableName";

        if (mysqli_query($conn, $query)) {
            echo "<script>alert('Table deleted successfully.'); window.location.href = 'index.php';</script>";
        } else {
            echo "<script>alert('Error deleting table: " . mysqli_error($conn) . "'); window.location.href = 'index.php';</script>";
        }

        mysqli_close($conn);
    } else {
        echo "<script>alert('Table name is required.'); window.location.href = 'index.php';</script>";
    }
} else {
    echo "<script>window.location.href = 'index.php';</script>";
}
?>
