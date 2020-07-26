<?php
header("Access-Control-Allow-Origin: *");
include '../sms/index.php';
include '../database_config/database_config.php';

use Twilio\Rest\Client;

$user_id = $_REQUEST["user_id"];

$get_name = "SELECT * FROM tbl_users WHERE user_id = $user_id";
$get_name = $conn->query($get_name);
$getdetails = mysqli_fetch_assoc($get_name);
$fullname = $getdetails["first_name"]." ".$getdetails["last_name"];

$query = "SELECT * FROM tbl_contacts WHERE user_id = $user_id";
$query = $conn->query($query);

if($query->num_rows>0){
    while($row = mysqli_fetch_assoc($query)){
        $contact_name = $row["contact_name"];
        $contact_number = $row["contact_mobile_number"];
        $contact_message = "Hello ".$contact_name.", ".$fullname." is outside of the geofence, kindly contact her immediately!";
        // Find your Account Sid and Auth Token at twilio.com/console
        // DANGER! This is insecure. See http://twil.io/secure
        $sid    = "ACbab1f44f87e3c531aaca97768a426756";
        $token  = "a3d478f7e9fbfcc92db2c40cfff0ad19";
        $twilio = new Client($sid, $token);

        $message = $twilio->messages
        ->create($contact_number, // to
            [
                "body" => $contact_message, 
                "from" => "+12057406447"
            ]
        );
        print($message->sid);
    }  
}