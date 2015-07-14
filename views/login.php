<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Project for Mumbai Police">
    <meta name="author" content="Pratik Upacharya">
    <meta name="keyword" content="">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Dashboard For Device Tracking System</title>

    <!-- Bootstrap CSS -->    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

</head>

  <body class="login-img3-body">

    <div class="container">
    <center>
        <?php
            include('messages_erros.php'); 
        ?>
        </center>
        <form class="login-form" action="index.php" method ="post">        
        <div class="login-wrap">
            <p class="login-img"><i class="icon_lock_alt"></i></p>
            <div class="input-group">
              <span class="input-group-addon"><i class="icon_profile"></i></span>
              <input type="text" name="user_name" class="form-control" placeholder="Username" autofocus required>
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                <input type="password" name="user_password" class="form-control" placeholder="Password" required>
            </div>
            <button class="btn btn-primary btn-lg btn-block" name ="login" type="submit">Login</button>
        </div>
      </form>

    </div>


  </body>
</html>
