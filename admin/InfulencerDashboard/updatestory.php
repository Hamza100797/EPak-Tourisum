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
  
  $userid=$_GET['id']; 



   $sqlCardProfileUpdate ="UPDATE infulencer SET displayname ='{$displayname}', displayemail ='{$displayemail}',displayphone ='{$displayphone}', address ='{$address}' ,fb ='{$fb}',instagram ='{$instagram}', youtube ='{$youtube}', Posttitle ='{$Posttitle}' ,posteddate ='{$posteddate}',experience ='{$experience}',  aeratag1 ='{$aeratag1}', image ='{$file_name}', aeratag2 ='{$aeratag2}', aeratag3 ='{$aeratag3}', aeratag4 ='{$aeratag4}' WHERE influncer_id={$userid}";

 if (mysqli_query($conn,$sqlCardProfileUpdate)){
    header("Location: http://localhost/epaktourisum/admin/InfulencerDashboard/stories.php");
 }

}
  

?>