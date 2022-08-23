<?php

    // Database connection
    $conn = new mysqli('localhost:8889', 'sa', '', 'nic') or die(mysqli_error($conn));

    $sql = "SELECT * FROM personal_details";
    $result = $conn->query($sql);



    if ($result->num_rows > 0) {
        
        // output data of each row
        $data = array();

        while($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }

        // while($row = $result->fetch_assoc()) {
            
        //     $data = $row;

        // }
        
    } else {
        echo "0 results";
    }
    header('Content-type: application/json');
    echo json_encode($data);
      
    $conn->close();
?>