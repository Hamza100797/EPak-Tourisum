    
    
  <?php 
 
 
 // Updating Fotm Part 
 // Updating Part 
 if (isset($_POST['submit'])){
   $conn = mysqli_connect("localhost","root","","epaktourism") or die("Connection Failed:" .mysqli_connect_error());
 
     $userid = mysqli_real_escape_string($conn,$_POST['user_id']);
     $fname = mysqli_real_escape_string($conn,$_POST['fname']);
     $lname =mysqli_real_escape_string($conn,$_POST['lname']);
     $username =mysqli_real_escape_string($conn,$_POST['username']);
     $email =mysqli_real_escape_string($conn,$_POST['email']);
 
     $phone =mysqli_real_escape_string($conn,$_POST['phone']);
     $role =mysqli_real_escape_string($conn,$_POST['role']);
     $gender =mysqli_real_escape_string($conn,$_POST['gender']);
     $fb =mysqli_real_escape_string($conn,$_POST['fb']);
     $twitter =mysqli_real_escape_string($conn,$_POST['twitter']);
     $youtube =mysqli_real_escape_string($conn,$_POST['youtube']);
     $website =mysqli_real_escape_string($conn,$_POST['website']);
     $image =mysqli_real_escape_string($conn,$_POST['image']);
 
     $easypasia =mysqli_real_escape_string($conn,$_POST['easypasia']);
     $jazzcash =mysqli_real_escape_string($conn,$_POST['jazzcash']);
     $instagram =mysqli_real_escape_string($conn,$_POST['instagram']);
     // $password =mysqli_real_escape_string($conn,md5($_POST['password']));
   
     
     $sqluserUpdate ="UPDATE users SET fname ='{$fname}', lname ='{$lname}',username ='{$username}', email ='{$email}' ,phone ='{$phone}',role ='{$role}', gender ='{$gender}', fb ='{$fb}' ,twitter ='{$twitter}',youtube ='{$youtube}',  website ='{$website}', image ='{$image}', easypasia ={$easypasia}, jazzcash ={$jazzcash},instagram ='{$instagram}' WHERE user_id ={$userid}";
 
         if (mysqli_query($conn,$sqluserUpdate)){
           header("Location: http://localhost/epaktourisum/admin/adminDashboard/allExpoler.php");
         }
   
         
     }
  
     mysqli_close($conn)
  ?>  