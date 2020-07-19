<?php

header("Access-Control-Allow-Origin: *");
include '../database_config/database_config.php';

$username = $_REQUEST['username'];
$password = $_REQUEST['password'];

$encrypted_pass = md5($password);

$query = "SELECT * FROM tbl_users WHERE email_address = '$username' and password = '$encrypted_pass'";
$query = $conn->query($query);
$count = mysqli_num_rows($query);

if($count > 0){
    $row = mysqli_fetch_assoc($query);
    $account_name = $row["first_name"]." ".$row["last_name"];
    $last_id = $row["user_id"];
    $img_path = $row["img_path"];
    echo json_encode([
        "correct" => 1,
        "account_name" => $account_name,
        "last_id" => $last_id,
        "img_path" => $img_path
    ]);
}else{
    echo json_encode([
        "correct" => 0,
        "message" => "Incorrect Credentials!"
    ]);
}
