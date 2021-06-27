<?php 

if (isset($_FILES['image'])){


  $errors = array();
  $file_name=$_FILES['image']['name'];
  $file_size=$_FILES['image']['size'];
 $file_tmp=$_FILES['image']['tmp_name'];
 $file_type=$_FILES['image']['type'];
 $tmp = explode('.', $file_name);
$file_ext= strtolower(end($tmp)); 
$extensions = array("jpeg","jpg","png");



if (in_array($file_ext,$extensions)=== false){
   $errors[]='This Extension is Not Allowed,Please Select "jpeg","jpg","png" ' ;
}

if ($file_size > 209715234){
    $errors[]='File Size Must be 5MB ' ;
}

if (empty($errors)==true){
   move_uploaded_file ($file_tmp,'TouristGuider_Dashboard/upload/'.$file_name); 
}
else{
    print_r($errors);
    die();
}

  $conn = mysqli_connect("localhost","root","","epaktourism") or die("Connection Failed:" .mysqli_connect_error());
 $displayName = mysqli_real_escape_string($conn,$_POST['displayName']);
   $displayEmail = mysqli_real_escape_string($conn,$_POST['displayEmail']);
   $displayPhone = mysqli_real_escape_string($conn,$_POST['displayPhone']);
   $address = mysqli_real_escape_string($conn,$_POST['address']);
   $cnic = mysqli_real_escape_string($conn,$_POST['cnic']);
   $fb = mysqli_real_escape_string($conn,$_POST['fb']);
   $instagram = mysqli_real_escape_string($conn,$_POST['instagram']);
   $twitter = mysqli_real_escape_string($conn,$_POST['twitter']);
   $services = mysqli_real_escape_string($conn,$_POST['services']);
   $servicesaera = mysqli_real_escape_string($conn,$_POST['servicesaera']);
  $servicescharges = mysqli_real_escape_string($conn,$_POST['servicescharges']);
  // $image = mysqli_real_escape_string($conn,$_POST['image']);
 $aboutme = mysqli_real_escape_string($conn,$_POST['aboutme']);
  $userid=$_GET['id'];
 
  $sqlCardProfileUpdate ="UPDATE touristguider SET displayName ='{$displayName}', displayEmail ='{$displayEmail}',displayPhone ='{$displayPhone}', address ='{$address}' ,cnic ='{$cnic}',fb ='{$fb}', instagram ='{$instagram}', twitter ='{$twitter}' ,services ='{$services}',servicesaera ='{$servicesaera}',  servicescharges ='{$servicescharges}', image ='{$file_name}' WHERE touristguider_id  ={$userid}";

 if (mysqli_query($conn,$sqlCardProfileUpdate)){
   header("Location: http://localhost/epaktourisum/admin/adminDashboard/TouristGuiderProfile.php");
 }


}


?>