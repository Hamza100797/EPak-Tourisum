<?php 
 
 if (isset($_POST['submit'])) {


  $conn = mysqli_connect("localhost","root","","epaktourism") or die("Connection Failed:" .mysqli_connect_error());

   $name = mysqli_real_escape_string($conn,$_POST['name']);
   $email = mysqli_real_escape_string($conn,$_POST['email']);
   $phone = mysqli_real_escape_string($conn,$_POST['phone']);
   $pickuppoint = mysqli_real_escape_string($conn,$_POST['pickuppoint']);
   $noadult = mysqli_real_escape_string($conn,$_POST['noadult']);
   $childrens = mysqli_real_escape_string($conn,$_POST['childrens']);
   $paymentmethod = mysqli_real_escape_string($conn,$_POST['paymentmethod']);
   $paymentmobile = mysqli_real_escape_string($conn,$_POST['paymentmobile']);

   $destinationform = mysqli_real_escape_string($conn,$_POST['destinationform']);
   $destinationto = mysqli_real_escape_string($conn,$_POST['destinationto']);
   $dateform = mysqli_real_escape_string($conn,$_POST['dateform']);
   $dateto = mysqli_real_escape_string($conn,$_POST['dateto']);

   $eventdays = mysqli_real_escape_string($conn,$_POST['eventdays']);
   $eventorg = mysqli_real_escape_string($conn,$_POST['eventorg']);
   $eventname = mysqli_real_escape_string($conn,$_POST['eventname']);
   $services = mysqli_real_escape_string($conn,$_POST['services']);
   $places = mysqli_real_escape_string($conn,$_POST['places']);
 $event_id = mysqli_real_escape_string($conn,$_POST['event_id']); 

    // checking Already Existed Users 

    $SQLValidates = "SELECT * FROM tourreservation  WHERE event_id={$event_id} AND name ='{$name}' AND email = '{$email}' AND destinationform = '{$destinationform}' AND destinationto = '{$destinationto}'";
    // /  QueryResult  
    

    $resultValidates = mysqli_query($conn,$SQLValidates) or die ("Query Failed");
    
    if($name=="" OR $email =="" OR $phone  =="" OR $pickuppoint  =="" OR $noadult =="" OR $childrens =="" OR  $paymentmethod ==""OR $paymentmobile =="" OR $destinationform  =="" OR $destinationto  =="" OR $dateform ==""OR $dateto =="" OR $eventdays  =="" OR $eventorg  =="" OR $eventname ==""OR $services =="" OR $places  =="" ) {
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
      $sqlData="INSERT INTO tourreservation (event_id,name,email,phone,pickuppoint,noadult,childrens,paymentmethod,paymentmobile,destinationform,destinationto,dateform,dateto,eventdays,eventorg,eventname,services,places) VAlUES({$event_id},'{$name}','{$email}','{$phone}','{$pickuppoint}',{$noadult},{$childrens},'{$paymentmethod}','{$paymentmobile}','{$destinationform}','{$destinationto}','{$dateform}','{$dateto}',{$eventdays},'{$eventorg}','{$eventname}','{$services}','{$places}')";
      if (mysqli_query($conn,$sqlData)){
         echo '<div class="alert alert-success" role="alert">
         <strong>Records are Added Login To Account!! Click to Dashboard View Card</strong> 
       </div>';
       header("Location: http://localhost/epaktourisum/upcomingevents.php");
     }

}
  
}

?>