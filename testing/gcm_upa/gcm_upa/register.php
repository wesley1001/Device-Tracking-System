<?php

// response json
$json = array();

/**
 * Registering a user device
 * Store reg id in users table
 */
if (isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["regId"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $gcm_regid = $_POST["regId"]; // GCM Registration ID
    // Store user details in db
    include_once './db_functions.php';
    include_once './GCM.php';

    $db = new DB_Functions();

    $gcm = new GCM();

    $res = $db->storeUser($name, $email, $gcm_regid);

    if($res){

        echo "success";

    }else{

        echo "failure";
    }

    
} else {
    // user details missing
    echo "missing";
}
?>

