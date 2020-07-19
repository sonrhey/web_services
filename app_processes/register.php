<?php
header("Access-Control-Allow-Origin: *");
include '../database_config/database_config.php';

$first_name = $_REQUEST['first_name'];
$last_name = $_REQUEST['last_name'];
$middle_name = $_REQUEST['middle_name'];
$gender = $_REQUEST['gender'];
$mobile_number = $_REQUEST['mobile_number'];
$email_address = $_REQUEST['email_address'];
$gender = $_REQUEST['gender'];
$password = $_REQUEST['password'];
date_default_timezone_set('Asia/Manila');
$createdate= date('Y-m-d H:i:s', strtotime('+8 hours'));
// Set new file name
$new_image_name = $first_name.'_'.$last_name.mt_rand().".jpg";
$img_path = "user_images/".$new_image_name;

$encrypted_pass = md5($password);
$insert = "INSERT INTO tbl_users (first_name, last_name, middle_name, mobile_number, gender, email_address, password, img_path) VALUES ('$first_name', '$last_name', '$middle_name', '$mobile_number',  '$gender',  '$email_address', '$encrypted_pass', '$img_path')";
$insert = $conn->query($insert);

$account_name = $first_name." ".$last_name;

if($insert){

    // upload file
    move_uploaded_file($_FILES["file"]["tmp_name"], 'user_images/'.$new_image_name);
    $last_id = $conn->insert_id;
    echo json_encode([
        "message" => "User Saving Successes!",
        "account_name" => $account_name,
        "account_id" => $last_id,
        "img_path" => $img_path
    ]);
}else{
    echo mysqli_error($conn);
}