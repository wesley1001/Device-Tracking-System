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
                  
            $this->Send_Notification_To_All();


     
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
    public function Send_Notification_To_All(){
                                include_once 'GCM.php';
          
                                $gcm = new GCM();
    


                                $registatoin_ids = "9897";//array($regId);
                                
                                $message = "sandkjnsa";//array("message" => $message); //modifying a little below

                                //$message = array($message);

                                $result = $gcm->send_notification($registatoin_ids, $message);


/*      
                 if ($this->databaseConnection()) {

                            $query_display_police_directory = $this->db_connection->prepare('SELECT * FROM police_directory LIMIT '.$start.' , '.$limit.'');


                            $query_display_police_directory->execute();
                             while ($result = $query_display_police_directory->fetchObject()) {
                              // Code to send notification to all the users 

                                $registatoin_ids = "9897";array($regId);
                                
                                $message = "sandkjnsa";array("message" => $message); //modifying a little below

                                //$message = array($message);

                                $result = $gcm->send_notification($registatoin_ids, $message);


                         
                            }
                      }

*/


    }
    
}
