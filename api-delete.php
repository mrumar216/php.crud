<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-header:Acess-Control-Allow-Origin,Access-Control-Allow-Headers, content-type, authorization, x-request-with');

// Decode JSON input
$data = json_decode(file_get_contents("php://input"), true);

// Extract the 'sid' parameter from the decoded JSON data
$id = $data['sid'];

// Include the database configuration file
include "config.php";

// Select data from the database based on the provided ID
$sql = "DELETE * FROM student WHERE id = {$id}";


if(mysqli_query($conn, $sql)){
    echo json_encode(array('message' => 'No Record Found.', 'status' => true));
} else {
    // Output a JSON response if no records are found
    echo json_encode(array('message' => 'No Record Found.', 'status' => false));
}

?>
