<?php

header('Content-Tcype: application/json');
header('Acess-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-header:Acess-Control-Allow-Origin,Access-Control-Allow-Headers, content-type, authorization, x-request-with');

// Decode JSON input
$data = json_decode(file_get_contents("php://input"), true);

$name =$data['sname'];
$id =$data['id'];
$fathername =$data['sfathername'];
$adress =$data['sadress'];
// Extract the 'sid' parameter from the decoded JSON data
$id = $data['sid'];

// Include the database configuration file
include "config.php";

// Select data from the database based on the provided ID
$sql = "UPDATE student SET student_name = {$name}, fathername =  {$fathername} , adress =  {$adress}) WHERE id = '$id'";

if(mysqli_query($conn, $sql)){
    echo json_encode(array('message' =>  'Record updated', 'status' => true));
    // Fetch the result as an associative array
    
} else {
    // Output a JSON response if no records are found
    echo json_encode(array('message' => 'No Record updated', 'status' => false));
}

?>




?>
