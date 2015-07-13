<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
            });
        </script>
    </head>
    <body>
        
        <?php
             include_once './db_config.php';

                $database = "push_notification";
                $host_of_db = "localhost";
                $username_of_db = "push_user";
                $password_of_db = "push_password";

                //echo $host_of_db."<br><br>".$username_of_db."<br><br>".$password_of_db."<br><br>".$database."<br><br>";
                $con = mysqli_connect($host_of_db, $username_of_db, $password_of_db, $database);

                if (!$con) {
                  echo "There is a problem in connection to database ...." . mysqli_connect_error();
                  die();
                }

            $query = "SELECT * FROM `gcm_users` ORDER BY `id` DESC LIMIT 1";
            //echo "<br><br>".$query."<br><br>";
            $result = mysqli_query($con, $query);
            //var_dump($result);

            $gcm_regid;

            while ( $result_array = mysqli_fetch_assoc($result) ) {
                $gcm_regid = $result_array['gcm_regid'];
                echo "<br><br>id = ".$result_array['id']."<br>";
                echo "<br>gcm_regid = <br>".$result_array['gcm_regid']."<br>";
                echo "<br>name = ".$result_array['name']."<br>";
                echo "<br>email = ".$result_array['email']."<br>";
            } 
            
            echo "<br><br>".$gcm_regid."<br><br>";
        ?>
        <form name="" method="get" action="send_message.php">
            <p>regId :</p>
			<input type="text" name="regId" value=<?php echo $gcm_regid?> />
            <p>message :</p>
			<input type="text" name="message" value="track" />
			<p></p>
			<input type="submit" value="Send Notification"/>
		</form>
    </body>
</html>
