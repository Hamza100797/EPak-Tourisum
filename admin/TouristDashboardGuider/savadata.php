
<?php 

// Updating Fotm Part 
// Updating Part 
$conn = mysqli_connect("localhost","root","","epaktourism") or die("Connection Failed:" .mysqli_connect_error());
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

}
    $userid = mysqli_real_escape_string($conn,$_POST['user_id']);
    $fname = mysqli_real_escape_string($conn,$_POST['fname']);
    $lname =mysqli_real_escape_string($conn,$_POST['lname']);
    $username =mysqli_real_escape_string($conn,$_POST['username']);
 
    $cnic =mysqli_real_escape_string($conn,$_POST['cnic']);
    $phone =mysqli_real_escape_string($conn,$_POST['phone']);
    $role =mysqli_real_escape_string($conn,$_POST['role']);
    $gender =mysqli_real_escape_string($conn,$_POST['gender']);
    $fb =mysqli_real_escape_string($conn,$_POST['fb']);
    $twitter =mysqli_real_escape_string($conn,$_POST['twitter']);
    $youtube =mysqli_real_escape_string($conn,$_POST['youtube']);
    $website =mysqli_real_escape_string($conn,$_POST['website']);
    
    $linkedin =mysqli_real_escape_string($conn,$_POST['linkedin']);
    $easypasia =mysqli_real_escape_string($conn,$_POST['easypasia']);
    $jazzcash =mysqli_real_escape_string($conn,$_POST['jazzcash']);
    $instagram =mysqli_real_escape_string($conn,$_POST['instagram']);
    // $password =mysqli_real_escape_string($conn,md5($_POST['password']));
    $role = "TouristGuider";
    
    $sqluserUpdate ="UPDATE users SET fname ='{$fname}', role ='{$role}',  lname ='{$lname}', cnic ='{$cnic}',username ='{$username}' ,phone ='{$phone}',role ='{$role}', gender ='{$gender}', fb ='{$fb}' ,twitter ='{$twitter}',youtube ='{$youtube}',  website ='{$website}', image ='{$file_name}', linkedin ='{$linkedin}',easypasia ={$easypasia}, jazzcash ={$jazzcash},instagram ='{$instagram}' WHERE user_id ={$userid}";

        if (mysqli_query($conn,$sqluserUpdate)){
          header("Location: http://localhost/epaktourisum/admin/TouristDashboardGuider/index.php");
        }   
   

?>
