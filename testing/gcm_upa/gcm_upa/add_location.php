<?php
 
/*
 * Following code will create a new product row
 * All product details are read from HTTP Post Request
 */
 
// array for JSON response
$response = array();
 
// check for required fields
if ( isset($_POST['longitude']) && isset($_POST['latitude']) && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['regId']) ) { 
 
    $longitude  = $_POST['longitude'];
    $latitude   = $_POST['latitude'];
    $name       = $_POST['name'];
    $email      = $_POST['email'];
    $regId      = $_POST['regId'];

    //echo "<pre>".print_r($_POST, true)."</pre>";
    //echo $longitude."  ".$latitude;
    //$counter   = $_POST['counter'];
    
    // connecting to db
    require("config.php");
    $database = DB_DATABASE;
    $host_of_db = DB_HOST;
    $username_of_db = DB_USER;
    $password_of_db = DB_PASSWORD;

    $con = mysqli_connect($host_of_db, $username_of_db, $password_of_db, $database);

    if (!$con) {
      echo "There is a problem in connection to database ...." . mysqli_connect_error();
      die();
    }

    // mysql inserting a new row
    $result = mysqli_query($con, "INSERT INTO `location`(`latitude`, `longitude`,`name`, `email`, `regId`) VALUES('$latitude','$longitude','$name','$email','$regId')");
 
    // check if row inserted or not
    if ($result) {
        // successfully inserted into database
        $response["success"] = 1;
        $response["message"] = "Location Successfully added.";
 
        // echoing JSON response
        echo json_encode($response);
    } else {
        // failed to insert row
        $response["success"] = 0;
        $response["message"] = "Oops! An error occurred.";
 
        // echoing JSON response
        echo json_encode($response);
    }
} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
 
    // echoing JSON response
    echo json_encode($response);
}
?>