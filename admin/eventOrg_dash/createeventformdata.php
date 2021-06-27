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

 $user_id = $_SESSION['user']['user_id']; 
 


    // checking Already Existed Users 

    $SQLValidates = "SELECT eventname,tripdescription FROM tourevents  WHERE  eventname ='{$eventname}' OR tripdescription = '{$tripdescription}'"; 
    // /  QueryResult 

    $resultValidates = mysqli_query($conn,$SQLValidates) or die ("Query Failed"); 
    
     if($eventname=="" OR $eventorg =="" OR $eventdays  =="" OR $type  =="" OR $destinationform =="" OR $destinationto =="" OR  $datefrom ==""  OR $dateto =="" OR $tripdescription =="" OR  $place1 ==""OR  $service1 ==""  OR $pick1 =="" OR $fb =="" OR  $youtube =="") {
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>All Fields Required</strong> 
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>'; 
  } elseif(mysqli_num_rows($resultValidates) > 0 ){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Tourist Guider Profile Found. Want Chances? Edit Your  Profile  </strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    }else{
      $sqlData="INSERT INTO tourevents (user_id,eventname,eventorg,eventdays,type,	destinationform,destinationto,datefrom,dateto,place1,place2,place3,place4,place5,place6,tripdescription,service1,service2,service3,service4,service5,service6,servicesnot,pick1,picktime1,pick2,picktime2,perhead,email,phone,addcomment,image) VAlUES({$user_id},'{$eventname}','{$eventorg}',{$eventdays},'{$type}','{$destinationform}','{$destinationto}','{$datefrom}','{$dateto}','{$place1}','{$place2}','{$place3}','{$place4}','{$place5}','{$place6}','{$tripdescription}','{$service1}','{$service2}','{$service3}','{$service4}','{$service5}','{$service6}','{$servicesnot}','{$pick1}','{$picktime1}','{$pick2}','{$picktime2}','{$perhead}','{$email}',{$phone},'{$addcomment}','{$file_name}')";
      if (mysqli_query($conn,$sqlData)){
         echo '<div class="alert alert-success" role="alert">
         <strong>Event Created !! Click to Dashboard View Card</strong> 
       </div>';
       header("Location: http://localhost/epaktourisum/admin/eventOrg_dash/upcomingevents.php");
     }

}
  
}

?>