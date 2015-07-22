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
            <li><i class="fa fa-bars"></i>Manage Police</li>

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
      <br>
      <div class="row">
        <div class="col-lg-12">
          <section class="panel">
            <header class="panel-heading">
              Police Directory
              <div class="btn-group">
               <a href="#myModal-1" data-toggle="modal" class="btn  btn-primary"  >
                 <i class="icon_plus_alt2"></i>
               </a>
             </div>
           </header>
           <table class="table table-striped table-advance table-hover">
             <tbody>
              <tr>
               <th>ID</th>
               <th>First Name</th>
               <th> Middle Name</th>
               <th> Last Name</th>
               <th> Designation</th>
               <th> Phone Number</th>
               <th> Email</th>
               <th> Registration </th>
               <th> Action </th>
             </tr>
             <?php 
            // Display police directory 
             $Police_Management->Display_Police_Directory();
             ?>
           </tbody>
         </table>
       </section>
     </div>
   </div>
   <!-- page end-->
   <!-- Modals -->
   <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal-1" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
          <h4 class="modal-title">Add Police</h4>
        </div>
        <div class="modal-body">
          <div class="panel-body">
            <div class="form">
              <form class="form-validate form-horizontal " id="register_form" method="post" action="manage_police.php?page_id=1">
                <div class="form-group ">
                  <label for="first_name" class="control-label col-lg-3">First Name<span class="required">*</span></label>
                  <div class="col-lg-9">
                    <input class=" form-control" id="first_name" name="first_name" type="text" />
                  </div>
                </div>
                <div class="form-group ">
                  <label for="middle_name" class="control-label col-lg-3">Middle Name <span class="required">*</span></label>
                  <div class="col-lg-9">
                    <input class=" form-control" id="middle_name" name="middle_name" type="text" />
                  </div>
                </div>
                <div class="form-group ">
                  <label for="last_name" class="control-label col-lg-3">Last Name <span class="required">*</span></label>
                  <div class="col-lg-9">
                    <input class="form-control " id="last_name" name="last_name" type="text" />
                  </div>
                </div>
                <div class="form-group ">
                  <label for="designation" class="control-label col-lg-3">Designation<span class="required">*</span></label>
                  <div class="col-lg-9">
                    <input class="form-control " id="designation" name="designation" type="text" />
                  </div>
                </div>
                <div class="form-group ">
                  <label for="phone_number" class="control-label col-lg-3">Phone Number <span class="required">*</span></label>
                  <div class="col-lg-9">
                    <input class="form-control " id="phone_number" name="phone_number" type="number" />
                  </div>
                </div>
                <div class="form-group ">
                  <label for="email_id" class="control-label col-lg-3">Email <span class="required">*</span></label>
                  <div class="col-lg-9">
                    <input class="form-control " id="email_id" name="email_id" type="email" />
                  </div>
                </div>                                      
                <div class="form-group">
                  <div class="col-lg-offset-2 col-lg-10">
                   <center>
                     <button class="btn btn-primary" name="register"type="submit">Save</button>
                   </center>
                 </div>
               </div>
             </form>
           </div>
         </div>
       </div>
     </div>
   </div>
 </div> 

 <?php 

 include('_footer.php');

 ?>