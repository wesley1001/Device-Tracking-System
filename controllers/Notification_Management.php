<?php

class Notification_Management
{
    /**
     * @var object $db_connection The database connection
     */
    private $db_connection            = null;
    
    public  $errors                   = array();
    /**
     * @var array collection of success / neutral messages
     */
    public  $messages                 = array();
    /**
     * the function "__construct()" automatically starts whenever an object of this class is created,
     * you know, when you do "$login = new Login();"
     */
    public function __construct()
    { 

       if (isset($_POST["Send_Notice_To_All"])) {
                  
            $this->Send_Notification_To_All($_POST['notice']);
     
        } 

        if(isset($_POST['strat_track'])){
          $this->Start_Track($_POST['police_id']);
        }

       

    }

    /**
     * Checks if database connection is opened and open it if not
     */
    private function databaseConnection()
    {
        // connection already opened
        if ($this->db_connection != null) {
            return true;
        } else {
            // create a database connection, using the constants from config/config.php
            try {
                $this->db_connection = new PDO('mysql:host='. DB_HOST .';dbname='. DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
                return true;
            } catch (PDOException $e) {
                $this->errors[] = MESSAGE_DATABASE_ERROR;
                return false;
            }
        }
    }

    // Funtion to send notification to all the users 
    public function Send_Notification_To_All($Notice){
                                
                                include_once 'GCM.php';
                                $gcm = new GCM();
                                // Select all ids for broadcasting 
                                if($this->databaseConnection()){
                                      $query_get_gcm_key = $this->db_connection->prepare('SELECT gcm_key FROM police_directory');
                                      $query_get_gcm_key->execute();
                                      if( $results_gcm_key = $query_get_gcm_key->fetchObject()  ){

                                          $regId = $results_gcm_key->gcm_key;   
                                          $registatoin_ids = array($regId);
                                          $message =  $Notice;
                                          $message = array("message" => $message); //modifying a little below
                                          $result = $gcm->send_notification($registatoin_ids, $message);                       
                                 }      
                             	  $this->Add_Notice_To_Database($Notice);

    }
    public function Add_Notice_To_Database($Notice){
              if ($this->databaseConnection()) {

                            $query_to_add_in_db = $this->db_connection->prepare('INSERT INTO notice (notice) VALUES (:notice)');

                            $query_to_add_in_db->bindValue(':notice' , $Notice , PDO::PARAM_STR);

                            $query_to_add_in_db->execute();

                             
                      }

    }
    public function Start_Track($gcm_key){
                                include_once 'GCM.php';
                                $gcm = new GCM();
                                $regId = $gcm_key;//"APA91bEoMfb2ci7vwp2ssqUgEERfYrG2H-a5DzE5_bVkngNS_yiJDsEO17gEBRT-VjTHGV0E2XZHhZKd7pmhGXlieiEB2868f3vg7XvwJMHINFrY4B7EjVq0bMYQSkNQOays1hQCk_fp";
                                $registatoin_ids = array($regId);
                                $message = "track";// $Notice;
                                $message = array("message" => $message); //modifying a little below
                                $result = $gcm->send_notification($registatoin_ids, $message);
                           
    }    
}