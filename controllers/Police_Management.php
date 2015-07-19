<?php

class Police_Management
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

        // if we have such a POST request, call the registerNewUser() method
        if (isset($_POST["register"])) {
      
            $this->registerNewUser($_POST['first_name'], $_POST['middle_name'], $_POST['last_name'], $_POST['email_id'], $_POST["phone_number"], $_POST['designation']);
     
        } 
        // To delete a particulat police 
        if(isset($_POST["delete_police"])){
            $this->Delete_Police_Directory($_POST['delete_police_directory']);
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

    private function registerNewUser($first_name, $middle_name, $last_name, $email_id,$phone_number,$designation)
    {
        $user_name  = trim($first_name);
        $user_email = trim($email_id);

     if ($this->databaseConnection()) {
            // check if username or email already exists
            $query_check_user_name = $this->db_connection->prepare('SELECT first_name, email_id FROM police_directory WHERE  email_id=:user_email');
            $query_check_user_name->bindValue(':user_email', $email_id, PDO::PARAM_STR);
            $query_check_user_name->execute();
            $result = $query_check_user_name->fetchAll();

            // if username or/and email find in the database
            // TODO: this is really awful!
            if (count($result) > 0) {
                for ($i = 0; $i < count($result); $i++) {
                    $this->errors[] = "This person is already added or you are adding same email id . Please check your directory . ";
                }
            } else {
           
                $query_new_user_insert = $this->db_connection->prepare('INSERT INTO police_directory (first_name, middle_name, last_name, email_id, phone_number, designation , entry_time) VALUES(:first_name, :middle_name, :last_name, :email_id ,:phone_number, :designation, now() )');
                $query_new_user_insert->bindValue(':first_name', $first_name, PDO::PARAM_STR);
                $query_new_user_insert->bindValue(':middle_name', $middle_name, PDO::PARAM_STR);
                $query_new_user_insert->bindValue(':last_name', $last_name, PDO::PARAM_STR);
                $query_new_user_insert->bindValue(':email_id', $email_id, PDO::PARAM_STR);
                $query_new_user_insert->bindValue(':phone_number', $phone_number, PDO::PARAM_INT);
                $query_new_user_insert->bindValue(':designation', $designation, PDO::PARAM_STR);
                $query_new_user_insert->execute();
                $user_id = $this->db_connection->lastInsertId();

                if ($query_new_user_insert) {
                        $this->errors[] = "Data added successfully";
                } else {
                        $this->errors[] = "Error in adding data . Please try again . " ;
                }
            }
        }
    }

    public function Display_Police_Directory(){
            
              $start=0;
              $limit=10;

             if(isset($_GET['page_id']))
                {
                    $page_id=$_GET['page_id'];
                    $start=($page_id-1)*$limit;
                
                }


                 if ($this->databaseConnection()) {

                            $query_display_police_directory = $this->db_connection->prepare('SELECT * FROM police_directory LIMIT '.$start.' , '.$limit.'');

                            $query_display_police_directory->execute();
                            $count = 1;
                           while ($result = $query_display_police_directory->fetchObject()) {
                                # code...
                                echo '
                                     <tr>
                                         <td>'.$result->id.'</td>
                                         <td>'.$result->first_name.'</td>
                                         <td>'.$result->middle_name.'</td>
                                         <td>'.$result->last_name.'</td>
                                         <td>'.$result->designation.'</td>
                                         <td>'.$result->phone_number.'</td>
                                         <td>'.$result->email_id.'</td>
                                         <td>'.$result->registered.'</td>               
                                         <td>
                                          <div class="btn-group">
                                       
                                            <form class="form" method="post" action="manage_police.php?page_id='.$page_id.'" >
                                                <div class="form-group">
                                                <input type="hidden" class="form-control" id="header"  name="delete_police_directory"  value = '.$result->id.'>
                                                </div>
                                                <div class="form-group">
                                                     <div class="btn-group">
                                                        
                                                        <a class="btn btn-success" href="#"><i class="icon_check_alt2"></i></a>
                                                  
                                                        <button type="submit" class="btn btn-danger" name="delete_police"><i class="icon_close_alt2"></i></button>
                                                    </div>         
                                                </div>
                                            </form>

                                          </div>
                                          </td>
                                    </tr>
                                ';

                            } 
                                         
                              // Pagination Code
                              $total = 10;//ceil($rows/$limit);

                              
                              echo "<ul class='pagination pagination-lg pull-right'>";
                                    
                                    if($page_id>1)
                                    {
                                    
                                      echo "<a href='manage_police.php?page_id=".($page_id-1)."' class='button'><<</a>";
                                    
                                    }
                                    

                                        for($i=1;$i<=$total;$i++)
                                        {
                                            if($i==$page_id) { 
                                                echo "<li class='current'>".$i."</li>";
                                            }else { 
                                                  echo "<a href='manage_police.php?page_id=".$i."'>".$i."</a> ";
                                            }
                                        }
                                    if($page_id!=$total)
                                    {
                                    
                                      echo "<a href='manage_police.php?page_id=".($page_id+1)."' class='button'>>></a>";
                                    
                                    }



                              echo "</ul>";



            

              }
    }

    public function Delete_Police_Directory($id){
                    if($this->databaseConnection()){
                    $query_achievement = $this->db_connection->prepare('DELETE FROM police_directory  WHERE id = :delete_ids');
                    $query_achievement->bindValue(':delete_ids', $id ,PDO::PARAM_INT);
                    $query_achievement->execute();
                    if ($query_achievement->rowCount() > 0) {

                        $this->messages[] = "Police  deleted successfully!";

                    } else {

                        $this->errors[] = "Error in deleting  . ";

                    }           


    }
}
    
}
