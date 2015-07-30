<?php 
$response = array();
 
require_once __DIR__ . '/db_connect.php';
 
$db = new DB_CONNECT();
    
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
                                       $response["user_id"] = $id;
     
                                
                            }else{


                                      $response["success"] = 2;
 
                            }

                echo json_encode($response);
                      

    }

?>