<?php
session_start();
//Checking User Logged or Not
if(empty($_SESSION['user'])){
  header("Location:http://localhost/epaktourisum/login.php");
}
//Restrict User or Moderator to Access Admin.php page
if($_SESSION['user']['role']=='Event Organisor'){
  header("http://localhost/epaktourisum/admin/eventOrg_dash/index.php");
}
if($_SESSION['user']['role']=='Tourist'){
  header("http://localhost/epaktourisum/admin/TouristDashboard/index.php");
}
if($_SESSION['user']['role']=='TouristGuider'){
  header("http://localhost/epaktourisum/admin/TouristGuiderDashboard/index.php");
}
if($_SESSION['user']['role']=='Infulencer'){
  header("http://localhost/epaktourisum/admin/InfulencerDashboard/index.php");
}
if($_SESSION['user']['role']=='Blogger'){
  header("http://localhost/epaktourisum/admin/ExpolrePakistanDashboard/index.php");
}
if($_SESSION['user']['role']=='Vister'){
  header("http://localhost/epaktourisum/admin/ExpolrePakistanDashboard/index.php");
}
if($_SESSION['user']['role']=='Admin'){
  header("http://localhost/epaktourisum/admin/adminDashboard/index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php include "TouristGuiderParticle/headsec.php"?>
<link rel="stylesheet" href="TouristGuider_Dashboard/public/style/TouristGuideProfile.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<style> a {text-decoration: none;}</style>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">

  <!-- Preloader -->
  <?php include 'TouristGuiderParticle/preloader.php'?>
 
  <!-- Navbar -->
  <?php include 'TouristGuiderParticle/navar.php'?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->

  <?php include 'TouristGuiderParticle/sidebar.php'?>
    <!-- Sidebar -->

<!-- Form UI Here  -->

    <section class="">
   <!-- header slider section start  -->
    <div className="touristProfile">
        <div class="container-fluid">
                <div>
                    <div id="booking" class="section">
                      <div class="section-center">
                        <div class="container">
                          <div class="row">
                            <div class="booking-form">
                              <div class="form-header">
                                <h1>Tourist Guider Registration</h1>
                              </div>
                              <?php include_once'profiledata.php'?>
                              <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data" >
                                <div class="form-group">
                                  <input class="form-control" type="text" placeholder="Enter Your Name"  name="displayName"  id="form_displayname" />
                                  <span class="error_form" id="displayname_error_message"></span>
                                  <span class="form-label">Profile Name</span>
                                </div>
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <input class="form-control" type="email" name="displayEmail" placeholder="Enter Your Email"  id="form_displayemail"  />
                                      <span class="error_form" id="displayemail_error_message"></span>
                                      <span class="form-label">Profile Email</span>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <input class="form-control" type="number" name="displayPhone" placeholder="Enter Your Phone Number"   id="form_displayphone" />
                                      <span class="error_form" id="displayphone_error_message"></span>
                                      <span class="form-label">Profile Phone Num</span>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <input class="form-control" type="text" name="address" placeholder="Enter Your address"  id="form_address"  />
                                      <span class="error_form" id="address_error_message"></span>
                                      <span class="form-label">address</span>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <input class="form-control" type="text" name="cnic" placeholder="Enter Your cnic" id="form_cnic"  />
                                      <span class="error_form" id="cnic_error_message"></span>
                                      <span class="form-label">cnic No.</span>
                                    </div>
                                  </div>  
                                </div>
                                <div class="row">
                                  <div class="col-md-4">
                                    <div class="form-group">
                                      <input class="form-control" type="text" name="fb" placeholder="Enter Your Facebook link"   />
                                      <span class="form-label">Facebook Link</span>
                                    </div>
                                  </div>
                                  <div class="col-md-4">
                                    <div class="form-group">
                                      <input class="form-control" type="text" name="instagram" placeholder="Enter Your instagram link"  />
                                      <span class="form-label">fb Link.</span>
                                    </div>
                                  </div> 
                                  <div class="col-md-4">
                                    <div class="form-group">
                                      <input class="form-control" type="text" name="twitter" placeholder="Enter Your twitter"  />
                                      <span class="form-label"> twitter Link.</span>
                                    </div>
                                  </div>  
                                </div>
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <input class="form-control" type="text" placeholder="Enter your Offer Services"  name="services" id="form_services" />
                                      <span class="error_form" id="services_error_message"></span>
                                      <span class="form-label">Services Provide</span>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <input class="form-control" type="text" placeholder="Enter you Services Aeras" name="servicesaera" id="form_servicesaeras" />
                                      <span class="error_form" id="servicesaeras_error_message"></span>
                                      <span class="form-label">Services Aeras</span>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-8">
                                    <div class="form-group">
                                      <input class="form-control" type="number" placeholder="Enter your Services Rates PKR"  name="servicescharges" id="form_servicescharges"/>
                                      <span class="error_form" id="servicescharges_error_message"></span>
                                      <span class="form-label">Services Charges PerHours</span>
                                    </div>
                                  </div>
                                  <div class="col-md-4">
                                    
                                    <div class="form-group" style="margin-top: 6px;">
                                      
                                      <input class="form-control"  type="file" name="image" id="form_image" />
                                      <span class="error_form" id="image_error_message"></span>
                                    </div>
                                  </div>
                                </div>
                                <div class="row mb-5">
                                  <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                      <div class="form-group">
                                        <div class="tripdescription container-fluid">
                                          <label for="Describe Yourself"> </label>
                                          <textarea  id="tripdescription" cols="40" rows="40" class="form-control"
                                            defaultValue="" name="aboutme" ></textarea>
                                            <span class="error_form" id="aboutme_error_message"></span>
                                          <span class="form-label">About Me:</span>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                                </div>
                                <div class="form-btn">
                                  <button class="submit-btn" type="submit" vaule="save" name="save">Register Now</button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
    </div>


    </section>

  </div>
 

  <!-- Main Footer -->
  <?php include 'TouristGuiderParticle/footer.php'?>
</div>
<!-- FormValidation -->
<script type="text/javascript">
$(function() {

    $("#displayname_error_message").hide();
    $("#displayemail_error_message").hide();
    $("#address_error_message").hide();
    $("#displayphone_error_message").hide();
    $("#cnic_error_message").hide();
    $("#services_error_message").hide();
    $("#servicesaeras_error_message").hide();
    $("#servicescharges_error_message").hide();
    $("#image_error_message").hide();
    $("#aboutme_error_message").hide();
   

    var error_displayname= false;
    var error_displayemail = false;
    var error_displayphone = false;
    var error_address = false;
    var error_cnic = false;
    var error_services = false;
    var error_servicesaeras = false;
    var error_servicescharges = false;
    var error_image= false;
    var error_aboutme = false;

    $("#form_displayname").focusout(function(){
            check_displayname();
         });
    $("#form_displayemail").focusout(function(){
            check_displayemail();
         });
    $("#form_displayphone").focusout(function(){
            check_displayphone();
         });
    $("#form_address").focusout(function(){
            check_address();
         });
    $("#form_cnic").focusout(function(){
            check_cnic();
         });
    $("#form_services").focusout(function(){
            check_services();
         });
    $("#form_servicesaeras").focusout(function(){
            check_servicesaeras();
         });
    $("#form_servicescharges").focusout(function(){
            check_servicescharges();
         });
     $("#tripdescription").focusout(function(){
            check_aboutme();
         });

         function check_displayname() {
            var pattern = /^[a-z A-Z]*$/;
            var displayname = $("#form_displayname").val();
            if (pattern.test(displayname) && displayname !== '') {
               $("#displayname_error_message").hide();
               $("#form_displayname").css("border","6px solid #34F458");
            } else {
               $("#displayname_error_message").html("Should contain only Characters");
               $("#displayname_error_message").show();
               $("#form_displayname").css("border","6px solid #F90A0A");
               error_displayname = true;
            }
         }

         function check_displayemail() {
            var pattern = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
            var displayemail = $("#form_displayemail").val();
            if (pattern.test(displayemail) && displayemail !== '') {
               $("#displayemail_error_message").hide();
               $("#form_displayemail").css("border","6px solid #34F458");
            } else {
               $("#displayemail_error_message").html("Invalid displayemail");
               $("#displayemail_error_message").show();
               $("#form_displayemail").css("border","6px solid #F90A0A");
               error_displayemail = true;
            }
         }
         function check_displayphone() {
            var pattern = /^[0-9-+]+$/; 
            var displayphone = $("#form_displayphone").val();
            if (pattern.test(displayphone) && displayphone !== '') {
               $("#displayphone_error_message").hide();
               $("#form_displayphone").css("border","6px solid #34F458");
            } else {
               $("#displayphone_error_message").html("displayphone Number is Not Valid");
               $("#displayphone_error_message").show();
               $("#form_displayphone").css("border","6px solid #F90A0A");
               error_displayphone = true;
            }
         }
         function check_address() {
          
            var address = $("#form_address").val();
            if (address !== '') {
               $("#address_error_message").hide();
               $("#form_address").css("border","6px solid #34F458");
            } else {
               $("#address_error_message").html("Please Fill it out.!");
               $("#address_error_message").show();
               $("#form_address").css("border","6px solid #F90A0A");
               error_address = true;
            }
         }
         function check_cnic() {
            var pattern = /^[0-9+]{5}-[0-9+]{7}-[0-9]{1}$/; 
            var cnic = $("#form_cnic").val();
            if (pattern.test(cnic) && cnic !== '') {
               $("#cnic_error_message").hide();
               $("#form_cnic").css("border","6px solid #34F458");
            } else {
               $("#cnic_error_message").html("CNIC is Not Valid,Please Provide Valid CNIC XXXXX-XXXXXXX-X" );
               $("#cnic_error_message").show();
               $("#form_cnic").css("border","6px solid #F90A0A");
               error_cnic = true;
            }
         }
         function check_services() {
            var services = $("#form_services").val();
            if (services !== '') {
               $("#services_error_message").hide();
               $("#form_services").css("border","6px solid #34F458");
            } else {
               $("#services_error_message").html("Please Fill it Out" );
               $("#services_error_message").show();
               $("#form_services").css("border","6px solid #F90A0A");
               error_services = true;
            }
         }
         function check_servicesaeras() {
            var servicesaeras = $("#form_servicesaeras").val();
            if (servicesaeras !== '') {
               $("#servicesaeras_error_message").hide();
               $("#form_servicesaeras").css("border","6px solid #34F458");
            } else {
               $("#servicesaeras_error_message").html("Please Fill it Out" );
               $("#servicesaeras_error_message").show();
               $("#form_servicesaeras").css("border","6px solid #F90A0A");
               error_servicesaera = true;
            }
         }
         function check_servicescharges() {
            var servicescharges = $("#form_servicescharges").val();
            if (servicescharges !== '') {
               $("#servicescharges_error_message").hide();
               $("#form_servicescharges").css("border","6px solid #34F458");
            } else {
               $("#servicescharges_error_message").html("Please Fill it Out" );
               $("#servicescharges_error_message").show();
               $("#form_servicescharges").css("border","6px solid #F90A0A");
               error_servicescharges = true;
            }
         }
         function check_aboutme() {
            
            var aboutme = $("#tripdescription").val();
            if (aboutme !== '') {
               $("#aboutme_error_message").hide();
               $("#tripdescription").css("border","6px solid #34F458");
            } else {
               $("#aboutme_error_message").html("Please Fill it Out");
               $("#aboutme_error_message").show();
               $("#tripdescription").css("border","6px solid #F90A0A");
               error_aboutme = true;
            }
         }
});

</script>


<script src="TouristGuider_Dashboard/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="TouristGuider_Dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="TouristGuider_Dashboard/dist/js/adminlte.js"></script>
</body>
</html>
