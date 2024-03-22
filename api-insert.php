<?php

header('Content-Tcype: application/json');
header('Acess-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-header:Acess-Control-Allow-Origin,Access-Control-Allow-Headers, content-type, authorization, x-request-with');

// Decode JSON input
$data = json_decode(file_get_contents("php://input"), true);

$name =$data['sname'];
$fathername =$data['sfathername'];
$adress =$data['sadress'];
// Extract the 'sid' parameter from the decoded JSON data
$id = $data['sid'];

// Include the database configuration file
include "config.php";

// Select data from the database based on the provided ID
$sql = "INSERT INTO student(student_name, age , city) VALUES ('{$name}',{$age},  {$adress})";


if(mysqli_query($conn, $sql)){
    echo json_encode(array('message' =>  'Record inserted', 'status' => true));
    // Fetch the result as an associative array
    
} else {
    // Output a JSON response if no records are found
    echo json_encode(array('message' => 'No Record inserted', 'status' => false));
}

?>


?>
