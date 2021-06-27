<!DOCTYPE html>
<html lang="en">
<head>
    <title>E-Pak Tourism</title>
    <?php include "particles/pageheadsec.php"?>
    <link rel="stylesheet" href="public/style/findevent.css">
    <style>
      .center  {
    width: 100% !important;
    height: 100% !important;
display: flex !important;
justify-content: center !important;
align-items: center !important;
flex-direction: column !important;
}
    </style>
</head>
<body>
    
    <!-- Navemenu -->
    <div class="menu_header header" id="myHeader">
      <?php include  "particles/mainmenu.php"?>
    </div>
  
<div class="find_event_outersec section">
  <div class="center">
<h4 class='text-center ' style="font-size:2.2rem;font-weight:800;">Find an Event</h4>
  <div id="booking-inline" class="Find_an_Event_inlinesection">
    <div class="Find_an_Event_inlinesection-center">
      <div class="container">
        <div class="row">
          <div class="booking-form-inline">

          <!-- Find Event Form  -->
            <form method="GET" action="eventsearch.php">
              <div class="row no-margin">
                <div class="col-md-3">
                  <div class="form-group">
                    <span class="form-label">Tour Destination</span>
                    <input class="form-control" type="text" placeholder="Country, city..."  name="destinationto"/>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="row no-margin">
                    <div class="col-md-5">
                      <div class="form-group">
                        <span class="form-label">From</span>
                        <input class="form-control" type="date" required name="dateform" />
                      </div>
                    </div>
                    <div class="col-md-5">
                      <div class="form-group">
                        <span class="form-label">To</span>
                        <input class="form-control" type="date" required name="dateto" />
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-btn">
                    <input type="submit"class="submit-btn">Check availability</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</div>
  <!-- Footer  -->
  <?php include "particles/mainfooter.php" ?>

</body>
</html>