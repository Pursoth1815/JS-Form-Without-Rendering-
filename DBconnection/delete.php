<?php

    // Database connection
    $conn = new mysqli('localhost:8889', 'sa', '', 'nic') or die(mysqli_error($conn));

    // if (isset($_GET['del'])) {
    //     $id = $_GET['del'];
    //     $result = $conn->query("DELETE FROM personal_details WHERE ID=$id") or die(mysqli_error($conn));

    //     header("location:../index.php");
    // }

    // $conn->close();

    $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';


    if ($contentType === "application/json") {
        
        //Receive the RAW post data.
        $content = file_get_contents('php://input');

        

        $decoded = json_decode($content, true);

        // echo"<pre>";
        // print_r($decoded);
        // echo"</pre>";

        $_ID = $decoded;

        $result = $conn->query("DELETE FROM personal_details WHERE ID=$_ID") or die(mysqli_error($conn));

        $returnData = "<h1 class='success'>Sucess Fully Deleted</h1>";

        header('Content-type: application/json');
        echo json_encode( $returnData );

    }

?>