<?php
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
?>