<?php
session_start();
//Checking User Logged or Not
if(empty($_SESSION['user'])){
  header("Location:http://localhost/epaktourisum/login.php");
}
//Restrict User or Moderator to Access Admin.php page
if($_SESSION['user']['role']=='Event Organisor'){
  header("http://localhost/epaktourisumadmin/eventOrg_dash/index.php");
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
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<style>
    input:read-only {
    cursor: not-allowed;
  }
</style>
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
        <div class="page-wrapper">

            <div class="container-fluid">
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <?php 
                     $conn = mysqli_connect("localhost","root","","epaktourism") or die("Connection Failed:" .mysqli_connect_error());
                      $userid=$_GET['id'];
                        $sqlrecord="SELECT * FROM users WHERE user_id ={$userid}"; 
                      $recordResult = mysqli_query($conn,$sqlrecord) or die("Query failed");

                      if(mysqli_num_rows($recordResult)>0){
                          while($row =mysqli_fetch_assoc($recordResult)){
                    ?>                                 
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                                        
                      <div class="card">
                        <div class="card-body d-flex ">
                           <div class="mt-4 d-block">
                                <div class="d-flex justify-content-center">       
                                <img src="ExpolrePakistanDashboard/upload/<?php echo$row['image']?>" class="rounded-circle "width="150" height="150px" /> 
                                </div>
                                <!-- <h4 class="card-title mt-2 d-block">data.fname  </h4> -->
                                <h4 class="card-subtitle mt-2"><i class="fas fa-users mx-2"></i><?php echo$row['fname']?> <?php echo$row['lname']?></h4>
                                <h6 class="card-subtitle mt-2"><i class="fas fa-blog mx-2"></i><a href="<?php echo$row['website']?>"><?php echo$row['website']?>"</a></h6>
                              </div>
                           
                        </div>
                        <div>
                            <hr>
                        </div>
                        <div class="card-body"> <small class="text-muted">Email address </small><h6><?php echo$row['email']?> </h6> 
                            <small class="text-muted pt-4 db">Phone</small><h6><?php echo$row['phone']?></h6> 
                            <small class="text-muted pt-4 db">Address</small><h6><?php echo$row['address']?> </h6></h6>
                            <small class="text-muted pt-4 db">Easypasia Account</small><h6><?php echo$row['easypasia']?> </h6> 
                            <small class="text-muted pt-4 db">JazzCash Account</small> <h6><?php echo$row['jazzcash']?></h6>

                            <br />
                            <button class="btn btn-circle btn-secondary">
                              <a href="<?php echo$row['fb']?>">
                                <i class="fab fa-facebook-f"></i>
                              </a>
                            </button>
                            <button class="btn btn-circle btn-secondary">
                              <a href="<?php echo$row['twitter']?> ">
                                <i class="fab fa-twitter"></i>
                              </a>
                            </button>
                            <button class="btn btn-circle btn-secondary">
                              <a href="<?php echo$row['youtube']?>">
                                <i class="fab fa-youtube"></i>
                              </a>
                            </button>
                        </div>
                        <div>
                          
                        </div>
                    </div>

                  </div>
                <?php 
                      }
                    }
                ?>
                  
 <!-- 2nd cloums start  -->
                    <!-- Column -->
  
                    <!-- Column Form  -->
                    <?php 
                     $conn = mysqli_connect("localhost","root","","epaktourism") or die("Connection Failed:" .mysqli_connect_error());
                      $userid=$_GET['id'];
                        $sqlrecord="SELECT * FROM users WHERE user_id ={$userid}"; 
                      $recordResult = mysqli_query($conn,$sqlrecord) or die("Query failed");

                      if(mysqli_num_rows($recordResult)>0){
                          while($row =mysqli_fetch_assoc($recordResult)){

                    ?>


                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <!-- Tabs -->
                            <form class="px-4 pt-4 " action="savadata.php" method="POST"  enctype="multipart/form-data">
                            <div class="row">
								<div class="col-sm-7">
									<div class="form-group">
										<span class="form-label">User ID</span>
										<input type="hidden" name="user_id"  class="form-control" value="<?php echo$row['user_id']; ?>" placeholder="" >
									</div>
								</div>
							</div>
                            
                            <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label htmlFor="feFirstName">
                                            First Name:
                                        </label>
                                        <input type="text" class="form-control" id="feFirstName"
                                            placeholder="First Name" defaultValue="Sierra" name="fname" value="<?php echo$row['fname']?>" required/>
                                            <span class="error_form" id="fname_error_message"></span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label htmlFor="feLastName">
                                            Last Name:
                                        </label>
                                        <input type="text" class="form-control" id="feLastName" placeholder="Last Name " name="lname"
                                        value="<?php echo$row['lname']?>" required />
                                        <span class="error_form" id="lname_error_message"></span>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label htmlFor="feEmailAddress">
                                            Email:
                                        </label>
                                        <input type="email" class="form-control" id="feEmailAddress" placeholder="email" name="email"
                                        value="<?php echo$row['email']?>"  readonly required />
                                        <span class="error_form" id="email_error_message"></span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label htmlFor="fephonenum">
                                            PhoneNum:
                                        </label>
                                        <input type="number" class="form-control" id="fephonenum"
                                            placeholder="+92 333 3333333" value="<?php echo$row['phone']?>" name="phone"  required />
                                            <span class="error_form" id="phone_error_message"></span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label htmlFor="feCNIC/Passport">
                                            CNIC/Passport:
                                        </label>
                                        <input type="text" class="form-control" id="feCNIC"
                                            placeholder="61101-1111111-1/PAK123456789" value="<?php echo$row['cnic']?>" name="cnic"  required />
                                            <span class="error_form" id="cnic_error_message"></span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label htmlFor="feAddress">
                                            Address:
                                        </label>
                                        <input type="text" class="form-control" id="feAddress"
                                            placeholder="123 Street ABC City Pakistan" value="<?php echo$row['address']?>" name="address" required />
                                            <span class="error_form" id="address_error_message"></span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label htmlFor="fb_link">
                                            Facebook Profile link:
                                        </label>
                                        <input type="text" class="form-control" id="fb_link"
                                            placeholder="www.facebook.com/Profile" name="fb" value="<?php echo$row['fb']?>"  required/>
                                            <span class="error_form" id="fb_error_message"></span>
                                           
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label htmlFor="insta_pro_link">
                                            Instagram Profile Link:
                                        </label>
                                        <input type="text" class="form-control" id="insta_pro_link"
                                            placeholder="www.instgram.com/Profile" name="instagram"  value="<?php echo$row['instagram']?>" required/>
                                            <span class="error_form" id="instagram_error_message"></span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label htmlFor="twitter_pro_link">
                                            Twitter Profile Link:
                                        </label>
                                        <input type="text" class="form-control" id="twitter_pro_link"
                                            placeholder="www.twitter.com/Twitter" name="twitter" value="<?php echo$row['twitter']?>" required />
                                            <span class="error_form" id="twitter_error_message"></span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label htmlFor="youtube_channel_link">
                                            You Tube Link:
                                        </label>
                                        <input type="text" class="form-control" id="youtube_channel_link"
                                            placeholder="www.youtuber.com/Profile" name="youtube" value="<?php echo$row['youtube']?>"  required />
                                            <span class="error_form" id="youtube_error_message"></span>
                                    </div>

                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label htmlFor="website_link">
                                            Website Links:
                                        </label>
                                        <input type="text" class="form-control" id="website_link"
                                            placeholder="www.yourwebsite_name.com" name="website" value="<?php echo$row['website']?>"  required/>
                                            <span class="error_form" id="website_error_message"></span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label htmlFor="linkedin_pro_link">
                                            Linkedin Profile Link:
                                        </label>
                                        <input type="text" class="form-control" id="linkedin_pro_link"
                                            placeholder="www.linkedin Profile link.com" name="linkedin" value="<?php echo$row['linkedin']?>"  required/>
                                            <span class="error_form" id="linkedin_error_message"></span>
                                    </div>
                                </div>
                                <div class="form-row">
                                  <div class="form-group col-md-6">
                                      <label htmlFor="website_link">
                                          Profile Image:
                                      </label>
                                      <input type="file" class="form-control" id="image"
                                           name="image" value="<?php echo$row['image']?>" required/>
                                           <span class="error_form" id="image_error_message"></span>
                                  </div>
                              </div>
                                <label htmlFor="">Payments Accounts</label>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label htmlFor="easypasia_link">
                                            EasyPasia:
                                        </label>
                                        <input type="text" class="form-control" id="easypasia_link"
                                            placeholder="03XX XXXXXXX" name="easypasia" value="<?php echo$row['easypasia']?>"  required/>
                                            <span class="error_form" id="easypasia_error_message"></span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label htmlFor="jazzcash_account_link">
                                            JazzCash:
                                        </label>
                                        <input type="text" class="form-control" id="jazzcash_account_link"
                                            placeholder="03XX XXXXXXX" name="jazzcash" value="<?php echo$row['jazzcash']?>" required />
                                            <span class="error_form" id="jazzcash_error_message"></span>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-accent pb-3 mb-4 btn-success" name="update">
                                    Update Account
                                </button>
                            </form>
                        </div> 
                    </div>
                    <!-- Column -->
                    <?php 
                        }
                     }
                  ?>
                </div>
            </div>
        </div>
    </div>
    </section>

 
 
  <!-- Main Footer -->
  <?php  include "particles/footer.php"?>
</div>

<script type="text/javascript">
$(function() {
    $("#fname_error_message").hide();
    $("#lname_error_message").hide();
    $("#email_error_message").hide();
    $("#phone_error_message").hide();
    $("#cnic_error_message").hide();
    $("#address_error_message").hide();
    $("#fb_error_message").hide();
    $("#instagram_error_message").hide();
    $("#twitter_error_message").hide();
    $("#youtube_error_message").hide();
    $("#website_error_message").hide();
    $("#linkedin_error_message").hide();
    
    $("#image_error_message").hide();
    $("#easypasia_error_message").hide();
    $("#jazzcash_error_message").hide();


    var error_fname= false;
    var error_lname = false;
    var error_email = false;
    var error_phone = false;
    var error_cnic = false;
    var error_address = false;
    var error_fb= false;
    var error_instagram = false;
    var error_twitter= false;
    var error_youtube = false;
    
    var error_website = false;
    var error_linkedin= false;
    var error_image = false;
    var error_easypasia= false;
    var error_jazzcash = false;


    $("#feFirstName").focusout(function(){
            check_feFirstName();
         });
    $("#feLastName").focusout(function(){
            check_feLastName();
         });
    $("#feEmailAddress").focusout(function(){
            check_feEmailAddress();
         });
    $("#fephonenum").focusout(function(){
            check_fephonenum();
         });
    $("#feCNIC").focusout(function(){
            check_feCNIC();
         });
    $("#feAddress").focusout(function(){
            check_feAddress();
         });
    $("#fb_link").focusout(function(){
            check_fb_link();
         });
    $("#insta_pro_link").focusout(function(){
            check_insta_pro_link();
         });
    $("#twitter_pro_link").focusout(function(){
            check_twitter_pro_link();
         });
    $("#youtube_channel_link").focusout(function(){
            check_youtube_channel_link();
         });
    $("#website_link").focusout(function(){
            check_website_link();
         });
    $("#linkedin_pro_link").focusout(function(){
            check_linkedin_pro_link();
         });
    $("#image").focusout(function(){
            check_image();
         });
    $("#easypasia_link").focusout(function(){
            check_easypasia_link();
         });
    $("#jazzcash_account_link").focusout(function(){
            check_jazzcash_account_link();
         });


         function check_feFirstName() {
            var pattern = /^[a-z A-Z]*$/;
            var name = $("#feFirstName").val();
            if (pattern.test(name) && name !== '') {
               $("#fname_error_message").hide();
               $("#feFirstName").css("border","6px solid #34F458");
            } else {
               $("#fname_error_message").html("Should contain only Characters");
               $("#fname_error_message").show();
               $("#feFirstName").css("border","6px solid #F90A0A");
               error_name = true;
            }
         }
         function check_feLastName() {
            var pattern = /^[a-z A-Z]*$/;
            var name = $("#feLastName").val();
            if (pattern.test(name) && name !== '') {
               $("#lname_error_message").hide();
               $("#feLastName").css("border","6px solid #34F458");
            } else {
               $("#lname_error_message").html("Should contain only Characters");
               $("#lname_error_message").show();
               $("#feLastName").css("border","6px solid #F90A0A");
               error_name = true;
            }
         }
         function check_feEmailAddress() {
            var pattern = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
            var displayemail = $("#feEmailAddress").val();
            if (pattern.test(displayemail) && displayemail !== '') {
               $("#email_error_message").hide();
               $("#feEmailAddress").css("border","6px solid #34F458");
            } else {
               $("#email_error_message").html("Invalid displayemail");
               $("#email_error_message").show();
               $("#feEmailAddress").css("border","6px solid #F90A0A");
               error_displayemail = true;
            }
         }
         function check_fephonenum() {
            var pattern = /^[0-9-+]+$/; 
            var displayphone = $("#fephonenum").val();
            if (pattern.test(displayphone) && displayphone !== '') {
               $("#phone_error_message").hide();
               $("#fephonenum").css("border","6px solid #34F458");
            } else {
               $("#phone_error_message").html("displayphone Number is Not Valid");
               $("#phone_error_message").show();
               $("#fephonenum").css("border","6px solid #F90A0A");
               error_displayphone = true;
            }
         }
         function check_feCNIC() {
            var pattern = /^[0-9+]{5}-[0-9+]{7}-[0-9]{1}$/; 
            var cnic = $("#feCNIC").val();
            if (pattern.test(cnic) && cnic !== '') {
               $("#cnic_error_message").hide();
               $("#feCNIC").css("border","6px solid #34F458");
            } else {
               $("#cnic_error_message").html("CNIC is Not Valid,Please Provide Valid CNIC XXXXX-XXXXXXX-X" );
               $("#cnic_error_message").show();
               $("#feCNIC").css("border","6px solid #F90A0A");
               error_cnic = true;
            }
         }
         function check_feAddress() {
          
          var address = $("#feAddress").val();
          if (address !== '') {
             $("#address_error_message").hide();
             $("#feAddress").css("border","6px solid #34F458");
          } else {
             $("#address_error_message").html("Please Fill it out.!");
             $("#address_error_message").show();
             $("#feAddress").css("border","6px solid #F90A0A");
             error_address = true;
          }
       }
       function check_fb_link() {
            var pattern = /^(http:\/\/www\.|https:\/\/www\.)[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/; 
            var fblink = $("#fb_link").val();
            if (pattern.test(fblink) && fblink !== '') {
               $("#fb_error_message").hide();
               $("#fb_link").css("border","6px solid #34F458");
            } else {
               $("#fb_error_message").html("Please Provide Correct Facebook Link" );
               $("#fb_error_message").show();
               $("#fb_link").css("border","6px solid #F90A0A");
               error_fblink = true;
            }
         }
         function   check_insta_pro_link() {
            var pattern = /^(http:\/\/www\.|https:\/\/www\.)[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/; 
            var instagram = $("#insta_pro_link").val();
            if (pattern.test(instagram) && instagram !== '') {
               $("#instagram_error_message").hide();
               $("#insta_pro_link").css("border","6px solid #34F458");
            } else {
               $("#instagram_error_message").html("Please Provide Correct Instagram Link" );
               $("#instagram_error_message").show();
               $("#insta_pro_link").css("border","6px solid #F90A0A");
               error_instagram = true;
            }
         }
         function  check_twitter_pro_link() {
            var pattern = /^(http:\/\/www\.|https:\/\/www\.)[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/; 
            var twitter = $("#twitter_pro_link").val();
            if (pattern.test(twitter) && twitter !== '') {
               $("#twitter_error_message").hide();
               $("#twitter_pro_link").css("border","6px solid #34F458");
            } else {
               $("#twitter_error_message").html("Please Provide Correct Twitter Link" );
               $("#twitter_error_message").show();
               $("#twitter_pro_link").css("border","6px solid #F90A0A");
               error_twitter = true;
            }
         }
         function  check_youtube_channel_link() {
            var pattern = /^(http:\/\/www\.|https:\/\/www\.)[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/; 
            var youtube = $("#youtube_channel_link").val();
            if (pattern.test(youtube) && youtube !== '') {
               $("#youtube_error_message").hide();
               $("#youtube_channel_link").css("border","6px solid #34F458");
            } else {
               $("#youtube_error_message").html("Please Provide Correct Youtube Link" );
               $("#youtube_error_message").show();
               $("#youtube_channel_link").css("border","6px solid #F90A0A");
               error_youtube = true;
            }
         }
         function  check_website_link() {
            var pattern = /^(http:\/\/www\.|https:\/\/www\.)[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/; 
            var website = $("#website_link").val();
            if (pattern.test(website) && website !== '') {
               $("#website_error_message").hide();
               $("#website_link").css("border","6px solid #34F458");
            } else {
               $("#website_error_message").html("Please Provide Correct Website Link" );
               $("#website_error_message").show();
               $("#website_link").css("border","6px solid #F90A0A");
               error_website = true;
            }
         }
         function  check_linkedin_pro_link() {
            var pattern = /^(http:\/\/www\.|https:\/\/www\.)[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/; 
            var linkedin = $("#linkedin_pro_link").val();
            if (pattern.test(linkedin) && linkedin !== '') {
               $("#linkedin_error_message").hide();
               $("#linkedin_pro_link").css("border","6px solid #34F458");
            } else {
               $("#linkedin_error_message").html("Please Provide Correct Linkedin Link" );
               $("#linkedin_error_message").show();
               $("#linkedin_pro_link").css("border","6px solid #F90A0A");
               error_linkedin = true;
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
       function check_easypasia_link() {
            var pattern = /^[0-9-+]+$/; 
            var easypasia = $("#easypasia_link").val();
            if (pattern.test(easypasia) && easypasia !== '') {
               $("#easypasia_error_message").hide();
               $("#easypasia_link").css("border","6px solid #34F458");
            } else {
               $("#easypasia_error_message").html("EasyPasia Number is Not Valid");
               $("#easypasia_error_message").show();
               $("#easypasia_link").css("border","6px solid #F90A0A");
               error_easypasia = true;
            }
         }
         function check_jazzcash_account_link() {
            var pattern = /^[0-9-+]+$/; 
            var jazzcash = $("#jazzcash_account_link").val();
            if (pattern.test(jazzcash) && jazzcash !== '') {
               $("#phone_error_message").hide();
               $("#jazzcash_account_link").css("border","6px solid #34F458");
            } else {
               $("#phone_error_message").html("displayphone Number is Not Valid");
               $("#phone_error_message").show();
               $("#jazzcash_account_link").css("border","6px solid #F90A0A");
               error_jazzcash = true;
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
