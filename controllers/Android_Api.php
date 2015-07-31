<?php

class Android_Api
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
    public function __construct()
    { 
        

    }

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
    
   public  function Verify_User($Phone_Number , $Email , $Gcm_Key){

        if ($this->databaseConnection()) {

                            $query_to_search_user = $this->db_connection->prepare('SELECT id FROM police_directory WHERE email_id =:email_id  AND phone_number =:phone_number');

                            $query_to_search_user->bindValue(':email_id' , $Email , PDO::PARAM_STR);
                
                            $query_to_search_user->bindValue(':phone_number' , $Phone_Number , PDO::PARAM_STR);
                
                            $query_to_search_user->execute();
                            
                            $Result = $query_to_search_user->fetchObject();
                            $User_Id = $Result->id;
			
			
			 //           $result = $query_to_search_user->fetchAll();

			            if (count($Result) > 0) {
				
						   	 if( $this->Store_Gcm_Key($Gcm_Key,$User_Id)){
						   	 	
			                           		   return $User_Id ;// 1;// $values->id ; 
			                
						   	 }
			                            
						
					}else{
							   		 
			                              return null ; 
			                           
					
					}
						
			
		
                            
              }

   }    
    
  public function Store_Gcm_Key( $Gcm_Key, $User_Id ){
		    if($this->databaseConnection()){
		                
		                $query_to_update_gcm_key = $this->db_connection->prepare('UPDATE police_directory SET gcm_key =:gcm_key, registered = 1 WHERE id =:uid');
		                
		                $query_to_update_gcm_key->bindValue(':uid', $User_Id ,PDO::PARAM_INT );
		                
		                $query_to_update_gcm_key->bindValue(':gcm_key',$Gcm_Key ,PDO::PARAM_STR );
		                
		                $query_to_update_gcm_key->execute();
		            }
		return true;
  }     
  
  
   public function Add_Locations( $lat , $long , $userid ){
              if ($this->databaseConnection()) {

                            $query_to_add_in_db = $this->db_connection->prepare('INSERT INTO location ( latitude  , longitude , uid , time   ) VALUES ( :lat , :long , :userid , now())');
                            $query_to_add_in_db->bindValue(':lat' , $lat , PDO::PARAM_STR);
                            $query_to_add_in_db->bindValue(':long' , $long , PDO::PARAM_STR);
			                      $query_to_add_in_db->bindValue(':userid' , $userid , PDO::PARAM_STR);
                            $query_to_add_in_db->execute();
                             
                      }

    }
    

}