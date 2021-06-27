<?php
 $conn = mysqli_connect("localhost","root","","epaktourism") or die("Connection Failed:" .mysqli_connect_error());
session_start();
session_destroy();
header('location:http://localhost/epaktourisum');
?>
