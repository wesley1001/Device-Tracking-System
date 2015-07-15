<?php

    include('_header.php');

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
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                      
                    <center>
                      <!-- 
                        <h3>Search</h3>
                        <form class="">
                              <input class="form-control"  placeholder="Search" type="text">
                              <input class="form-control"  type="submit" value="submit">
                        
                        </form>
                      -->
                    </center>
                
                </div>  
                <div class="col-sm-4"></div>
                
             </div>
             <br>
             <br>
            <?php 
                $a = 21.1458004;
                $b = 79.0000000;
                 echo '  <script>
                      var myCenter=new google.maps.LatLng('.$a.','.$b.');

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
                  ';
            ?>
              <div class="row">
                <div class="col-sm-12">
                   <center>
                         <div id="googleMap" style="width:1000px;height:380px;">
                         </div>
                  </center>

                </div>
              </div>
            
            


              <!-- page end-->
 <?php 

    include('_footer.php');

?>

