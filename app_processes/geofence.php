<?php

header("Access-Control-Allow-Origin: *");
include '../database_config/database_config.php';

$user_id = $_REQUEST["user_id"];
$geofence_latitude = $_REQUEST['geofence_latitude'];
$geofence_longitude = $_REQUEST['geofence_longitude'];
$geofence_radius = $_REQUEST['geofence_radius'];
$message = [];

$insert = "INSERT INTO tbl_geofence_settings (user_id, geofence_latitude, geofence_longitude, geofence_radius) VALUES ($user_id, '$geofence_latitude','$geofence_longitude', '$geofence_radius')";
$insert = $conn->query($insert);

if($insert){
    $message = [
        "message" => "Sucessfuly Updated!"
    ];
}else{
    $message = [
        "message" => mysqli_error($conn)
    ];
}

echo json_encode($message);