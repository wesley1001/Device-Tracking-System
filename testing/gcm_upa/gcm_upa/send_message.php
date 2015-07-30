<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
if (isset($_GET["regId"]) && isset($_GET["message"])) {
    $regId = $_GET["regId"];
    $message = $_GET["message"];
    echo $regId."<br>".$message."<br>";

    include_once './GCM.php';
    
    $gcm = new GCM();

    $registatoin_ids = array($regId);
    $message = array("message" => $message); //modifying a little below

    //$message = array($message);

    $result = $gcm->send_notification($registatoin_ids, $message);
    echo $result;
}
?>


