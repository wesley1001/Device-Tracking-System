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


<?php

 
/*
 * Following code will list all the products
 */
 
// array for JSON response
$response = array();
 
// include db connect class
require_once __DIR__ . '/db_connect.php';
//require_once 'DB_Connect.php';
 
// connecting to db
$db = new DB_CONNECT();
    
//if (isset($_GET[""]))  {
   
    //  Write Query To Get Data
    if (isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["regId"])) {
                            $name = $_POST["name"];
                            $email = $_POST["email"];
                            $gcm_regid = $_POST["regId"]; 
                            $result = mysql_query("SELECT id FROM police_directory WHERE email_id = '$name' AND phone_number = '$email' LIMIT 1 ") or die(mysql_error());
                            if (mysql_num_rows($result) > 0) {
                                 while ($row = mysql_fetch_array($result)) {
                                       $id = $row["name"];
                                }

                             $result = mysql_query("UPDATE police_directory SET  gcm_key = regId WHERE id = '$id' ") or die(mysql_error());

                                   $response["success"] = 1;
 
                                
                            }else{


                                   $response["success"] = 2;
 
                            }

        echo json_encode($response);
                      

    }

?>