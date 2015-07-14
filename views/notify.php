<?php

    include('_header.php');

?>
            
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa fa-bars"></i> Notify</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
                        	<li><i class="fa fa-bars"></i>Notify</li>
					
                    </ol>
                </div>
            </div>
             <!-- page start-->
             <center>
                     	<!--Display errors and messages  -->
        				<?php
        					
        					include('messages_errors.php'); 

        				?>

     		     </center>

                      <div class="row">
                       
                          <!-- CKEditor -->
                          <div class="col-lg-12">
                              <section class="panel">
                                  <header class="panel-heading">
                                    <center>
                                       Write a notice .
                                    </center>
                                  </header>
                                  <div class="panel-body">
                                      <div class="form">
                                          <form action="#" class="form-horizontal">
                                              <div class="form-group">
                                                  <label class="control-label col-sm-2">Create A Notice</label>
                                                  <div class="col-sm-10">
                                                      <textarea class="form-control ckeditor" name="editor1" rows="6" required></textarea>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <div class="col-sm-12">
                                                    <center>
                                                      <input type="submit" class="btn btn-primary" name="send_notice" value="Send Notice">
                                                    </center>
                                                  </div>
                                              </div>
                                          </form>
                                      </div>
                                  </div>
                              </section>
                          </div>
                      </div>  



              <!-- page end-->
 <?php 

    include('_footer.php');

?>