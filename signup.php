<!DOCTYPE html>
<html>

<head>	
	<?php include "particles/pageheadsec.php"?>
		<!-- custom css  -->
	
  <!-- Icons font CSS-->
  <link href="public/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="public/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="public/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="public/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<link rel="stylesheet" href="public/style/siginup.css">
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
	
 <style>
       .rs-select2 .select2-container .select2-selection--single .select2-selection__rendered {
    line-height: 50px;
    padding-left: 0;
    color: #555;
    font-size: 16px;
    font-family: inherit;
    padding-left: 22px;
    padding-right: 50px;
    width:225px!important;
  }
  .error_form
{
	top: 12px;
	color: rgb(216, 15, 15);
    font-size: 15px;
    font-family: Helvetica;
}
 </style>
</head>

<body>
 <?php session_start();?>
<!-- <?php include  "particles/mainmenu.php"?> -->
	 <!-- Navemenu -->
	 <div class="menu_header" id="myHeader">
    
    </div>
  
	<div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">Registration Form</h2>
                <!-- SiginUp Regsitration PHPCode -->
<?php 

if (isset($_POST['save'])){
    // getting connection on 
     include 'config.php';

    // getting form vaule and storing in valable
    $fname = mysqli_real_escape_string($conn,$_POST['fname']);
    $lname =mysqli_real_escape_string($conn,$_POST['lname']);
    $username =mysqli_real_escape_string($conn,$_POST['username']);
  $gender =mysqli_real_escape_string($conn,$_POST['gender']) ;

    $email =mysqli_real_escape_string($conn,$_POST['email']);
    $phone =mysqli_real_escape_string($conn,$_POST['phone']);
    $password =mysqli_real_escape_string($conn,md5($_POST['password']));
    $cpassword =mysqli_real_escape_string($conn,md5($_POST['cpassword']));
    $role =mysqli_real_escape_string($conn,$_POST['role']);


    // checking Already Existed Users 

    $SQLValidates = "SELECT username,email,phone FROM users  WHERE username ='{$username}' OR email = '{$email}' OR phone = '{$phone}'";
 
    //  QueryResult 

     $resultValidates = mysqli_query($conn,$SQLValidates) or die ("Query Failed");
      
     if($fname=="" OR $username =="" OR $gender  =="" OR $email  =="" OR $phone =="" OR $password =="" OR $cpassword =="" OR  $role =="") {
          echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>All Fields Required</strong> 
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
      } elseif(mysqli_num_rows($resultValidates) > 0 ){
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Records Found Try With Another Username Email and Phone Or Login </strong> 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        }elseif( !($_POST["password"] === $_POST["cpassword"])){
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Password Not Match!!</strong> 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        }else{
             $sqlData="INSERT INTO users (fname,lname,username,gender,email,phone,password,cpassword,role) VAlUES('{$fname}','{$lname}','{$username}','{$gender}','{$email}','{$phone}','{$password}','{$cpassword}','{$role}')";
             if (mysqli_query($conn,$sqlData)){
                echo '<div class="alert alert-success" role="alert">
                <strong>Records are Added Login To Account!!</strong> 
              </div>';
              header("Location: {$hostname}/login.php");
            }
               
    }

}

?>    
                    <!-- Form start  -->
                    
                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                    <div class="row row-space">
                            <div class="col-12">
                                <div class="input-group">
                                    <label class="label">first name</label>
                                    <input class="input--style-4" type="text" name="fname" id="form_fname">
                                    <span class="error_form" id="fname_error_message"></span>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="input-group">
                                    <label class="label">last name</label>
                                    <input class="input--style-4" type="text" name="lname" id="form_lname">
                                    <span class="error_form" id="lname_error_message"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-12">
                                <div class="input-group">
                                    <label class="label">UserName</label>
                                    
                                        <input class="input--style-4" type="text" name="username" id="form_username">
                                        <span class="error_form" id="username_error_message"></span>
                                    
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="input-group mr-4">
                                    <label class="label p-r-10 ">Gender</label>
                                    <div class="p-t-10 ">
                                        <label class="radio-container m-r-45">Male
                                            <input type="radio" value="Male" checked="checked" name="gender" id="gender">
                                            
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-container">Female
                                            <input type="radio" value="female" name="gender" id="gender">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-container">Other
                                            <input type="radio" value="other" name="gender" id="gender">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-12">
                                <div class="input-group">
                                    <label class="label">Email</label>
                                    <input class="input--style-4" type="email" name="email" id="form_email">
                                    <span class="error_form" id="email_error_message"></span>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="input-group">
                                    <label class="label">Phone Number</label>
                                    <input class="input--style-4" type="text" name="phone" id="form_phone">
                                    <span class="error_form" id="phone_error_message"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-12">
                                <div class="input-group">
                                    <label class="label">Password</label>
                                    <input class="input--style-4" type="password" name="password" id="form_password">
                                    <span class="error_form" id="password_error_message"></span>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="input-group">
                                    <label class="label">Confirm Password</label>
                                    <input class="input--style-4" type="password" name="cpassword" id="form_cpassword">
                                    <span class="error_form" id="cpassword_error_message"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mx-2">
                            <label class="label px-4">Subject</label>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="role" class="w-50 mx-5 px-5" style="width:225px;" id="role">
                                <span class="error_form" id="role_error_message"></span>
                                   <option vaule="Vister"  selected="selected" style="width:225px;">Vister</option>    
                                   <option vaule="EventOrganisor">Event Organisor</option>
                                    <option vaule="Tourist">Tourist</option>
                                    <option vaule="TouristGuider">TouristGuider</option>
                                    <option vaule="Infulencer">Infulencer</option>
                                    <option vaule="Blogger">Blogger</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" type="submit" vaule="save" name="save" id="registration_form">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<script type="text/javascript">
 $(function() {
    $("#fname_error_message").hide();
    $("#lname_error_message").hide();
    $("#username_error_message").hide();
    $("#email_error_message").hide();
    $("#password_error_message").hide();
    $("#cpassword_error_message").hide();
    $("#role_error_message").hide();


    var error_fname = false;
    var error_lname = false;
    var error_username = false;
    var error_email = false;
    var error_password = false;
    var error_cpassword = false;
    var error_role = false;


    $("#form_fname").focusout(function(){
            check_fname();
         });
    $("#form_lname").focusout(function(){
            check_lname();
         });
    $("#form_username").focusout(function(){
            check_username();
         });
    $("#form_phone").focusout(function(){
            check_phone();
         });
    $("#form_email").focusout(function(){
            check_email();
         });
    $("#form_password").focusout(function(){
            check_password();
         });
    $("#form_cpassword").focusout(function(){
            check_cpassword();
         });
    $("#form_role").focusout(function(){
            check_role();
         }); 
         
         
         function check_fname() {
            var pattern = /^[a-z A-Z]*$/;
            var fname = $("#form_fname").val();
            if (pattern.test(fname) && fname !== '') {
               $("#fname_error_message").hide();
               $("#form_fname").css("border","3px solid #34F458");
            } else {
               $("#fname_error_message").html("Should contain only Characters");
               $("#fname_error_message").show();
               $("#form_fname").css("border","3px solid #F90A0A");
               error_fname = true;
            }
         }
         function check_lname() {
            var pattern = /^[a-z . A-Z]*$/;
            var lname = $("#form_lname").val();
            if (pattern.test(lname) && lname !== '') {
               $("#lname_error_message").hide();
               $("#form_lname").css("border","3px solid #34F458");
            } else {
               $("#lname_error_message").html("Should contain only Characters");
               $("#lname_error_message").show();
               $("#form_lname").css("border","3px solid #F90A0A");
               error_lname = true;
            }
         }
         function check_username() {
            var pattern = /^[a-zA-Z0-9]*$/;
            var username = $("#form_username").val();
            if (pattern.test(username) && username !== '') {
               $("#username_error_message").hide();
               $("#form_username").css("border","3px solid #34F458");
            } else {
               $("#username_error_message").html("Should contain letter & Characters");
               $("#username_error_message").show();
               $("#form_username").css("border","3px solid #F90A0A");
               error_username = true;
            }
         }
         function check_phone() {
            var pattern = /^[0-9-+]+$/; 
            var phone = $("#form_phone").val();
            if (pattern.test(phone) && phone !== '') {
               $("#phone_error_message").hide();
               $("#form_phone").css("border","3px solid #34F458");
            } else {
               $("#phone_error_message").html("Phone Number is Not Valid");
               $("#phone_error_message").show();
               $("#form_phone").css("border","3px solid #F90A0A");
               error_phone = true;
            }
         }
         function check_password() {
            var password_length = $("#form_password").val().length;
            if (password_length < 4) {
               $("#password_error_message").html("Atleast 4 Characters");
               $("#password_error_message").show();
               $("#form_password").css("border","3px solid #F90A0A");
               error_password = true;
            } else {
               $("#password_error_message").hide();
               $("#form_password").css("border","3px solid #34F458");
            }
         }
         function check_cpassword() {
            var password = $("#form_password").val();
            var cpassword = $("#form_cpassword").val();
            if (password !== cpassword) {
               $("#cpassword_error_message").html("Passwords Did not Matched");
               $("#cpassword_error_message").show();
               $("#form_cpassword").css("border","3px solid #F90A0A");
               error_cpassword = true;
            } else {
               $("#cpassword_error_message").hide();
               $("#form_cpassword").css("border","3px solid #34F458");
            }
         }
         function check_email() {
            var pattern = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
            var email = $("#form_email").val();
            if (pattern.test(email) && email !== '') {
               $("#email_error_message").hide();
               $("#form_email").css("border","3px solid #34F458");
            } else {
               $("#email_error_message").html("Invalid Email");
               $("#email_error_message").show();
               $("#form_email").css("border","3px solid #F90A0A");
               error_email = true;
            }
         }
         $("#registration_form").submit(function() {
            var error_fname = false;
            var error_lname = false;
            var error_username = false;
            var error_email = false;
            var error_password = false;
            var error_cpassword = false;
            var error_phone=false;

            check_fname();
            check_lname();
            check_email();
            check_phone();
            check_username();
            check_password();
            check_cpassword();
            

            if (error_fname === false && error_lname === false && error_email === false && error_password === false && error_cpassword === false && error_phone === false && username === false)  {
              
               `<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong> Registration Successfull </strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>`
            
               return true;
            } else {
               
                `<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong> Please Fill the form Correctly</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>`
           
               return false;
            }


         });
 });






</script>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  <!-- Jquery JS-->
   <!-- Jquery JS-->
   <script src="public/vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="public/vendor/select2/select2.min.js"></script>
    <script src="public/vendor/datepicker/moment.min.js"></script>
    <script src="public/vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="public/js/global.js"></script>

</body>
  <!-- Footer  -->
  <?php include "particles/mainfooter.php" ?>


</html>