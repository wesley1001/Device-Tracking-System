                <h4>
                    <?php 
                            if (isset($login)) {
                        if ($login->errors) {
                            foreach ($login->errors as $error) {
                                echo $error;
                            }
                        }
                        if ($login->messages) {
                            foreach ($login->messages as $message) {
                                echo $message;
                            }
                        }
                    }
                    ?>
                    </h4>
