<?php

include_once('connection.php');

if (isset($_GET['id'])){
  //display articles
  $id = $_GET['id'];
  

// sql to delete a record
$sql = "DELETE FROM clients WHERE client_id = $id";

   if (mysqli_query($conn, $sql)) {
       
        header('Location:../add_client.php');
        echo "Record deleted successfully";
        } else {
          echo "Error deleting record: " . mysqli_error($conn);
        }
        
}

?>