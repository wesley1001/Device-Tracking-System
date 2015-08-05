<?php

// include the config
require_once('config/config.php');
// load the login class
require_once('classes/Login.php');

require_once('controllers/Police_Management.php');
   
require_once('controllers/Notification_Management.php');

$Notification_Management = new Notification_Management();
    $Police_Management = new Police_Management();

$login = new Login();




// ... ask if we are logged in here:
if ($login->isUserLoggedIn() == true) {
    // the user is logged in. you can do whatever you want here.
    // for demonstration purposes, we simply show the "you are logged in" view.
    include("views/index.php");

} else {
    // the user is not logged in. you can do whatever you want here.
    // for demonstration purposes, we simply show the "you are not logged in" view.
    include("views/login.php");
}