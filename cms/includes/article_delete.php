<?php

include_once('connection.php');

if (isset($_GET['id'])){
  //display articles
  $id = $_GET['id'];
  

// sql to delete a record
$sql = "DELETE FROM products WHERE id = $id";

   if (mysqli_query($conn, $sql)) {
       
        header('Location:../index.php');
        echo "Record deleted successfully";
        } else {
          echo "Error deleting record: " . mysqli_error($conn);
        }

}

?>