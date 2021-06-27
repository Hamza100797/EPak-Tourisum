<?php 
 session_start();
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
   move_uploaded_file ($file_tmp,'public/eventOrg_dashboard_files/upload'.$file_name); 
}
else{
    print_r($errors);
    die();
}

  $conn = mysqli_connect("localhost","root","","epaktourism") or die("Connection Failed:" .mysqli_connect_error());

  $eventname = mysqli_real_escape_string($conn,$_POST['eventname']);
  $eventorg = mysqli_real_escape_string($conn,$_POST['eventorg']);
  $eventdays = mysqli_real_escape_string($conn,$_POST['eventdays']);
  $type = mysqli_real_escape_string($conn,$_POST['type']);
  $destinationform = mysqli_real_escape_string($conn,$_POST['destinationform']);
  $destinationto = mysqli_real_escape_string($conn,$_POST['destinationto']);
  $datefrom = mysqli_real_escape_string($conn,$_POST['datefrom']);
  $dateto = mysqli_real_escape_string($conn,$_POST['dateto']);
  $place1 = mysqli_real_escape_string($conn,$_POST['place1']);
  $place2 = mysqli_real_escape_string($conn,$_POST['place2']);
  $place3 = mysqli_real_escape_string($conn,$_POST['place3']);
   $place4 = mysqli_real_escape_string($conn,$_POST['place4']);
  $place5 = mysqli_real_escape_string($conn,$_POST['place5']);
  $place6 = mysqli_real_escape_string($conn,$_POST['place6']);

  $tripdescription = mysqli_real_escape_string($conn,$_POST['tripdescription']);

  $service1 = mysqli_real_escape_string($conn,$_POST['service1']);
  $service2 = mysqli_real_escape_string($conn,$_POST['service2']);
  $service3 = mysqli_real_escape_string($conn,$_POST['service3']);
  $service4 = mysqli_real_escape_string($conn,$_POST['service4']);
   $service5 = mysqli_real_escape_string($conn,$_POST['service5']);
  $service6 = mysqli_real_escape_string($conn,$_POST['service6']);

  $servicesnot = mysqli_real_escape_string($conn,$_POST['servicesnot']);

  $pick1 = mysqli_real_escape_string($conn,$_POST['pick1']);
  $picktime1 = mysqli_real_escape_string($conn,$_POST['picktime1']);
  $pick2 = mysqli_real_escape_string($conn,$_POST['pick2']);
  $picktime2 = mysqli_real_escape_string($conn,$_POST['picktime2']);
   $perhead = mysqli_real_escape_string($conn,$_POST['perhead']);
  $email = mysqli_real_escape_string($conn,$_POST['email']);

  $phone = mysqli_real_escape_string($conn,$_POST['phone']);
   $addcomment = mysqli_real_escape_string($conn,$_POST['addcomment']);
//   $image = mysqli_real_escape_string($conn,$_POST['image']);

  $fb = mysqli_real_escape_string($conn,$_POST['fb']);
  $instagram = mysqli_real_escape_string($conn,$_POST['instagram']);
  $youtube = mysqli_real_escape_string($conn,$_POST['youtube']);

  $userid=$_GET['id']; 
 


 $sqlCardProfileUpdate ="UPDATE tourevents SET eventname ='{$eventname}', eventorg ='{$eventorg}',eventdays ='{$eventdays}', type ='{$type}' ,destinationform ='{$destinationform}',destinationto ='{$destinationto}', datefrom ='{$datefrom}', dateto ='{$dateto}' ,place1 ='{$place1}',place2 ='{$place2}',  place3 ='{$place3}', image ='{$file_name}', place4 ='{$place4}', place5 ='{$place5}', place6 ='{$place6}', tripdescription ='{$tripdescription}' ,service2 ='{$service2}',service3 ='{$service3}',  service4 ='{$service4}', service5 ='{$service5}', service6 ='{$service6}', servicesnot ='{$servicesnot}', pick1 ='{$pick1}',picktime1 ='{$picktime1}',  pick2 ='{$pick2}', picktime2 ='{$picktime2}', perhead ='{$perhead}', email ='{$email}', phone ='{$phone}' , addcomment ='{$addcomment}', fb ='{$fb}', instagram ='{$instagram}', youtube ='{$youtube}'WHERE event_id={$userid}";

 if (mysqli_query($conn,$sqlCardProfileUpdate)){
    header("Location: http://localhost/epaktourisum/admin/eventOrg_dash/upcomingevents.php");
 }

}
  

?>