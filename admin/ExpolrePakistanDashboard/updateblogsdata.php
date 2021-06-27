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
                 move_uploaded_file ($file_tmp,'ExpolrePakistanDashboard/upload/'.$file_name); 
                }
                else{
                    print_r($errors);
                    die();
                     }
                         $conn = mysqli_connect("localhost","root","","epaktourism") or die("Connection Failed:" .mysqli_connect_error());
                        $displayname = mysqli_real_escape_string($conn,$_POST['displayname']);
                        $displayemail = mysqli_real_escape_string($conn,$_POST['displayemail']);
                        $displayphone = mysqli_real_escape_string($conn,$_POST['displayphone']);
                        $destination = mysqli_real_escape_string($conn,$_POST['destination']);
                        $province = mysqli_real_escape_string($conn,$_POST['province']);
                        $posteddate = mysqli_real_escape_string($conn,$_POST['posteddate']);
                        $nearestlocation = mysqli_real_escape_string($conn,$_POST['nearestlocation']);
                        $aeratag1 = mysqli_real_escape_string($conn,$_POST['aeratag1']);
                         $aeratag2 = mysqli_real_escape_string($conn,$_POST['aeratag2']);
                         $aeratag3 = mysqli_real_escape_string($conn,$_POST['aeratag3']);
                        $aeratag4 = mysqli_real_escape_string($conn,$_POST['aeratag4']);
                        $tripdescription = mysqli_real_escape_string($conn,$_POST['tripdescription']);
                        $fb = mysqli_real_escape_string($conn,$_POST['fb']);
                        $instagram = mysqli_real_escape_string($conn,$_POST['instagram']);
                         $youtube = mysqli_real_escape_string($conn,$_POST['youtube']);
                         $blogs = mysqli_real_escape_string($conn,$_POST['blogs']);
                         $userid=$_GET['id'];                        
                         $sqlCardProfileUpdate ="UPDATE expolrepakistan SET displayname ='{$displayname}', displayemail ='{$displayemail}',displayphone ='{$displayphone}', destination ='{$destination}' ,province ='{$province}',posteddate ='{$posteddate}', nearestlocation ='{$nearestlocation}', aeratag1 ='{$aeratag1}' ,aeratag2 ='{$aeratag2}',aeratag3 ='{$aeratag3}',  aeratag4 ='{$aeratag4}', image ='{$file_name}', tripdescription ='{$tripdescription}', fb ='{$fb}', instagram ='{$instagram}' , youtube ='{$youtube}', blogs ='{$blogs}'WHERE post_id ={$userid}";

                         if (mysqli_query($conn,$sqlCardProfileUpdate)){
                            header("Location: http://localhost/epaktourisum/admin/ExpolrePakistanDashboard/viewBlogpost.php");
                         }
                                  }
                                    

                                  ?>
  


