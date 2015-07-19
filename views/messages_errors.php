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
                    <h4>
                    <?php 
                        if (isset($Police_Management)) {
                            if ($Police_Management->errors) {
                                foreach ($Police_Management->errors as $error) {
                                    echo $error;
                                }
                            }
                            if ($Police_Management->messages) {
                                foreach ($Police_Management->messages as $message) {
                                    echo $message;
                                }
                            }
                    }
                    ?>
                    </h4>
