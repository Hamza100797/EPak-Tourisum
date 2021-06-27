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

<?php include "infulencerparticle/headsec.php"?>
  <link rel="stylesheet" href="Infulencer_Dashboard/public/style/touristGuiderlogout.css">
  <link rel="stylesheet" href="Infulencer_Dashboard/public/style/TouristGuideProfile.css">
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <style> a {text-decoration: none;}


</style>
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

   <!-- Preloader -->
  <?php include "infulencerparticle/preloader.php"?>


   <!-- Navbar -->
   <?php include "infulencerparticle/navmenu.php"?>
  <!-- /.navbar -->


    <!-- Main Sidebar Container -->

    <?php include "infulencerparticle/sidebarmenu.php"?>
  
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
                                    <h1>Share Your Experience</h1>
                                    <p>We're Love to Post your Experience</p>
                                  </div>

                                  <?php include_once 'storydata.php' ?>
                                  <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data" >
                                    <div class="row">
                                        <div class="col-mad-12">
                                            <div class="form-group">
                                            <input class="form-control" type="text" placeholder="Enter Your Name"  name="displayname"  id="form_name" required />
                                            <span class="error_form" id="name_error_message"></span>
                                            <span class="form-label">Name</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <input class="form-control" type="email" name="displayemail" placeholder="Enter Your Email" id="form_email" required    />
                                          <span class="error_form" id="email_error_message"></span>
                                          <span class="form-label">Email</span>
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <input class="form-control" type="number" name="displayphone" placeholder="Enter Your Phone Number" id="form_phone"  />
                                          <span class="error_form" id="phone_error_message"></span>
                                          <span class="form-label">Phone Num</span>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <input class="form-control" type="text" name="address" placeholder="Enter Your Country Name"  id="form_country" required   />
                                          <span class="error_form" id="country_error_message"></span>
                                          <span class="form-label">Country Name</span>
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <input class="form-control" type="file" name="image" placeholder="Enter Your Image/Place-Photo"  id="image" required   />
                                          <span class="error_form" id="image_error_message"></span>
                                          <span class="form-label"> ProfileImage/Place-Photo</span>
                                        </div>
                                      </div>  
                                    </div>
                                    <div class="row">
                                      <div class="col-md-4">
                                        <div class="form-group">
                                          <input class="form-control" type="text" name="fb" placeholder="Enter Your Facebook link" id="form_fb"  />
                                          <span class="error_form" id="fb_error_message"></span>
                                         <span class="form-label">Facebook Link</span>
                                        </div>
                                      </div>
                                      <div class="col-md-4">
                                        <div class="form-group">
                                          <input class="form-control" type="text" name="instagram" placeholder="Enter Your Instagram link" id="form_instagram"  />
                                          <span class="error_form" id="instagram_error_message"></span>
                                          <span class="form-label">Instagram Link.</span>
                                        </div>
                                      </div> 
                                      <div class="col-md-4">
                                        <div class="form-group">
                                          <input class="form-control" type="text" name="youtube" placeholder="Enter Your Youtube" id="form_youtube"  />
                                          <span class="error_form" id="youtube_error_message"></span>
                                          <span class="form-label"> Youtube Link.</span>
                                        </div>
                                      </div>  
                                    </div>
    
                                    <div class="row">
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <input class="form-control" type="text" placeholder="Enter Post Title"  name="Posttitle"  id="title" required />
                                          <span class="error_form" id="title_error_message"></span>
                                          <span class="form-label">Post Title</span>
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <input class="form-control" type="date" placeholder="Select Event Date"  name="posteddate" id="date" required />
                                          <span class="error_form" id="date_error_message"></span>
                                          <span class="form-label">Event Occur Date</span>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="row">
                                        <div class="col-md-12">
                                          <div class="form-group">
                                            <div class="tripdescription">
                                              <label for="Describe Yourself"> </label>
                                              <textarea  id="tripdescription" cols="30" rows="30" class="form-control"
                                                defaultValue="" name="experience" required></textarea>
                                                <span class="error_form" id="story_error_message"></span>
                                              <span class="form-label">Write Your Experience:</span>
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="row mt-4">
                                      <div class="col-md-3">
                                        <div class="form-group">
                                          <input class="form-control" type="text" name="aeratag1" placeholder="Enter  Aera Tag" id="form_tag1" required  />
                                          <span class="error_form" id="tags_error_message"></span>
                                          <span class="form-label">Aera Tags</span>
                                        </div>
                                      </div>
                                      <div class="col-md-3">
                                        <div class="form-group">
                                          <input class="form-control" type="text" name="aeratag2" placeholder="Enter another aera Tag" id="form_tag2" required  />
                                          <span class="error_form" id="tags_error_message"></span>
                                          <span class="form-label">Aera Tags</span>
                                        </div>
                                      </div> 
                                      <div class="col-md-3">
                                        <div class="form-group">
                                          <input class="form-control" type="text" name="aeratag3" placeholder="Enter another aera Tag" id="form_tag3" />
                                          <span class="error_form" id="tags_error_message"></span>
                                          <span class="form-label">Aera Tags</span>
                                        </div>
                                      </div> 
                                      <div class="col-md-3">
                                        <div class="form-group">
                                          <input class="form-control" type="text" name="aeratag4" placeholder="Enter another aera Tag" id="form_tag4"  />
                                          <span class="error_form" id="tags_error_message"></span>
                                          <span class="form-label">Aera Tags</span>
                                        </div>
                                      </div>  
                                    </div>
                                    <div class="form-btn">
                                      <button class="submit-btn"> Share Now</button>
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
  <?php include "infulencerparticle/footer.php"?>
</div>

<script type="text/javascript">
$(function() {
  $("#name_error_message").hide();
    $("#email_error_message").hide();
    $("#country_error_message").hide();
    $("#phone_error_message").hide();
    $("#tags_error_message").hide();
    $("#fb_error_message").hide();
    $("#instagram_error_message").hide();
    $("#youtube_error_message").hide();
    $("#image_error_message").hide();
    $("#tripdescription_error_message").hide();
    $("#date_error_message").hide();
    $("#title_error_message").hide();



    var error_name= false;
    var error_email = false;
    var error_phone = false;
    var error_country = false;
    var error_phone = false;
    var error_tags = false;
    var error_fb = false;
    var error_instagram = false;
    var error_youtube= false;
    var error_image = false;
    var error_tripdescription = false;
    var error_date= false;
    var error_title = false;
   

    $("#form_name").focusout(function(){
            check_name();
         });

     $("#form_email").focusout(function(){
            check_email();
         });
    $("#form_phone").focusout(function(){
            check_phone();
         });
    $("#form_country").focusout(function(){
            check_country();
         });
    $("#form_tags").focusout(function(){
            check_tags();
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
     $("#image").focusout(function(){
            check_image();
         });
    $("#tripdescription").focusout(function(){
            check_story();
         });
    $("#date").focusout(function(){
            check_date();
         });
     $("#title").focusout(function(){
            check_title();
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

         function check_country() {
            var pattern = /^[a-z A-Z]*$/;
            var name = $("#form_country").val();
            if (pattern.test(name) && name !== '') {
               $("#country_error_message").hide();
               $("#form_country").css("border","6px solid #34F458");
            } else {
               $("#country_error_message").html("Should contain only Characters");
               $("#country_error_message").show();
               $("#form_country").css("border","6px solid #F90A0A");
               error_country = true;
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
         function check_title() {
            var pattern = /^[a-z A-Z]*$/;
            var name = $("#title").val();
            if (pattern.test(name) && name !== '') {
               $("#title_error_message").hide();
               $("#title").css("border","6px solid #34F458");
            } else {
               $("#title_error_message").html("Should contain only Characters");
               $("#title_error_message").show();
               $("#title").css("border","6px solid #F90A0A");
               error_title = true;
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
       function check_story() {
            
            var tripdescription = $("#tripdescription").val();
            if (tripdescription !== '') {
               $("#story_error_message").hide();
               $("#tripdescription").css("border","6px solid #34F458");
            } else {
               $("#story_error_message").html("Please Fill it Out");
               $("#story_error_message").show();
               $("#tripdescription").css("border","6px solid #F90A0A");
               error_tripdescription= true;
            }
         }
         function check_tags() {
          
          var address = $("#tags").val();
          if (address !== '') {
             $("#tags_error_message").hide();
             $("#tags").css("border","6px solid #34F458");
          } else {
             $("#tags_error_message").html("Please Fill it out.!");
             $("#tags_error_message").show();
             $("#tags").css("border","6px solid #F90A0A");
             error_tags = true;
          }
       }
});
</script>
<script src="Infulencer_Dashboard/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="Infulencer_Dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="Infulencer_Dashboard/dist/js/adminlte.js"></script>


</body>
</html>
