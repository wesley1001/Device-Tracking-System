<?php

class Login
{

    private $user_id = null;
    
    private $user_name = "";
    
    private $user_is_logged_in = false;
    
    public $errors = array();
    
    public $messages = array();

    public function __construct()
    {
        // create/read session
        session_start();

        // if user tried to log out
        if (isset($_GET["logout"])) {
            $this->doLogout();
        } elseif (!empty($_SESSION['user_name']) ) {

            $this->loginWithSessionData();
        
        } elseif (isset($_POST["login"])) {

            $this->loginWithPostData($_POST['user_name'], $_POST['user_password']);
        
        }

    }


    private function loginWithSessionData()
    {
        $this->user_name = $_SESSION['user_name'];
        $this->user_is_logged_in = true;
    }

    private function loginWithPostData($user_name, $user_password)
    { 

                if($user_name == "track" && $user_password == "track" ){                        
                    $_SESSION['user_name'] = $user_name;                
                    // declare user id, set the login status to true
                    $this->user_name = $user_name;
                    $this->user_is_logged_in = true;
            }else{

                $this->messages[] = "You have entered wrong credentials . Please try again or contact developer .";
            }
    }


    /**
     * Perform the logout, resetting the session
     */
    public function doLogout()
    {
        $_SESSION = array();
        session_destroy();

        $this->user_is_logged_in = false;
        $this->messages[] = "Done!";
    }

    public function isUserLoggedIn()
    {
        return $this->user_is_logged_in;
    }


    public function getUsername()
    {
        return $this->user_name;
    }

}
