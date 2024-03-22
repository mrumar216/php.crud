<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

// Decode JSON input
$data = json_decode(file_get_contents("php://input"), true);

// Extract the 'sid' parameter from the decoded JSON data
$id = $data['sid'];

// Include the database configuration file
include "config.php";

// Select data from the database based on the provided ID
$sql = "SELECT * FROM student WHERE id = {$id}";

$result = mysqli_query($conn, $sql) or die("SQL Query Failed.");

if(mysqli_num_rows($result) > 0){
    // Fetch the result as an associative array
    $output = mysqli_fetch_all($result, MYSQLI_ASSOC);
    // Output the JSON encoded result
    echo json_encode($output);
} else {
    // Output a JSON response if no records are found
    echo json_encode(array('message' => 'No Record Found.', 'status' => false));
}

?>
