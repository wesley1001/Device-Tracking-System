
<?php
 
$response = array();
 
require_once __DIR__ . '/db_connect.php';
 
$db = new DB_CONNECT();
    
    if (isset($_GET["number"]) && isset($_GET["email"]) && isset($_GET["regId"])) {
                    //  ECHO      $number = $_GET["number"];
                    //  ECHO      $email = $_GET["email"];
                     // ECHO      $gcm_regid = $_GET["regId"]; 
                        $response["success"] = 1;
                        
                        $response["user_id"] = 1;

                          
 /*
                            $result = mysql_query("SELECT id FROM police_directory WHERE email_id = '$email' AND phone_number = '$number' LIMIT 1 ") or die(mysql_error());
                            if (mysql_num_rows($result) > 0) {
                                 while ($row = mysql_fetch_array($result)) {
                                       $id = $row["id"];
                                }
                                $registered = 1;

                                 $result = mysql_query("UPDATE police_directory SET  gcm_key = '$gcm_regid' , registered = '$registered' WHERE id = '$id' ") or die(mysql_error());

                                       $response["success"] = 1;
                                       $response["user_id"] = $id;
     
                                
                            }else{


                                      $response["success"] = 2;
 
                            }

*/

                echo json_encode($response);
                      

    }

?>