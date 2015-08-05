<?php
// include the config
require_once('config/config.php');
// load the login class
require_once('controllers/Notification_Management.php');
$Notification_Management = new Notification_Management();
//   include('views/_header.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Website for Mumbai Police">
    <meta name="author" content="Pratik Upacharya">
    <meta name="keyword" content="">
    <link rel="shortcut icon" href="img/favicon.png">
    <title>Device Tracking System</title>
    <!-- Bootstrap CSS -->    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
    <link href="css/timeline.css" rel="stylesheet" />
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
      <script src="js/lte-ie7.js"></script>
    <![endif]-->
    <!-- Import Google Maps -->
  </head>
  <body>
  <!-- container section start -->
  <section id="container" class="">
      <!--header start-->
<?php 
	if(isset( $_GET["page_id"] , $_GET["user_id"] )){
        $page_id = $_GET["page_id"];
        $user_id = $_GET["user_id"];
    echo '
          <!-- /.panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-clock-o fa-fw"></i> Notifications
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <ul class="timeline">
                                ';
                                $Notification_Management->Display_Notifications( $page_id , $user_id ) ;                               
                                echo '
                            </ul>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
    ';    	
	}
?>