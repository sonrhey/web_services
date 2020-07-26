<?php

header("Access-Control-Allow-Origin: *");
include '../database_config/database_config.php';

$user_id = $_REQUEST["user_id"];

$query = "SELECT * FROM tbl_geofence_settings WHERE user_id = $user_id ORDER BY geofence_settings_id DESC LIMIT 1";
$query = $conn->query($query);

if($query->num_rows>0){
    $row = mysqli_fetch_assoc($query);
    echo json_encode($row);
}