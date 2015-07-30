<?php 
	
	include('config/config.php');
	include('controllers/Android_Api.php');
	$Android_Api = new Android_Api();
	
	 if (isset($_GET["number"]) && isset($_GET["email"]) && isset($_GET["regId"])) {
                            $number = $_GET["number"];
                            $email = $_GET["email"];
                            $gcm_regid = $_GET["regId"]; 
  
                            $Result = $Android_Api->Verify_User( $number , $email , $gcm_regid );
                          
                            if($Result == null){
                            
                                    $response["success"] = 2;  
                           
                            }else{

                                    $response["success"] = 1;
                                    $response["user_id"] = $Result;                           
                            }
			  echo json_encode($response);
   
          }
         
        if(isset($_GET["latitude"]) && isset( $_GET["longitude"]  )  && isset( $_GET["userId"] ) ){
        	$lat = $_GET["latitude"];
        	$long = $_GET["longitude"] ;
        	$user_id = $_GET["userId"] ;
        	
        	$Android_Api->Add_Locations( $lat , $long , $user_id );
        
        } 
  
	
?>



<?php 
/*	
	include('controllers/Android_Api.php');
	$Android_Api = new Android_Api();
	 if (isset($_GET["number"]) && isset($_GET["email"]) && isset($_GET["regId"])) {
                            $number = $_GET["number"];
                            $email = $_GET["email"];
                            $gcm_regid = $_GET["regId"]; 
                             
                      	    $response["success"] = 2;
                      	    
                    //    $response["user_id"] = 1;
                         
                            echo json_encode($response);
   
          }
  
*/	
?>