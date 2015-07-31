<?php

    include('_header.php');
   require_once('controllers/Police_Management.php');
    $Police_Management = new Police_Management();

?>
            
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa fa-bars"></i> Home</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
                    </ol>
                </div>
            </div>
             <!-- page start-->
             <div class="row">
                <div class="col-sm-12">
                      
                    <center>
                      <form class="form-inline" role="form" action="index.php" method="post" >
                            <div class="form-group">
                                <label class="sr-only" for="exampleInputEmail2">Search Here</label>
                                <input type="text"  name = "data" class="form-control sm-input" id="exampleInputEmail5" placeholder="Enter ">
                            </div>
                            <div class="form-group">
                                              <label class="label_radio" for="radio-01">
                                                  <input name="type" id="radio-01" value="0" type="radio" checked /> Email Id
                                              </label>
                                              <label class="label_radio" for="radio-02">
                                                  <input name="type" id="radio-02" value="1" type="radio" /> Phone Number
                                              </label>
                                  
                               </div>
                            <button type="submit" name="search_device" class="btn btn-success">Search</button>
                      </form>
                    </center>
                </div>  
             </div>
             <br>
             <br>

             <?php 
                  if($Police_Management->Check_Data()){
                    
                        echo " Name :";
                        echo $Police_Management->Police_Information[1];
                        echo " ";
                        echo $Police_Management->Police_Information[2];
                        echo " ";
                        echo $Police_Management->Police_Information[3];
                        echo " ";
                        echo "<br>";

                   

                           echo '  <script>
                                            var myCenter=new google.maps.LatLng('.$Police_Management->Police_Information[5].','.$Police_Management->Police_Information[6].');

                                            function initialize() {
                                              var mapProp = {
                                                center:myCenter,
                                                zoom:16,
                                                mapTypeId:google.maps.MapTypeId.HYBRID
                                              };
                                              var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
                                              var marker=new google.maps.Marker({
                                                position:myCenter,
                                                });

                                                marker.setMap(map);
                                              }
                                            google.maps.event.addDomListener(window, \'load\', initialize);
                                   </script>
                                <div class="row">
                                  <div class="col-sm-6">
                                     <center>
                                              <!-- Write a code to send notification to mobile to live track -->
                                      <form class="form-inline" role="form" action="index.php" method="post" >
                                              
                                               <input type="hidden"  name = "police_id" class="form-control sm-input"  value= '.$Police_Management->Police_Information[4].'>
                              
                                               <button type="submit" name="start_track" class="btn btn-success">Start Track</button>
                   
                                      </form>
                                    </center>

                                  </div>

                                  <div class="col-sm-6">
                                     <center>
                                              <!-- It should open a modle -->
                                               
                                          <button type="submit"  class="btn btn-success">Send Notification</button>
                       

                                    </center>

                                  </div>
                                </div>
                                <br>
                                <div class="row">
                                  <div class="col-sm-12">
                                     <center>
                                           <div id="googleMap" style="width:1000px;height:380px;">
                                           </div>
                                    </center>

                                  </div>
                                </div>
                           ';

                  }else{
                                      
                  }

             ?>
            
              <!-- page end-->
 <?php 
    include('_footer.php');
?>

