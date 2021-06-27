<!DOCTYPE html>
<html lang="en">

<head>
<?php include "particles/pageheadsec.php"?>
  <!-- <link rel="stylesheet" href="../../public/style/style.css"> -->
 
</head>

<body>
     <!-- Navemenu -->
     <div class="menu_header header" id="myHeader">
      <?php include  "particles/mainmenu.php"?>
    </div>
  

    <div class="contact_body">
        <div class="container  ">
            <div class="row">
                <h1>Contact us</h1>
            </div>
            <div class="row">
                <h4 style="text-align:center">We'd love to hear from you!</h4>
            </div>
            <form action="/contact" method="post">
                        <div class="row input-container">
                <div class="col-xs-12">
                    <div class="styled-input wide">
                        <input type="text" required name="name" />
                        <label>Name</label>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="styled-input">
                        <input type="text" required  name="email"/>
                        <label>Email</label>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="styled-input" style="float:right;">
                        <input type="text" required  name="phone"/>
                        <label>Phone Number</label>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="styled-input wide txt_aera">
                        <textarea required name="textaera"></textarea>
                        <label>Message</label>
                    </div>
                </div>
                <div class="col-xs-12 .submit-btn">
                    <!-- {{!-- <div class="btn-lrg submit-btn " type="submit">Send Message</div> --}} -->
                    <button type="submit" class="btn-lrg submit-btn ">Send Message</button>
                </div>
            </div></form>
        </div>
    </div>
    <!-- Footer  -->
    <?php include "particles/mainfooter.php" ?>
</body>

</html>