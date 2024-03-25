<?php
require_once "databaseconn.php";
 if(isset($_POST["Import"])){
    
    $filename=$_FILES["file"]["tmp_name"];    
     if($_FILES["file"]["size"] > 0)
     {
        $conn = getdb();
        $file = fopen($filename, "r");
          while (($getData = fgetcsv($file, 10000, ";")) !== FALSE)
           {
             $sql = "INSERT into autoparkdatabase (JUDET,CATEGORIE_NATIONALA,CATEGORIE_COMUNITARA,MARCA,DESCRIERE_COMERCIALA,TOTAL_VEHICULE) 
                   values ('".$getData[0]."','".$getData[1]."','".$getData[2]."','".$getData[3]."','".$getData[4]."','".$getData[5]."')";
                   $result = mysqli_query($conn, $sql);
        if(!isset($result))
        {
          echo "<script type=\"text/javascript\">
              alert(\"Invalid File:Please Upload CSV File.\");
              window.location = \"index.php\"
              </script>";    
        }
        else {
            echo "<script type=\"text/javascript\">
            alert(\"CSV File has been successfully Imported.\");
            window.location = \"index.php\"
          </script>";
        }
           }
           fclose($file);  
     }
  }   
 ?>