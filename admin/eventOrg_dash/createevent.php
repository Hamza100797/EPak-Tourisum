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
<html dir="ltr" lang="en">

<head>
  <!-- {{!-- Bootstrap CDN  --}} -->
  

<!-- {{!-- custom css own  --}} -->
 <link rel="stylesheet" href="public/eventOrg_dashboard_files/dist/css/createevent.css">
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
 <style> a{text-decoration:"none"} </style>
 <?php include "particles/eventOrgheadSeclinks.php"?>
 <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
</head>

<body>
  <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <?php include "particles/eventOrg_preloader.php"?>
    <div id="main-wrapper">
         <!-- Header  -->
         <?php include "particles/eventOrgheader.php"?>
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
             <!-- sidebarMenu  -->
             <?php include "particles/eventOrgSidebarMenu.php"?>

    <div class="page-wrapper">
       <!-- ============================================================== -->
      <!-- Bread crumb and right sidebar toggle -->
      <!-- ============================================================== -->
      <div class="page-breadcrumb">
        <div class="row">
          <div class="col-5 align-self-center">
            <h4 class="page-title">Create An Event</h4>
            <div class="d-flex align-items-center">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="createevent.php">Create An Event</a></li>
                  
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
      <!-- Create a Event Form  -->
      <div class="create_event px-5">
        <div id="booking" class="section">
          <div class="section-center">
            <div class="container">
              <div class="row">
                <div class="booking-form">
                  <div class="form-header">
                    <h1>Create A Events</h1>
                  </div>
                  <form action="createeventformdata.php" method="POST" enctype="multipart/form-data" >

                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-3">
                          <label for="event_name"> </label>
                          <input class="form-control" type="text" placeholder="Enter The Name Of Event" id="eventname"
                            required   name="eventname"/>
                            <span class="error_form" id="eventname_error_message"></span>
                          <span class="form-label">Event Name:</span>
                        </div>
                        <div class="col-md-3">
                          <label for="eventorg"> </label>
                          <input class="form-control" type="text" placeholder="Enter Your Event Orgnaization Name "
                            id="eventorg"  name="eventorg" required />
                            <span class="error_form" id="eventorg_error_message"></span>
                          <span class="form-label">Orgazation Name:</span>
                        </div>
                        <div class="col-md-3">
                          <label for="eventdays"> </label>
                          <input class="form-control" type="number" placeholder="Enter Total Number Of Days "
                            id="eventdays" name="eventdays" required />
                            <span class="error_form" id="eventdays_error_message"></span>
                          <span class="form-label">No of Days:</span>
                        </div>
                        <div class="col-md-3">
                          <label for="event_type"> </label>
                          <div class="rs-select2 js-select-simple select--no-search">
                                <select name="type" class=" form-control" id="eventtype" >
                                   <option class="form-control" vaule="bookingopen"  selected="selected">Booking Start</option>    
                                   <option class="form-control"  vaule="bookingclosed">Booking Closed</option>
                                    <option class="form-control" vaule="featured">Featured</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                          <span class="form-label">Type Of Trip:</span>
                          <span class="error_form" id="eventtype_error_message"></span>
                        </div>
                      </div>
                    </div>


                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-6">
                          <label for="destinationform"> </label>
                          <input class="form-control" type="text" placeholder="Enter The Name Of Destination From"
                            id="destinationfrom" required  name="destinationform" />
                            <span class="error_form" id="destinationfrom_error_message"></span>
                          <span class="form-label">Destination From:</span>
                        </div>
                        <div class="col-md-6">
                          <label for="destinationto"> </label>
                          <input class="form-control" type="text" placeholder="destinationto" id="destinationto" required
                          name="destinationto"/>
                          <span class="error_form" id="destinationto_error_message"></span>
                          <span class="form-label">Destination To:</span>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <!-- <label for="event_date_from"></label>  -->
                          <input class="form-control" type="date" required id="datefrom" name="datefrom" />
                          <span class="error_form" id="datefrom_error_message"></span>
                          <span class="form-label">Date From</span>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <input class="form-control" type="date" required  name="dateto" id="dateto"/>
                          <span class="error_form" id="dateto_error_message"></span>
                          <span class="form-label">Date To</span>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-4">
                          <label for="destinationfrom"> </label>
                          <input class="form-control" type="text" placeholder="Enter The Name Of Visted Place 1"
                            id="place1" required  name="place1" />
                            <span class="error_form" id="place1_error_message"></span>
                          <span class="form-label">Visted Place 1:</span>
                        </div>
                        <div class="col-md-4">
                          <label for="destinationto"> </label>
                          <input class="form-control" type="text" placeholder="Enter The Name Of Visted Place 2" id="place2" required
                          name="place2"/>
                          <span class="error_form" id="place2_error_message"></span>
                          <span class="form-label">Visted Place 2:</span>
                        </div>
                        <div class="col-md-4">
                          <label for="destinationto"> </label>
                          <input class="form-control" type="text" placeholder="Enter The Name Of Visted Place 3" id="place3" required
                          name="place3"/>
                          <span class="error_form" id="place3_error_message"></span>
                          <span class="form-label">Visted Place 3:</span>
                        </div>

                      </div>
                    </div>
                    
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-4">
                          <label for="destinationfrom"> </label>
                          <input class="form-control" type="text" placeholder="Enter The Name Of Visted Place 4"
                            id="place4"  name="place4" />
                            <span class="error_form" id="place4_error_message"></span>
                          <span class="form-label">Visted Place 4:</span>
                        </div>
                        <div class="col-md-4">
                          <label for="destinationto"> </label>
                          <input class="form-control" type="text" placeholder="Enter The Name Of Visted Place 5" id="place5" required
                          name="place5"/>
                          <span class="error_form" id="place5_error_message"></span>
                          <span class="form-label">Visted Place 5:</span>
                        </div>
                        <div class="col-md-4">
                          <label for="destinationto"> </label>
                          <input class="form-control" type="text" placeholder="Enter The Name Of Visted Place 6" id="place6" required
                          name="place6"/>
                          <span class="error_form" id="place6_error_message"></span>
                          <span class="form-label">Visted Place 6:</span>
                        </div>

                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <div class="tripdescription">
                            <label for="tripdescription"> </label>
                            <textarea name="tripdescription" id="tripdescription" cols="30" rows="30" class="form-control"
                              defaultValue=""></textarea>
                              <span class="error_form" id="tripdescription_error_message"></span>
                            <span class="form-label">Trip Description:</span>
                          </div>
                        </div>
                      </div>
                    </div>


                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-4">
                          <label for="destinationfrom"> </label>
                          <input class="form-control" type="text" placeholder="Enter The Service Provided 1"
                            id="s1" required  name="service1" />
                            <span class="error_form" id="s1_error_message"></span>
                          <span class="form-label">Service 1:</span>
                        </div>
                        <div class="col-md-4">
                          <label for="destinationto"> </label>
                          <input class="form-control" type="text" placeholder="Enter The Service Provided 2" id="s2" required
                          name="service2"/>
                          <span class="error_form" id="s2_error_message"></span>
                          <span class="form-label">Service 2:</span>
                        </div>
                        <div class="col-md-4">
                          <label for="destinationto"> </label>
                          <input class="form-control" type="text" placeholder="Enter The Service Provided 3" id="s3" required
                          name="service3"/>
                          <span class="error_form" id="s3_error_message"></span>
                          <span class="form-label">Service 3:</span>
                        </div>

                      </div>
                    </div>
                    
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-4">
                          <label for="destinationfrom"> </label>
                          <input class="form-control" type="text" placeholder="Enter The Service Provided 4"
                            id="s4" required  name="service4" />
                            <span class="error_form" id="s4_error_message"></span>
                          <span class="form-label">Service 4:</span>
                        </div>
                        <div class="col-md-4">
                          <label for="destinationto"> </label>
                          <input class="form-control" type="text" placeholder="Enter The Service Provided 5" id="s5" required
                          name="service5"/>
                          <span class="error_form" id="s5_error_message"></span>
                          <span class="form-label">Service 5:</span>
                        </div>
                        <div class="col-md-4">
                          <label for="destinationto"> </label>
                          <input class="form-control" type="text" placeholder="Enter The Service Provided 6" id="s6" required
                          name="service6"/>
                          <span class="error_form" id="s6_error_message"></span>
                          <span class="form-label">Service 6:</span>
                        </div>

                      </div>
                    </div>


                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <div class="tripdescription">
                            <label for="tripdescription"> </label>
                            <textarea name="servicesnot" id="snot" cols="15" rows="15" class="form-control"
                              defaultValue=""></textarea>
                              <span class="error_form" id="snot_error_message"></span>
                            <span class="form-label">Services Not Inculdes:</span>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-3">
                          <label for="event_name"> </label>
                          <input class="form-control" type="text" placeholder="Enter The Location Name Pickup Point 1" id="pick1"
                            required   name="pick1"/>
                            <span class="error_form" id="pick1_error_message"></span>
                          <span class="form-label">Pick Up Point 1:</span>
                        </div>
                        <div class="col-md-3">
                          <label for="event_org"> </label>
                          <input class="form-control" type="text" placeholder="Time of Arrival At PickUp Point "
                            id="picktime1"  name="picktime1" required />
                            <span class="error_form" id="picktime1_error_message"></span>
                          <span class="form-label">Time For Pickup:</span>
                        </div>
                        <div class="col-md-3">
                          <label for="eventdays"> </label>
                          <input class="form-control" type="text" placeholder="Enter The Location Name Pickup Point2 "
                            id="pick2" name="pick2" required />
                            <span class="error_form" id="pick2_error_message"></span>
                          <span class="form-label">Pick Up Point 2:</span>
                        </div>
                        <div class="col-md-3">
                          <label for="eventdays"> </label>
                          <input class="form-control" type="text" placeholder="Time of Arrival At PickUp Point "
                            id="picktime2" name="picktime2" required />
                            <span class="error_form" id="picktim2_error_message"></span>
                          <span class="form-label">Time For Pickup:</span>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="services_includes"> </label>
                          <input class="form-control" type="number" placeholder="Charges Per Head:"
                            id="perhead" required  name="perhead" />
                            <span class="error_form" id="perhead_error_message"></span>
                          <span class="form-label">PerHead Charge RS/-:</span>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="services_not_includes"> </label>
                          <input class="form-control" type="email" placeholder="Enter your contact Email:"
                            id="email" required name="email"/>
                            <span class="error_form" id="email_error_message"></span>
                          <span class="form-label">Email@:</span>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="services_not_includes"> </label>
                          <input class="form-control" type="number" placeholder="Enter Your Contact Number:"
                            id="phone" required name="phone"/>
                            <span class="error_form" id="phone_error_message"></span>
                          <span class="form-label">Contact at:</span>
                        </div>
                      </div>
                    </div>


                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-12">
                            <label for="Addtional Charges"> </label>
                            <textarea name="addcomment" id="addcomment" cols="30" rows="30" class="form-control"
                              defaultValue=""></textarea>
                              <span class="error_form" id="addcomment_error_message"></span>
                            <span class="form-label">Addtional comment:</span>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                      <div class="row">
                        <div class="col-md-4">
                          <label for="destinationfrom"> </label>
                          <input class="form-control" type="text" placeholder="www.facebook.com/"
                            id="fb" required  name="fb" />
                            <span class="error_form" id="fb_error_message"></span>
                          <span class="form-label">Facebook link 4:</span>
                        </div>
                        <div class="col-md-4">
                          <label for="destinationto"> </label>
                          <input class="form-control" type="text" placeholder="www.instagram.com" id="instagram" required
                          name="instagram"/>
                          <span class="error_form" id="instagram_error_message"></span>
                          <span class="form-label">Instagram link:</span>
                        </div>
                        <div class="col-md-4">
                          <label for="destinationto"> </label>
                          <input class="form-control" type="text" placeholder="www.youtube.com" id="youtube" required
                          name="youtube"/>
                          <span class="error_form" id="youtube_error_message"></span>
                          <span class="form-label">Youtube link:</span>
                        </div>

                      </div>
                    </div>
                        <div class="form-group">
                          <div class="row">
                            <div class="col-md-6">
                              <label for="media_for_trip"> </label>
                              <input class="form-control" type="file" id="image" multiple
                                style="padding-top: 20px " name="image"/>
                                <span class="error_form" id="image_error_message"></span>
                              <span class="form-label w-100">Images/Videos/Demos For Trip: 📷</span>
                            </div>
                          </div>
                          <div class="form-btn" style="margin-top: 20px">
                            <button class="submit-btn">Create Now</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
   
      <!-- footer  -->
          <?php include "particles/eventOrgfooter.php"?>
  </div>
</div>


<script type="text/javascript">
$(function() {
  $("#eventname_error_message").hide();
  $("#eventorg_error_message").hide();
  $("#eventdays_error_message").hide();
  $("#eventtype_error_message").hide();
  $("#destinationfrom_error_message").hide();
  $("#destinationto_error_message").hide();
  $("#datefrom_error_message").hide();
  $("#dateto_error_message").hide();
    $("#place1_error_message").hide();
    $("#place2_error_message").hide();
    $("#place3_error_message").hide();
    $("#place4_error_message").hide();
    $("#place5_error_message").hide();
    $("#place6_error_message").hide();
    $("#tripdescription_error_message").hide();
    $("#s1_error_message").hide();
    $("#s2_error_message").hide();
    $("#s3_error_message").hide();
    $("#s4_error_message").hide();
    $("#s5_error_message").hide();
    $("#s6_error_message").hide();
    $("#snot_error_message").hide();
    $("#pick1_error_message").hide();
    $("#pick2_error_message").hide();
    $("#picktime1_error_message").hide();
    $("#picktime2_error_message").hide();
    $("#perhead_error_message").hide();
    $("#email_error_message").hide();
    $("#phone_error_message").hide();
    $("#addcooment_error_message").hide();
    $("#fb_error_message").hide();
    $("#instagram_error_message").hide();
    $("#youtube_error_message").hide();
    $("#image_error_message").hide();




    var error_eventname= false;
    var error_eventorg = false;
    var error_eventdays = false;
    var error_eventtype = false;
    var error_destinationfrom = false;

    var error_destinationto = false;
    var error_datefrom= false;
    var error_dateto = false;
    var error_place1 = false;
    var error_place2 = false;


    var error_place3 = false;
    var error_place4= false;
    var error_place5 = false;
    var error_place6 = false;
    var error_tripdescription = false;


    var error_s1 = false;
    var error_s2= false;
    var error_s3 = false;
    var error_s4 = false;
    var error_s5 = false;



    var error_s6 = false;
    var error_snot= false;
    var error_pick1 = false;
    var error_picktime1 = false;
    var error_pick2 = false;



    var error_picktime2 = false;
    var error_perhead= false;
    var error_email = false;
    var error_phone = false;
    var error_addcomment = false;


    var error_fb = false;
    var error_instagram= false;
    var error_youtube = false;
    var error_image = false;
    


$("#eventname").focusout(function(){
            check_eventname();
         });
 $("#eventorg").focusout(function(){
            check_eventorg();
         });
 $("#eventdays").focusout(function(){
            check_eventdays();
         });
$("#eventtype").focusout(function(){
            check_eventtype ();
         });
 $("#destinationfrom").focusout(function(){
            check_destinationfrom ();
         });
$("#destinationto").focusout(function(){
            check_destinationto();
         });
$("#datefrom").focusout(function(){
            check_datefrom ();
         });
$("#dateto").focusout(function(){
            check_dateto();
         });
 $("#place1").focusout(function(){
            check_place1();
         });
 $("#place2").focusout(function(){
            check_place2();
         });
$("#place3").focusout(function(){
            check_place3();
         });
 $("#place4").focusout(function(){
            check_place4();
         });
$("#place5").focusout(function(){
            check_place5();
         });
$("#place6").focusout(function(){
            check_place6();
         });
$("#tripdescription").focusout(function(){
            check_tripdescription();
         });
$("#s1").focusout(function(){
            check_s1();
         });
 $("#s2").focusout(function(){
            check_s2();
         });
$("#s3").focusout(function(){
            check_s3();
         });
 $("#s4").focusout(function(){
            check_s4();
         });
$("#s5").focusout(function(){
            check_s5();
         });
$("#s6").focusout(function(){
            check_s6();
         });
$("#snot").focusout(function(){
            check_snot();
         });

 $("#pick1").focusout(function(){
            check_pick1();
         });
$("#pick2").focusout(function(){
            check_pick2();
         });
$("#picktime1").focusout(function(){
            check_picktime1();
         });
$("#picktime2").focusout(function(){
            check_picktime2();
         });
 $("#perhead").focusout(function(){
            check_perhead();
         });
 $("#email").focusout(function(){
            check_email();
         });
$("#phone").focusout(function(){
            check_phone();
         });
$("#addcomment").focusout(function(){
            check_addcomment();
 });
 $("#fb").focusout(function(){
            check_fb();
         });

 $("#instagram").focusout(function(){
            check_instagram();
         });
 $("#youtube").focusout(function(){
            check_youtube();
         });
 $("#image").focusout(function(){
            check_image();
         });




         function check_eventname() {
            var pattern = /^[a-z A-Z]*$/;
            var name = $("#eventname").val();
            if (pattern.test(name) && name !== '') {
               $("#eventname_error_message").hide();
               $("#eventname").css("border","6px solid #34F458");
            } else {
               $("#eventname_error_message").html("Should contain only Characters");
               $("#eventname_error_message").show();
               $("#eventname").css("border","6px solid #F90A0A" );
               $("#eventname_error_message").css("color", "red");
               error_eventname = true;
            }
         }
         function check_eventorg() {
            var pattern = /^[a-z A-Z]*$/;
            var name = $("#eventorg").val();
            if (pattern.test(name) && name !== '') {
               $("#eventorg_error_message").hide();
               $("#eventorg").css("border","6px solid #34F458");
            } else {
               $("#eventorg_error_message").html("Should contain only Characters");
               $("#eventorg_error_message").show();
               $("#eventorg").css("border","6px solid #F90A0A" );
               $("#eventorg_error_message").css("color", "red");
               error_eventorg = true;
            }
         }

         function check_eventdays() {
            var pattern = /^[0-9-+]+$/; 
            var displayphone = $("#eventdays").val();
            if (pattern.test(displayphone) && displayphone !== '') {
               $("#eventdays_error_message").hide();
               $("#eventdays").css("border","6px solid #34F458");
            } else {
               $("#eventdays_error_message").html("displayphone Number is Not Valid");
               $("#eventdays_error_message").show();
               $("#eventdays").css("border","6px solid #F90A0A");
               $("#eventdays_error_message").css("color", "red");
               error_displayphone = true;
            }
         }
         function check_eventtype() {
            var pattern = /^[a-z A-Z]*$/;
            var name = $("#eventtype").val();
            if (pattern.test(name) && name !== '') {
               $("#eventtype_error_message").hide();
               $("#eventtype").css("border","6px solid #34F458");
            } else {
               $("#eventtype_error_message").html("Should contain only Characters");
               $("#eventtype_error_message").show();
               $("#eventtype").css("border","6px solid #F90A0A" );
               $("#eventtype_error_message").css("color", "red");
               error_eventtype = true;
            }
          }
          function check_destinationfrom() {
            var pattern = /^[a-z A-Z]*$/;
            var name = $("#destinationfrom").val();
            if (pattern.test(name) && name !== '') {
               $("#destinationfrom_error_message").hide();
               $("#destinationfrom").css("border","6px solid #34F458");
            } else {
               $("#destinationfrom_error_message").html("Should contain only Characters");
               $("#destinationfrom_error_message").show();
               $("#destinationfrom").css("border","6px solid #F90A0A" );
               $("#destinationfrom_error_message").css("color", "red");
               error_destinationfrom = true;
            }
          }
          function check_destinationto() {
            var pattern = /^[a-z A-Z]*$/;
            var name = $("#destinationto").val();
            if (pattern.test(name) && name !== '') {
               $("#destinationto_error_message").hide();
               $("#destinationto").css("border","6px solid #34F458");
            } else {
               $("#destinationto_error_message").html("Should contain only Characters");
               $("#destinationto_error_message").show();
               $("#destinationto").css("border","6px solid #F90A0A" );
               $("#destinationto_error_message").css("color", "red");
               error_destinationto = true;
            }
          }
          function check_datefrom() {
            var pattern = /^[0-9-+]+$/; 
            var displayphone = $("#datefrom").val();
            if (pattern.test(displayphone) && displayphone !== '') {
               $("#datefrom_error_message").hide();
               $("#datefrom").css("border","6px solid #34F458");
            } else {
               $("#datefrom_error_message").html("Date Is Not Valid");
               $("#datefrom_error_message").show();
               $("#datefrom").css("border","6px solid #F90A0A");
               $("#datefrom_error_message").css("color", "red");
               error_datefrom = true;
            }
         }
         function check_dateto() {
            var pattern = /^[0-9-+]+$/; 
            var displayphone = $("#dateto").val();
            if (pattern.test(displayphone) && displayphone !== '') {
               $("#dateto_error_message").hide();
               $("#dateto").css("border","6px solid #34F458");
            } else {
               $("#dateto_error_message").html("Date Is Not Valid");
               $("#dateto_error_message").show();
               $("#dateto").css("border","6px solid #F90A0A");
               $("#dateto_error_message").css("color", "red");
               error_dateto = true;
            }
         }
         function check_place1() {
            var pattern = /^[a-z A-Z]*$/;
            var name = $("#place1").val();
            if (pattern.test(name) && name !== '') {
               $("#place1_error_message").hide();
               $("#place1").css("border","6px solid #34F458");
            } else {
               $("#place1_error_message").html("Should contain only Characters");
               $("#place1_error_message").show();
               $("#place1").css("border","6px solid #F90A0A" );
               $("#place1_error_message").css("color", "red");
               error_place1 = true;
            }
         }
         function check_place6() {
            var pattern = /^[a-z A-Z]*$/;
            var name = $("#place6").val();
            if (pattern.test(name) && name !== '') {
               $("#place6_error_message").hide();
               $("#place6").css("border","6px solid #34F458");
            } else {
               $("#place6_error_message").html("Should contain only Characters");
               $("#place6_error_message").show();
               $("#place6").css("border","6px solid #F90A0A" );
               $("#place6_error_message").css("color", "red");
               error_place6 = true;
            }
         }
         function check_place3() {
            var pattern = /^[a-z A-Z]*$/;
            var name = $("#place3").val();
            if (pattern.test(name) && name !== '') {
               $("#place3_error_message").hide();
               $("#place3").css("border","6px solid #34F458");
            } else {
               $("#place3_error_message").html("Should contain only Characters");
               $("#place3_error_message").show();
               $("#place3").css("border","6px solid #F90A0A" );
               $("#place3_error_message").css("color", "red");
               error_place3 = true;
            }
         }
         function check_place4() {
            var pattern = /^[a-z A-Z]*$/;
            var name = $("#place4").val();
            if (pattern.test(name) && name !== '') {
               $("#place4_error_message").hide();
               $("#place4").css("border","6px solid #34F458");
            } else {
               $("#place4_error_message").html("Should contain only Characters");
               $("#place4_error_message").show();
               $("#place4").css("border","6px solid #F90A0A" );
               $("#place4_error_message").css("color", "red");
               error_place4 = true;
            }
         }
         function check_place5() {
            var pattern = /^[a-z A-Z]*$/;
            var name = $("#place5").val();
            if (pattern.test(name) && name !== '') {
               $("#place5_error_message").hide();
               $("#place5").css("border","6px solid #34F458");
            } else {
               $("#place5_error_message").html("Should contain only Characters");
               $("#place5_error_message").show();
               $("#place5").css("border","6px solid #F90A0A" );
               $("#place5_error_message").css("color", "red");
               error_place5 = true;
            }
         }
         function check_place2() {
            var pattern = /^[a-z A-Z]*$/;
            var name = $("#place2").val();
            if (pattern.test(name) && name !== '') {
               $("#place2_error_message").hide();
               $("#place2").css("border","6px solid #34F458");
            } else {
               $("#place2_error_message").html("Should contain only Characters");
               $("#place2_error_message").show();
               $("#place2").css("border","6px solid #F90A0A" );
               $("#place2_error_message").css("color", "red");
               error_place2 = true;
            }
         }
         function check_tripdescription() {
            var pattern = /^[a-z A-Z]*$/;
            var name = $("#tripdescription").val();
            if (pattern.test(name) && name !== '') {
               $("#tripdescription_error_message").hide();
               $("#tripdescription").css("border","6px solid #34F458");
            } else {
               $("#tripdescription_error_message").html("Should contain only Characters");
               $("#tripdescription_error_message").show();
               $("#tripdescription").css("border","6px solid #F90A0A" );
               $("#tripdescription_error_message").css("color", "red");
               error_tripdescription = true;
            }
         }

         function check_s1() {
            var pattern = /^[a-z A-Z]*$/;
            var name = $("#s1").val();
            if (pattern.test(name) && name !== '') {
               $("#s1_error_message").hide();
               $("#s1").css("border","6px solid #34F458");
            } else {
               $("#s1_error_message").html("Should contain only Characters");
               $("#s1_error_message").show();
               $("#s1").css("border","6px solid #F90A0A" );
               $("#s1_error_message").css("color", "red");
               error_s1 = true;
            }
         }
         function check_s6() {
            var pattern = /^[a-z A-Z]*$/;
            var name = $("#s6").val();
            if (pattern.test(name) && name !== '') {
               $("#s6_error_message").hide();
               $("#s6").css("border","6px solid #34F458");
            } else {
               $("#s6_error_message").html("Should contain only Characters");
               $("#s6_error_message").show();
               $("#s6").css("border","6px solid #F90A0A" );
               $("#s6_error_message").css("color", "red");
               error_s6 = true;
            }
         }
         function check_s3() {
            var pattern = /^[a-z A-Z]*$/;
            var name = $("#s3").val();
            if (pattern.test(name) && name !== '') {
               $("#s3_error_message").hide();
               $("#s3").css("border","6px solid #34F458");
            } else {
               $("#s3_error_message").html("Should contain only Characters");
               $("#s3_error_message").show();
               $("#s3").css("border","6px solid #F90A0A" );
               $("#s3_error_message").css("color", "red");
               error_s3 = true;
            }
         }
         function check_s4() {
            var pattern = /^[a-z A-Z]*$/;
            var name = $("#s4").val();
            if (pattern.test(name) && name !== '') {
               $("#s4_error_message").hide();
               $("#s4").css("border","6px solid #34F458");
            } else {
               $("#s4_error_message").html("Should contain only Characters");
               $("#s4_error_message").show();
               $("#s4").css("border","6px solid #F90A0A" );
               $("#s4_error_message").css("color", "red");
               error_s4 = true;
            }
         }
         function check_s5() {
            var pattern = /^[a-z A-Z]*$/;
            var name = $("#s5").val();
            if (pattern.test(name) && name !== '') {
               $("#s5_error_message").hide();
               $("#s5").css("border","6px solid #34F458");
            } else {
               $("#s5_error_message").html("Should contain only Characters");
               $("#s5_error_message").show();
               $("#s5").css("border","6px solid #F90A0A" );
               $("#s5_error_message").css("color", "red");
               error_s5 = true;
            }
         }
         function check_s2() {
            var pattern = /^[a-z A-Z]*$/;
            var name = $("#s2").val();
            if (pattern.test(name) && name !== '') {
               $("#s2_error_message").hide();
               $("#s2").css("border","6px solid #34F458");
            } else {
               $("#s2_error_message").html("Should contain only Characters");
               $("#s2_error_message").show();
               $("#s2").css("border","6px solid #F90A0A" );
               $("#s2_error_message").css("color", "red");
               error_s2 = true;
            }
         }
         function check_snot() {
            var pattern = /^[a-z A-Z]*$/;
            var name = $("#snot").val();
            if (pattern.test(name) && name !== '') {
               $("#snot_error_message").hide();
               $("#snot").css("border","6px solid #34F458");
            } else {
               $("#snot_error_message").html("Should contain only Characters");
               $("#snot_error_message").show();
               $("#snot").css("border","6px solid #F90A0A" );
               $("#snot_error_message").css("color", "red");
               error_snot = true;
            }
         }
         function check_pick1() {
            var pattern = /^[a-z A-Z]*$/;
            var name = $("#pick1").val();
            if (pattern.test(name) && name !== '') {
               $("#pick1_error_message").hide();
               $("#pick1").css("border","6px solid #34F458");
            } else {
               $("#pick1_error_message").html("Should contain only Characters");
               $("#pick1_error_message").show();
               $("#pick1").css("border","6px solid #F90A0A" );
               $("#pick1_error_message").css("color", "red");
               error_pick1 = true;
            }
         }
         function check_pick2() {
            var pattern = /^[a-z A-Z]*$/;
            var name = $("#pick2").val();
            if (pattern.test(name) && name !== '') {
               $("#pick2_error_message").hide();
               $("#pick2").css("border","6px solid #34F458");
            } else {
               $("#pick2_error_message").html("Should contain only Characters");
               $("#pick2_error_message").show();
               $("#pick2").css("border","6px solid #F90A0A" );
               $("#pick2_error_message").css("color", "red");
               error_pick2 = true;
            }
         }
         function check_picktime1() {
            var pattern = /^[0-9-+]+$/; 
            var displayphone = $("#picktime1").val();
            if (pattern.test(displayphone) && displayphone !== '') {
               $("#picktime1_error_message").hide();
               $("#picktime1").css("border","6px solid #34F458");
            } else {
               $("#picktime1_error_message").html("Date Is Not Valid");
               $("#picktime1_error_message").show();
               $("#picktime1").css("border","6px solid #F90A0A");
               $("#picktime1_error_message").css("color", "red");
               error_picktime1 = true;
            }
         }
         function check_picktime2() {
            var pattern = /^[0-9-+]+$/; 
            var displayphone = $("#picktime2").val();
            if (pattern.test(displayphone) && displayphone !== '') {
               $("#picktime2_error_message").hide();
               $("#picktime2").css("border","6px solid #34F458");
            } else {
               $("#picktime2_error_message").html("Date Is Not Valid");
               $("#picktime2_error_message").show();
               $("#picktime2").css("border","6px solid #F90A0A");
               $("#picktime2_error_message").css("color", "red");
               error_picktime2 = true;
            }
         }
         function check_perhead() {
          var pattern = /^[0-9-+]+$/; 
            var name = $("#perhead").val();
            if (pattern.test(name) && name !== '') {
               $("#perhead_error_message").hide();
               $("#perhead").css("border","6px solid #34F458");
            } else {
               $("#perhead_error_message").html("Should contain only numbers");
               $("#perhead_error_message").show();
               $("#perhead").css("border","6px solid #F90A0A" );
               $("#perhead_error_message").css("color", "red");
               error_perhead = true;
            }
         }
         function check_email() {
            var pattern = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
            var displayemail = $("#email").val();
            if (pattern.test(displayemail) && displayemail !== '') {
               $("#email_error_message").hide();
               $("#email").css("border","6px solid #34F458");
            } else {
               $("#email_error_message").html("Invalid email");
               $("#email_error_message").show();
               $("#email").css("border","6px solid #F90A0A");
               $("#email_error_message").css("color", "red");
               error_email = true;
            }
         }
         function check_phone() {
            var pattern = /^[0-9-+]+$/; 
            var displayphone = $("#phone").val();
            if (pattern.test(displayphone) && displayphone !== '') {
               $("#phone_error_message").hide();
               $("#phone").css("border","6px solid #34F458");
            } else {
               $("#phone_error_message").html("phone Number is Not Valid");
               $("#phone_error_message").show();
               $("#phone").css("border","6px solid #F90A0A");
               $("#phone_error_message").css("color", "red");
               error_displayphone = true;
            }
         }
         function check_addcomment() {
            var pattern = /^[a-z A-Z]*$/;
            var name = $("#addcomment").val();
            if (pattern.test(name) && name !== '') {
               $("#addcomment_error_message").hide();
               $("#addcomment").css("border","6px solid #34F458");
            } else {
               $("#addcomment_error_message").html("Should contain only Characters");
               $("#addcomment_error_message").show();
               $("#addcomment").css("border","6px solid #F90A0A" );
               $("#addcomment_error_message").css("color", "red");
               error_addcomment = true;
            }
         }
         function check_fb() {
            var pattern = /^(http:\/\/www\.|https:\/\/www\.)[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/; 
            var fblink = $("#fb").val();
            if (pattern.test(fblink) && fblink !== '') {
               $("#fb_error_message").hide();
               $("#fb").css("border","6px solid #34F458");
            } else {
               $("#fb_error_message").html("Please Provide Correct Facebook Link" );
               $("#fb_error_message").show();
               $("#fb").css("border","6px solid #F90A0A");
               $("#fb_error_message").css("color", "red");
               error_fblink = true;
            }
         }
         function check_instagram() {
            var pattern = /^(http:\/\/www\.|https:\/\/www\.)[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/; 
            var instagramlink = $("#instagram").val();
            if (pattern.test(instagramlink) && instagramlink !== '') {
               $("#instagram_error_message").hide();
               $("#instagram").css("border","6px solid #34F458");
            } else {
               $("#instagram_error_message").html("Please Provide Correct Instagram Link" );
               $("#instagram_error_message").show();
               $("#instagram").css("border","6px solid #F90A0A");
               $("#instagram_error_message").css("color", "red");
               error_instagramlink = true;
            }
         }
         function check_youtube() {
            var pattern = /^(http:\/\/www\.|https:\/\/www\.)[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/; 
            var youtubelink = $("#youtube").val();
            if (pattern.test(youtubelink) && youtubelink !== '') {
               $("#youtube_error_message").hide();
               $("#youtube").css("border","6px solid #34F458");
            } else {
               $("#youtube_error_message").html("Please Provide Correct Youtube Link" );
               $("#youtube_error_message").show();
               $("#youtube").css("border","6px solid #F90A0A");
               $("#youtube_error_message").css("color", "red");
               error_youtubelink = true;
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
             $("##image_error_message").css("color", "red");
             error_image = true;
          }
       }
});
</script>





















 
    <script src="public/eventOrg_dashboard_files/assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="public/eventOrg_dashboard_files/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="public/eventOrg_dashboard_files/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <script src="public/eventOrg_dashboard_files/dist/js/app.min.js"></script>
    <script src="public/eventOrg_dashboard_files/dist/js/app.init.js"></script>
    <script src="public/eventOrg_dashboard_files/dist/js/app-style-switcher.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="public/eventOrg_dashboard_files/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="public/eventOrg_dashboard_files/assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="public/eventOrg_dashboard_files/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="public/eventOrg_dashboard_files/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="public/eventOrg_dashboard_files/dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <script src="public/eventOrg_dashboard_files/assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="public/eventOrg_dashboard_files/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <!--c3 JavaScript -->
    <script src="public/eventOrg_dashboard_files/assets/extra-libs/c3/d3.min.js"></script>
    <script src="public/eventOrg_dashboard_files/assets/extra-libs/c3/c3.min.js"></script>
    <script src="public/eventOrg_dashboard_files/assets/libs/chart.js/dist/Chart.min.js"></script>
    <script src="public/eventOrg_dashboard_files/dist/js/pages/dashboards/dashboard7.js"></script>
</body>

</html>