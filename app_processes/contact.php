<?php

header("Access-Control-Allow-Origin: *");
include '../database_config/database_config.php';

$user_id = $_REQUEST['user_id'];
$contact_name = $_REQUEST['contact_name'];
$contact_mobile_number = $_REQUEST['contact_mobile_number'];
$contact_relationship = $_REQUEST['contact_relationship'];
$response = [];

$insert = "INSERT INTO tbl_contacts (user_id, contact_name, contact_mobile_number, contact_relationship) VALUES ($user_id, '$contact_name', '$contact_mobile_number', '$contact_relationship')";
$insert = $conn->query($insert);

if($insert){
    $response = [
        "message" => "Contact added Successfuly!"
    ];
}else{
    $response = [
        "message" => mysqli_error($conn)
    ];
}

echo json_encode($response);