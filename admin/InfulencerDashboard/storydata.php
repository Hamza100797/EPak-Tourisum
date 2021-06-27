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
   move_uploaded_file ($file_tmp,'Infulencer_Dashboard/upload/'.$file_name); 
}
else{
    print_r($errors);
    die();
}

 $conn = mysqli_connect("localhost","root","","epaktourism") or die("Connection Failed:" .mysqli_connect_error());
  $displayname = mysqli_real_escape_string($conn,$_POST['displayname']);
  $displayemail = mysqli_real_escape_string($conn,$_POST['displayemail']);
  $displayphone = mysqli_real_escape_string($conn,$_POST['displayphone']);
  $address = mysqli_real_escape_string($conn,$_POST['address']);
  
  $fb = mysqli_real_escape_string($conn,$_POST['fb']);
  $instagram = mysqli_real_escape_string($conn,$_POST['instagram']);
  $youtube = mysqli_real_escape_string($conn,$_POST['youtube']);
  $Posttitle = mysqli_real_escape_string($conn,$_POST['Posttitle']);
  $posteddate = mysqli_real_escape_string($conn,$_POST['posteddate']);
  $experience = mysqli_real_escape_string($conn,$_POST['experience']);

  $aeratag1 = mysqli_real_escape_string($conn,$_POST['aeratag1']);
  $aeratag2 = mysqli_real_escape_string($conn,$_POST['aeratag2']);
  $aeratag3 = mysqli_real_escape_string($conn,$_POST['aeratag3']);
  $aeratag4 = mysqli_real_escape_string($conn,$_POST['aeratag4']);
  
  $user_id = $_SESSION['user']['user_id']; 

  $SQLValidates = "SELECT * FROM infulencer  WHERE  Posttitle ='{$Posttitle}'  OR experience = '{$experience}' ";
  $resultValidates = mysqli_query($conn,$SQLValidates) or die ("Query Failed");
  if($displayname=="" OR $displayemail =="" OR $displayphone  =="" OR $address  =="" OR $Posttitle =="" OR $experience =="" OR  $aeratag1 =="") {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>All Fields Required</strong> 
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
} elseif(mysqli_num_rows($resultValidates) > 0 ){
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Infulencer Story Found. Write Different Story  </strong> 
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
  }else{

  $sqlData="INSERT INTO infulencer (user_id,displayname,displayemail,displayphone,address,fb,instagram,youtube,Posttitle,posteddate,experience,aeratag1,aeratag2,aeratag3,aeratag4,image) VAlUES({$user_id},'{$displayname}','{$displayemail}','{$displayphone}','{$address}','{$fb}','{$instagram}','{$youtube}','{$Posttitle}','{$posteddate}','{$experience}','{$aeratag1}','{$aeratag2}','{$aeratag3}','{$aeratag4}','{$file_name}') ";
     if (mysqli_query($conn,$sqlData)){
         echo '<div class="alert alert-success" role="alert">
         <strong>Records are Added Refresh Page to View your Story</strong> 
       </div>';
      //  header("Location: http://localhost/epaktourisum/admin/TouristDashboardGuider");
     }

}
  
}
?>