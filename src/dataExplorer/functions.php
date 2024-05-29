<?php
require_once "databaseconn.php";
$conn = getdb();
if (isset($_POST["Import"])) {

  $filename = $_FILES["file"]["tmp_name"];
  if ($_FILES["file"]["size"] > 0) {
    $file = fopen($filename, "r");
    fgetcsv($file, 10000, ";");
    while (($getData = fgetcsv($file, 10000, ";")) !== FALSE) {
      $sql = "INSERT into autoparkdatabase (JUDET,CATEGORIE_NATIONALA,CATEGORIE_COMUNITARA,MARCA,DESCRIERE_COMERCIALA,TOTAL_VEHICULE) 
                   values ('" . $getData[0] . "','" . $getData[1] . "','" . $getData[2] . "','" . $getData[3] . "','" . $getData[4] . "','" . $getData[5] . "')";
      $result = mysqli_query($conn, $sql);
      if (!isset($result)) {
        echo "<script type=\"text/javascript\">
              alert(\"Invalid File:Please Upload CSV File.\");
              window.location = \"index.php\"
              </script>";
      } else {
        echo "<script type=\"text/javascript\">
            alert(\"CSV File has been successfully Imported.\");
            window.location = \"index.php\"
          </script>";
      }
    }
    fclose($file);
  }
}
if (isset($_POST["Export"])) {

  header('Content-Type: text/csv; charset=utf-8');
  header('Content-Disposition: attachment; filename=data.csv');
  $output = fopen("php://output", "w");
  fputcsv($output, array('JUDET', 'CATEGORIE_NATIONALA', 'CATEGORIE_COMUNITARA', 'MARCA', 'DESCRIERE_COMERCIALA', 'TOTAL_VEHICULE'));
  $query = "SELECT * from autoparkdatabase ORDER BY JUDET ASC";
  $result = mysqli_query($conn, $query);
  while ($row = mysqli_fetch_assoc($result)) {
    fputcsv($output, $row, ";");
  }
  fclose($output);
}
