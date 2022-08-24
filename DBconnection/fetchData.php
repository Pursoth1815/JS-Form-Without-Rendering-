<?php

    // Database connection
    $conn = new mysqli('localhost:8889', 'sa', '', 'nic') or die(mysqli_error($conn));

    $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

    if ($contentType === "application/json") {
        
        //Receive the RAW post data.
        $content = file_get_contents('php://input');

        $decoded = json_decode($content, true);

        
        $limit = $decoded['limit'];
        $start = $decoded['start'];

        // $start = ($page - 1) * $limit;

        $sql = "SELECT * FROM personal_details LIMIT $start, $limit";
        $result = $conn->query($sql);

        // echo"<pre>";
        // print_r($decoded);
        // echo"</pre>";

        if ($result->num_rows > 0) {
        
            // output data of each row
            $data = array();
    
            while($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
            
        } else {
            echo "0 results";
        }
        header('Content-type: application/json');
        echo json_encode($data);
    }
      
    $conn->close();
?>