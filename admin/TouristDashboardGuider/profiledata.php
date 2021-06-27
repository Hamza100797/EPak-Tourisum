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
 $user_id = $_SESSION['user']['user_id']; 
 


    // checking Already Existed Users 

    $SQLValidates = "SELECT user_id,displayEmail,cnic,displayPhone FROM touristguider  WHERE user_id={$user_id} OR displayEmail ='{$displayEmail}' OR cnic = '{$cnic}' OR displayPhone = '{$displayPhone}'";
    // /  QueryResult 

    $resultValidates = mysqli_query($conn,$SQLValidates) or die ("Query Failed");
    
    if($displayName=="" OR $displayEmail =="" OR $displayPhone  =="" OR $address  =="" OR $cnic =="" OR $services =="" OR  $servicesaera =="") {
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
      $sqlData="INSERT INTO touristguider (user_id,displayName,displayEmail,displayPhone,address,cnic,fb,instagram,twitter,services,servicesaera,servicescharges,aboutme,image) VAlUES({$user_id},'{$displayName}','{$displayEmail}','{$displayPhone}','{$address}','{$cnic}','{$fb}','{$instagram}','{$twitter}','{$services}','{$servicesaera}','{$servicescharges}','{$aboutme}','{$file_name}')";
      if (mysqli_query($conn,$sqlData)){
         echo '<div class="alert alert-success" role="alert">
         <strong>Records are Added Login To Account!! Click to Dashboard View Card</strong> 
       </div>';
       //header("Location: http://localhost/epaktourisum/admin/TouristDashboardGuider/viewprofile.php");
     }

}
  
}

?>