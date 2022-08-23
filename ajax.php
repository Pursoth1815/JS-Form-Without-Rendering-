<?php
   require('dbconfig.php');
   $sql = "SELECT * FROM city
         WHERE state_ID LIKE '%".$_GET['id']."%'"; 
   $result = $conn->query($sql);
   $json = [];
   while($row = $result->fetch_assoc()){
        $json[$row['ID']] = $row['Name'];
   }
   echo json_encode($json);
?>