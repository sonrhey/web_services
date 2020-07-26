<?php

header("Access-Control-Allow-Origin: *");
include '../database_config/database_config.php';

$user_id = $_REQUEST["user_id"];
$query = "SELECT * FROM tbl_contacts WHERE user_id = $user_id";
$query = $conn->query($query);
$html = '';

if($query->num_rows > 0){
    while($row = mysqli_fetch_assoc($query)){
        $html .= '
        <li>
            <div>
                <label>Name: <b>'.$row["contact_name"].'</b></label>
            </div>
            <div>
                <label>Contact Number: <b>'.$row["contact_mobile_number"].'</b></label>
            </div>
            <div>
                <label>Relationship: <b>'.$row["contact_relationship"].'</b></label>
            </div>
        </li>
        ';
    }

    echo $html;
}
