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
  <?php  include "particles/headsec.php"?>
  <link rel="stylesheet" href="ExpolrePakistanDashboard/public/style/explorePakistanProfile.css">
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <style> a {text-decoration: none;}</style>
  <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Preloader --> 
  <?php  include "particles/preloader.php"?>

  <!-- Navbar -->
  <?php  include "particles/navar.php"?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php  include "particles/sidebar.php"?>


  
    <section class="content">
        <div className="touristProfile">
            <div class="container-fluid">
                    <div>
                        <div id="booking" class="section">
                          <div class="section-center">
                            <div class="container">
                              <div class="row">
                                <div class="booking-form">
                                  <div class="form-header">
                                    <h1>Expolre Pakistan</h1>
                                    <p>We're to Expolre Such aera Of Pakistan thats unknow to World</p>
                                    <p>Be a part of Our Team,Write a Post and Earn </p>
                                  </div>
                                  <?php include_once 'blogpostdata.php'?>
                                 <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data" >
                                    <div class="row">
                                        <div class="col-mad-4">
                                            <div class="form-group">
                                            <input class="form-control" type="text" placeholder="Enter Author Name"  name="displayname" id="form_name"/>
                                            <span class="error_form" id="name_error_message"></span>
                                            <span class="form-label">Author Name</span>
                                            </div>
                                        </div>
                                  
                                      <div class="col-md-4">
                                        <div class="form-group">
                                          <input class="form-control" type="email" name="displayemail" placeholder="Enter Your Email" id="form_email" />
                                          <span class="error_form" id="email_error_message"></span>
                                          <span class="form-label">Email</span>
                                        </div>
                                      </div>
                                      <div class="col-md-4">
                                        <div class="form-group">
                                          <input class="form-control" type="number" name="displayphone" placeholder="Enter Your Phone Number" id="form_phone" />
                                          <span class="error_form" id="phone_error_message"></span>
                                          <span class="form-label">Phone Num</span>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                              <input class="form-control" type="file" name="image" placeholder="Enter Your Image/Place-Photo" id="image" />
                                              <span class="error_form" id="image_error_message"></span>
                                              <span class="filelabel"> Destination Image</span>
                                            </div>
                                          </div>  
                                    </div>
                                    <div class="row">
                                      <div class="col-md-3">
                                        <div class="form-group">
                                          <input class="form-control" type="text" name="destination" placeholder="Enter Destination Name" id="form_address" />
                                          <span class="error_form" id="address_error_message"></span>
                                          <span class="form-label">Destination Place</span>
                                        </div>
                                      </div>
                                      <div class="col-md-3">
                                        <div class="form-group">
                                          <input class="form-control" type="text" name="province" placeholder="Enter Destination Province/State/Nearlocation Name" id="form_province" />
                                          <span class="error_form" id="province_error_message"></span>
                                          <span class="form-label">Destination Place Province</span>
                                        </div>
                                      </div>
                                      <div class="col-md-3">
                                      <div class="form-group">
                                        <input class="form-control" type="date" name="posteddate" placeholder="Posted Date"  id="date"/>
                                        <span class="error_form" id="date_error_message"></span>
                                        <span class="form-label">Posted Date</span>
                                      </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                          <input class="form-control" type="text" name="nearestlocation" placeholder="Enter Nearest Location"id="form_location" />
                                          <span class="error_form" id="location_error_message"></span>
                                          <span class="form-label">Nearest Location </span>
                                        </div>
                                      </div>
                                    </div>
                                      <div class="row">
                                        <div class="col-md-3">
                                          <div class="form-group">
                                            <input class="form-control" type="text" name="aeratag1" placeholder="Enter  Aera Tag" id="aera1" />
                                            <span class="error_form" id="aera1_error_message"></span>
                                            <span class="form-label">Aera Tags</span>
                                          </div>
                                        </div>
                                        <div class="col-md-3">
                                          <div class="form-group">
                                            <input class="form-control" type="text" name="aeratag2" placeholder="Enter another aera Tag"  id="aera2"/>
                                            <span class="error_form" id="aera2_error_message"></span>
                                            <span class="form-label">Aera Tags</span>
                                          </div>
                                        </div> 
                                        <div class="col-md-3">
                                          <div class="form-group">
                                            <input class="form-control" type="text" name="aeratag3" placeholder="Enter another aera Tag" id="aera3" />
                                            <span class="error_form" id="aera3_error_message"></span>
                                            <span class="form-label">Aera Tags</span>
                                          </div>
                                        </div> 
                                        <div class="col-md-3">
                                          <div class="form-group">
                                            <input class="form-control" type="text" name="aeratag4" placeholder="Enter another aera Tag" id="aera4" />
                                            <span class="error_form" id="aera4_error_message"></span>
                                            <span class="form-label">Aera Tags</span>
                                          </div>
                                        </div>  
                                      </div>
                                      <div class="row">
                                        <div class="col-md-12">
                                          <div class="form-group">
                                            <div class="tripdescription">
                                              <label for="Write about Destination"> </label>
                                              <textarea  id="tripdescription" cols="30" rows="30" class="form-control"
                                                defaultValue="" name="tripdescription"></textarea>
                                                <span class="error_form" id="tripdescription_error_message"></span>
                                              <span class="form-label">Write about Destination:</span>
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-3">
                                        <div class="form-group">
                                          <input class="form-control" type="text" name="fb" placeholder="Copy your Facebook link Here"  id="form_fb"/>
                                          <span class="error_form" id="fb_error_message"></span>
                                          <span class="form-label">Facebook Link</span>
                                        </div>
                                      </div>
                                      <div class="col-md-3">
                                        <div class="form-group">
                                          <input class="form-control" type="text" name="instagram" placeholder="Copy your instagram link Here"  id="form_instagram"/>
                                          <span class="error_form" id="instagram_error_message"></span>
                                          <span class="form-label">Instagram Link</span>
                                        </div>
                                      </div>
                                      <div class="col-md-3">
                                      <div class="form-group">
                                        <input class="form-control" type="text" name="youtube" placeholder="Copy your youtube link Here" id="form_youtube" />
                                        <span class="error_form" id="youtube_error_message"></span>
                                        <span class="form-label">Youtube Link</span>
                                      </div>
                                    </div> 
                                    <div class="col-md-3">
                                        <div class="form-group">
                                          <input class="form-control" type="text" name="blogs" placeholder="Copy your Blogs link Here" id="form_web"/>
                                          <span class="error_form" id="web_error_message"></span>
                                          <span class="form-label">Blogs link </span>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="form-btn">
                                      <button class="submit-btn" name="submit"> Share Now</button>
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
 <?php  include "particles/footer.php"?>
</div>
<script type="text/javascript">
$(function() {
  $("#name_error_message").hide();
  $("#email_error_message").hide();
  $("#phone_error_message").hide();
  $("#image_error_message").hide();
  $("#address_error_message").hide();
  $("#province_error_message").hide();
  $("#date_error_message").hide();
  $("#location_error_message").hide();
  $("#aera1_error_message").hide();
  $("#aera2_error_message").hide();
  $("#aera3_error_message").hide();
  $("#aera4_error_message").hide();
  $("#tripdescription_error_message").hide();
  $("#fb_error_message").hide();
  $("#instagram_error_message").hide();
   $("#youtube_error_message").hide();
   $("#web_error_message").hide();


   var error_name= false;
    var error_email = false;
    var error_phone = false;
    var error_image = false;
    var error_address = false;
    var error_province = false;
    var error_date = false;
    var error_location = false;
    var error_aera1_= false;
    var error_aera2_ = false;
    var error_aera3_ = false;
    var error_aera4__= false;
    var error_tripdescription = false;
    var error_fb_ = false;
    var error_instagram_ = false;
    var error_youtube= false;
    var error_web = false;

    $("#form_name").focusout(function(){
            check_name();
         });

     $("#form_email").focusout(function(){
            check_email();
         });
    $("#form_phone").focusout(function(){
            check_phone();
         });
    $("#form_address").focusout(function(){
            check_address();
         });
    $("#image").focusout(function(){
            check_image();
         });
    $("#form_province ").focusout(function(){
            check_province ();
         });
    $("#date").focusout(function(){
            check_date();
         });
    $("#form_location").focusout(function(){
            check_location();
         });
     $("#aera1").focusout(function(){
            check_aera1();
         });
    $("#aera2").focusout(function(){
            check_aera2();
         });
    $("#aera3").focusout(function(){
            check_aera3();
         });
     $("#aera4").focusout(function(){
            check_aera4();
         });
         $("#tripdescription").focusout(function(){
            check_story();
         });
         $("#form_fb").focusout(function(){
            check_fb();
         });
    $("#form_instagram").focusout(function(){
            check_instagram();
         });
    $("#form_youtube").focusout(function(){
            check_youtube();
         });
         $("#form_fb").focusout(function(){
            check_fb();
         });
    $("#form_instagram").focusout(function(){
            check_instagram();
         });
    $("#form_web").focusout(function(){
            check_web();
         });


         function check_name() {
            var pattern = /^[a-z A-Z]*$/;
            var name = $("#form_name").val();
            if (pattern.test(name) && name !== '') {
               $("#name_error_message").hide();
               $("#form_name").css("border","6px solid #34F458");
            } else {
               $("#name_error_message").html("Should contain only Characters");
               $("#name_error_message").show();
               $("#form_name").css("border","6px solid #F90A0A");
               error_name = true;
            }
          }

          function check_email() {
            var pattern = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
            var email = $("#form_email").val();
            if (pattern.test(email) && email !== '') {
               $("#email_error_message").hide();
               $("#form_email").css("border","6px solid #34F458");
            } else {
               $("#email_error_message").html("Invalid email");
               $("#email_error_message").show();
               $("#form_email").css("border","6px solid #F90A0A");
               error_email = true;
            }
         }

         function check_phone() {
            var pattern = /^[0-9-+]+$/; 
            var phone = $("#form_phone").val();
            if (pattern.test(phone) && phone !== '') {
               $("#phone_error_message").hide();
               $("#form_phone").css("border","6px solid #34F458");
            } else {
               $("#phone_error_message").html("phone Number is Not Valid");
               $("#phone_error_message").show();
               $("#form_phone").css("border","6px solid #F90A0A");
               error_phone = true;
            }
         }
         function  check_image() {
          
          var image = $("#image").val();
          if (image !== '') {
             $("#image_error_message").hide();
             $("#image").css("border","6px solid #34F458");
          } else {
             $("#image_error_message").html("Please Upload Image in JPG/PNG/JEPG.!");
             $("#image_error_message").show();
             $("#image").css("border","6px solid #F90A0A");
             error_image = true;
          }
        }
         function check_address() {
            var pattern = /^[a-z A-Z]*$/;
            var name = $("#form_address").val();
            if (pattern.test(name) && name !== '') {
               $("#address_error_message").hide();
               $("#form_address").css("border","6px solid #34F458");
            } else {
               $("#address_error_message").html("Should contain only Characters");
               $("#address_error_message").show();
               $("#form_address").css("border","6px solid #F90A0A");
               error_address = true;
            }
         }

         function check_province() {
            var pattern = /^[a-z A-Z]*$/;
            var name = $("#form_province").val();
            if (pattern.test(name) && name !== '') {
               $("#province_error_message").hide();
               $("#form_province").css("border","6px solid #34F458");
            } else {
               $("#province_error_message").html("Should contain only Characters");
               $("#province_error_message").show();
               $("#form_province").css("border","6px solid #F90A0A");
               error_province = true;
            }
         }
         function check_date() {
          
          var date = $("#date").val();
          if (date !== '') {
             $("#date_error_message").hide();
             $("#date").css("border","6px solid #34F458");
          } else {
             $("#date_error_message").html("Please Fill it out.!");
             $("#date_error_message").show();
             $("#date").css("border","6px solid #F90A0A");
             error_date = true;
          }
       }
       function check_location() {
            var pattern = /^[a-z A-Z]*$/;
            var name = $("#form_location").val();
            if (pattern.test(name) && name !== '') {
               $("#location_error_message").hide();
               $("#form_location").css("border","6px solid #34F458");
            } else {
               $("#location_error_message").html("Should contain only Characters");
               $("#location_error_message").show();
               $("#form_location").css("border","6px solid #F90A0A");
               error_location = true;
            }
         }
         function check_aera1() {
            var pattern = /^[a-z A-Z]*$/;
            var name = $("#aera1").val();
            if (pattern.test(name) && name !== '') {
               $("#aera1_error_message").hide();
               $("#aera1").css("border","6px solid #34F458");
            } else {
               $("#aera1_error_message").html("Should contain only Characters");
               $("#aera1_error_message").show();
               $("#aera1").css("border","6px solid #F90A0A");
               error_aera1 = true;
            }
         }
         function check_aera2() {
            var pattern = /^[a-z A-Z]*$/;
            var name = $("#aera2").val();
            if (pattern.test(name) && name !== '') {
               $("#aera2_error_message").hide();
               $("#aera2").css("border","6px solid #34F458");
            } else {
               $("#aera2_error_message").html("Should contain only Characters");
               $("#aera2_error_message").show();
               $("#aera2").css("border","6px solid #F90A0A");
               error_aera2 = true;
            }
         }
         function check_aera3() {
            var pattern = /^[a-z A-Z]*$/;
            var name = $("#aera3").val();
            if (pattern.test(name) && name !== '') {
               $("#aera3_error_message").hide();
               $("#aera3").css("border","6px solid #34F458");
            } else {
               $("#aera3_error_message").html("Should contain only Characters");
               $("#aera3_error_message").show();
               $("#aera3").css("border","6px solid #F90A0A");
               error_aera3 = true;
            }
         }
         function check_aera4() {
            var pattern = /^[a-z A-Z]*$/;
            var name = $("#aera4").val();
            if (pattern.test(name) && name !== '') {
               $("#aera4_error_message").hide();
               $("#aera4").css("border","6px solid #34F458");
            } else {
               $("#aera4_error_message").html("Should contain only Characters");
               $("#aera4_error_message").show();
               $("#aera4").css("border","6px solid #F90A0A");
               error_aera4 = true;
            }
         }
         function check_story() {
            
            var tripdescription = $("#tripdescription").val();
            if (tripdescription !== '') {
               $("#tripdescription_error_message").hide();
               $("#tripdescription").css("border","6px solid #34F458");
            } else {
               $("#tripdescription_error_message").html("Please Fill it Out");
               $("#tripdescription_error_message").show();
               $("#tripdescription").css("border","6px solid #F90A0A");
               error_tripdescription= true;
            }
         }
         function check_fb() {
            var pattern = /^(http:\/\/www\.|https:\/\/www\.)[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/; 
            var fblink = $("#form_fb").val();
            if (pattern.test(fblink) && fblink !== '') {
               $("#fb_error_message").hide();
               $("#form_fb").css("border","6px solid #34F458");
            } else {
               $("#fb_error_message").html("Please Provide Correct Facebook Link" );
               $("#fb_error_message").show();
               $("#form_fb").css("border","6px solid #F90A0A");
               error_fb = true;
            }
         }
         function   check_instagram() {
            var pattern = /^(http:\/\/www\.|https:\/\/www\.)[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/; 
            var instagram = $("#form_instagram").val();
            if (pattern.test(instagram) && instagram !== '') {
               $("#instagram_error_message").hide();
               $("#form_instagram").css("border","6px solid #34F458");
            } else {
               $("#instagram_error_message").html("Please Provide Correct Instagram Link" );
               $("#instagram_error_message").show();
               $("#form_instagram").css("border","6px solid #F90A0A");
               error_instagram = true;
            }
         }
         function  check_youtube() {
            var pattern = /^(http:\/\/www\.|https:\/\/www\.)[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/; 
            var youtube = $("#form_youtube").val();
            if (pattern.test(youtube) && youtube !== '') {
               $("#youtube_error_message").hide();
               $("#form_youtube").css("border","6px solid #34F458");
            } else {
               $("#youtube_error_message").html("Please Provide Correct Youtube Link" );
               $("#youtube_error_message").show();
               $("#form_youtube").css("border","6px solid #F90A0A");
               error_youtube = true;
            }
         }
         function  check_web() {
            var pattern = /^(http:\/\/www\.|https:\/\/www\.)[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/; 
            var web = $("#form_web").val();
            if (pattern.test(web) && web !== '') {
               $("#web_error_message").hide();
               $("#form_web").css("border","6px solid #34F458");
            } else {
               $("#web_error_message").html("Please Provide Correct Blog Link" );
               $("#web_error_message").show();
               $("#form_web").css("border","6px solid #F90A0A");
               error_web = true;
            }
         }
});
  </script>
<script src="ExpolrePakistanDashboard/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="ExpolrePakistanDashboard/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="ExpolrePakistanDashboard/dist/js/adminlte.js"></script>
</body>
</html>
