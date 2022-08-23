<?php

    // Database connection
    $conn = new mysqli('localhost:8889', 'sa', '', 'nic') or die(mysqli_error($conn));

    $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

    if ($contentType === "application/json") {
        
        //Receive the RAW post data.
        $content = file_get_contents('php://input');

        

        $decoded = json_decode($content, true);

        // echo"<pre>";
        // print_r($decoded);
        // echo"</pre>";

        // echo"<pre>";
        // print_r($decoded['firstName']);
        // echo"</pre>";

        $name = $decoded['firstName'];
        $gender = $decoded['gender'];
        $email = $decoded['email'];
        $state = $decoded['state'];
        $city = $decoded['city'];
        $address = $decoded['address'];
        $qualification = $decoded['qualification'];
        $mobile = $decoded['number'];
        $code = $decoded['pincode'];
                
        
        if($state == 1) {
            $newState = 'Tamil Nadu';
        }
        else if($state == 2) {
            $newState = 'Kerala';
        }
    
        $conn->query("INSERT INTO personal_details( Name, Gender, Mobile, EMail, Address, PinCode, Qualification, State, District) VALUES ('$name', '$gender', '$mobile', '$email', '$address', '$code', '$qualification', '$newState','$city')") or die(mysqli_error($conn));

        $returnData = "<h1 class='success'>Sucess Fully Inserted</h1>";

        header('Content-type: application/json');
        echo json_encode( $returnData );
    }
    
?>