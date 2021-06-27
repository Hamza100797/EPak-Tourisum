      <!-- Login Code  -->
      <?php 
           session_start();
           include "config.php";
           //Getting Input value
            if(isset($_POST['login'])){
              $email=mysqli_real_escape_string($conn,$_POST['email']);
              $password=md5($_POST['password']);
              if(empty($email)&&empty($password)){
                $error= '<div class="alert alert-danger  alert-dismissible fade show" role="alert">
                <strong>Fields Required !</strong> Please Provide Username and Password.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
                }else{
               //Checking Login Detail
               $result=mysqli_query($conn,"SELECT*FROM users WHERE email='$email' AND password='$password'");
               $row=mysqli_fetch_assoc($result);
               $count=mysqli_num_rows($result);
               if($count==1){
                $_SESSION['user']=array(
             'email'=>$row['email'],
             'username'=>$row['username'],
             'fname'=>$row['fname'],
             'lname'=>$row['lname'],
             'user_id'=>$row['user_id'],
             'password'=>$row['password'],
             'role'=>$row['role']
             );
             $role=$_SESSION['user']['role'];
             //Redirecting User Based on Role
              switch($role){
            case 'Event Organisor':
              header("Location: {$hostname}/admin/eventOrg_dash/index.php");
            break;
            case 'Tourist':
              header("Location: {$hostname}/admin/TouristDashboard/index.php");
            break;
            case 'TouristGuider':
              header("Location: {$hostname}/admin/TouristDashboardGuider");
            break;
            case 'Infulencer':
              header("Location: {$hostname}/admin/InfulencerDashboard/index.php");
            break;
            case 'Blogger':
              header("Location: {$hostname}/admin/ExpolrePakistanDashboard/index.php");
            break;
            case 'Vister':
              header("Location: {$hostname}/admin/ExpolrePakistanDashboard/index.php");
            break;
            case 'Admin':
              header("Location: {$hostname}/admin/adminDashboard/index.php");
            break;
           }
           }else{
           $error='<div class="alert alert-danger  alert-dismissible fade show" role="alert">
                  <strong>Incorrect Email Or Password </strong> Please Provide Correct With Information.
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
           }
          }
          }
          ?>
<!doctype html>
<html lang="en">

<head>
<?php include "particles/pageheadsec.php"?>
    <style>
      body {
        font-family: "Recursive", sans-serif;
        font-size: larger;
      }

      .customborder {
        border-radius: 2%;
        border: 4px solid grey;
        background-color:"grey";
      }
    </style>
    <!-- STYLE CSS -->
    <link rel="stylesheet" href="public/style/loginform.css">
    
</head>

<body class="bg-img">
    <!-- Navemenu -->
    <div class="menu_header header" id="myHeader">
      <?php include  "particles/mainmenu.php"?>
    </div>
  

    <div class="container_login  my-5">
      <h1 class="text-center ">Login Here</h1>
      <div style="margin: 0 auto" class="col-12 col-md-6 col-lg-5 p-5 customborder">
                
        <!-- formstart -->
             <?php if(isset($error)){ echo $error; }?>
                <form action="<?php $_SERVER['PHP_SELF']?>" , method="POST">
                  <div class="mb-3">
                    <label for="username">Enter Your Email</label>
                    <input type="email" class="form-control form-control-lg" name="email" id="username"
                      autocomplete="off" placeholder="Email" />
                  </div>
                  <div class="mb-3">
                    <label for="password">Enter Your Password</label>
                    <input type="password" class="form-control form-control-lg" name="password" id="password"
                      autocomplete="off" placeholder="Password" />
                  </div>
                  <div class="d-grid gap-3 mb-3">
                    <input type="submit" class="btn btn-lg btn-block btn-outline-primary" name="login" value="login" />
                    <a class="btn btn-lg btn-success disabled" href="">Continue With Google</a>
                  </div>
                  <p>New Here ? <a class="card-link" href="signup.php"  >Register Now</a></p>
                  <!-- added a new button for redirecting to forgot password page  -->
                  <p class="text-center">
                    <a class="card-link text-center" href="forgot-password.php">Forgot Password</a>
                  </p>
                </form>

      </div>
    </div>


  <!-- Footer  -->
  <?php include "particles/mainfooter.php" ?>

</body>


</html>