<?php

// include the config
require_once('config/config.php');
// load the login class
require_once('classes/Login.php');

$login = new Login();

require_once('controllers/Police_Management.php');
$Police_Management = new Police_Management();

// ... ask if we are logged in here:
if ($login->isUserLoggedIn() == true) {
    // the user is logged in. you can do whatever you want here.
    // for demonstration purposes, we simply show the "you are logged in" view.
    include("views/manage_police.php");

} else {
    // the user is not logged in. you can do whatever you want here.
    // for demonstration purposes, we simply show the "you are not logged in" view.
    include("views/login.php");
}
