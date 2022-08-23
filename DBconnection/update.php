<?php 

// Database connection
$conn = new mysqli('localhost:8889', 'sa', '', 'nic') or die(mysqli_error($conn));

// if (isset($_GET['edit'])) {

// 	$id = $_GET['edit'];
// 	$result = $conn->query("SELECT * FROM personal_details WHERE ID=$id") or die(mysqli_error($conn));
// 	if (count($result) == 1) {
// 		$row = $result->fetch_array();
// 	    $name = $row['Name'];
//         $phoneno = $row['Mobile'];
//         $email = $row['EMail'];
// 	}

// }

// if (isset($_POST['update'])) {

//     $id = $_POST['id'];
//     $name = $_POST['firstName'];
//     $phoneno = $_POST['number'];
//     $email = $_POST['email'];

//     $conn->query("UPDATE personal_details SET Name='$name', Mobile='$phoneno', EMail='$email' WHERE ID=$id") or die(mysqli_error($conn));

//     header("location: index.php");

// }

$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';


    if ($contentType === "application/json") {
        
        //Receive the RAW post data.
        $content = file_get_contents('php://input');

        

        $decoded = json_decode($content, true);

        // echo"<pre>";
        // print_r($decoded);
        // echo"</pre>";

        $name = $decoded['editFirstName'];
        $id = $decoded['editID'];
        $email = $decoded['editEmail'];
        $phoneno = $decoded['editNumber'];

        $conn->query("UPDATE personal_details SET Name='$name', Mobile='$phoneno', EMail='$email' WHERE ID=$id") or die(mysqli_error($conn));

        $returnData = "<h1 class='success'>Sucess Fully Updated</h1>";

        header('Content-type: application/json');
        echo json_encode( $returnData );

    }

?>