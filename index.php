<!DOCTYPE html>
<html lang="en">

<head>
<?php include "particles/pageheadsec.php"?>
<link rel="stylesheet" href="public/style/upcomingsection.css">
</head>

<body>
    <!-- headerSection -->
      <!-- Navemenu -->
      <div class="menu_header header" id="myHeader">
            <?php include  "particles/mainmenu.php"?>
      </div>
    
    
      <!-- header slider section start  -->
    <div class="slider_section">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
<div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
  </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="public/assets/images/kshmirimg.jpg" class="d-block w-100" alt="isb" />
                    <div class="carousel-caption d-none d-md-block">
                        <h5 style="color: black; ">Expolre Pakistan </h5>
                        <h3 style="color: black; ">
                        The Magnificent Himalayas & Karakoram Ranges
                        </h3>
                        <div class="slider_btn">
                        <a href='upcomingevents.php'>
                        <button type="button" class="btn btn-outline-success "> Find Upcoming Tour</button>
                        </a> 
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="public/assets/images/Slider_img_9_Isaif.jpg" class="d-block w-100" alt="..." />
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Expolre Pakistan </h5>
                        <h3>The Fascinating Cultures and Colors of the Land</h3>
                        <div class="slider_btn">
                        <a href='upcomingevents.php'>
                        <button type="button" class="btn btn-outline-success "> Find Upcoming Tour</button>
                        </a> 
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="public/assets/images/Slider_img_8_hunza.jpg" class="d-block w-100" alt="..." />
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Expolre Pakistan </h5>
                         <h3>The Surreal and Enchanting Glory of Nature</h3>
                        <div class="slider_btn">
                        <a href='upcomingevents.php'>
                        <button type="button" class="btn btn-outline-success "> Find Upcoming Tour</button>
                        </a> 
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="public/assets/images/Slider_img_7_BM_lahore.jpg" class="d-block w-100" alt="..." />
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Expolre Pakistan </h5>
                         <h3>The Surreal and Enchanting Glory of Nature</h3>
                        <div class="slider_btn">
                        <a href='upcomingevents.php'>
                        <button type="button" class="btn btn-outline-success "> Find Upcoming Tour</button>
                        </a> 
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div class="ocean">
            <div class="wave"></div>
            <div class="wave"></div>
        </div>
    </div>
    <!-- {/* wavesec */} -->
<!-- {{!-- find a event section  --}} -->
<div>
<h4 class='text-center mt-5' style="font-size:2.2rem;font-weight:800;">Find an Event</h4>
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





    <!-- SectionAboutUs -->
    <section class="aboutus">
        <div class="about_us_outer_section my-5">
            <h1 class="text-center my-5 mx-1">About Us</h1>
            <div class="about_us_inner_section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-4 col-sm-12 aboutus_img">
                            <img src="public/assets/images/expolrepak2.jpg" alt="" />
                        </div>
                        <div class="col-lg-6 col-md-4 col-sm-12 aboutus_txt">
                            <h1>E-Pak Tourism</h1>
                            <h4>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Deserunt, tempore.
                            </h4>
                            <p>
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quod
                                numquam perferendis totam natus molestiae facilis aspernatur
                                suscipit, consequuntur illo culpa! Necessitatibus odit est
                                voluptatibus perferendis! At enim iure soluta, eaque inventore
                                dicta magni non similique illum molestias a? Explicabo,
                                deleniti?
                            </p>
                            <button type="button" class="btn btn-outline-success">
                                <a href="about.php">Readmore 🔖 </a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    
    <!-- services section  -->
    <section class="services my-4">
        <div class="services_outer_section">
            <h1 class="text-center my-5">Services</h1>
            <div class="services_inner_section">
                <div class="container service_section">
                    <div class="row service_row">
                        <div class="col-lg-4 col-md-2 col-sm-12 service_sec_col my-2 text-center">
                            <div class="service_container">
                                <img src="public/assets/images/upcomming.jpg" alt="Avatar" class="service_image" />
                                <div class="service_overlay">
                                    <div class="service_text">
                                        <h3>Find An Upcoming Event Adventre</h3>
                                        <p>
                                            Find family-friendly events, festivals, and things to done in Pakistan with the different Tourisum organization and Adventre club in single Platform. Customize Your Trip on Your Availibilty .
                                        </p>
                                        <div class="service_button">
                                            <div class="service_default">
                                                <a href="upcomingevents.php">Upcoming Event</a>
                                            </div>
                                            <div class="service_hover">
                                                <a href="upcomingevents.php">Upcoming Event</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-2 col-sm-12 service_sec_col my-2">
                            <div class="service_container">
                                <img src="public/assets/images/event_create.jpg" alt="Avatar" class="service_image" />
                                <div class="service_overlay">
                                    <div class="service_text">
                                        <h3>Create An Event</h3>
                                        <p>
                                            Create a tourist event online with E-Pak-Tourism.Hava an event in mind? Have you a any tourist organization? Why you are waiting for trafffic on event and using old payment method in this moderan area. Create your tourist events with us, Send out invites overe the social media and maintain your personal dashboard , and keep record of privious events , get payment from tourist online with modern payment method direct to your bank. Generate tickets to maintain records.
                                        </p>
                                        <div class="service_button">
                                            <div class="service_default">
                                                <a href="login.php">Create Event</a>
                                            </div>
                                            <div class="service_hover">
                                                <a href="login.php">Create Event</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-2 col-sm-12 service_sec_col my-2">
                            <div class="service_container">
                                <img src="public/assets/images/TouristGuider.jpg" alt="Avatar" class="service_image" />
                                <div class="service_overlay">
                                    <div class="service_text">
                                        <h3>Find Tourist Guider</h3>
                                        <p>
                                             You know thhe place ? Do you have spare time? Do you want to earn become a part of E-Pak _tourism as tourist guider. Provide tourist guider services and earn. Help to explore the beauty of Pakistan to the worls become the tue ambassdor of Pakistan.  
                                        </p>
                                        <div class="service_button">
                                            <div class="service_default">
                                                <a href="touristGuiderProfile.php">Find Tourist Guider</a>
                                            </div>
                                            <div class="service_hover">
                                                <a href="touristGuiderProfile.php">Find Tourist Guider</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-2 col-sm-12 service_sec_col my-2">
                            <div class="service_container">
                                <img src="public/assets/images/expolrepak.jpg" alt="Avatar" class="service_image" />
                                <div class="service_overlay">
                                    <div class="service_text">
                                        <h3>Expolre Pakistan</h3>
                                        <p>
                                             From the mighty stretches of the Karakorams in the North to the vast alluvial delta of the Indus River in the South, Pakistan remains a land of high adventure and nature. Trekking, mountaineering, white water rafting, wild boar hunting, mountain and desert jeep safaris, camel and yak safaris, trout fishing and bird watching, are a few activities, which entice the adventure and nature lovers to Pakistan.
                                        </p>
                                        <div class="service_button">
                                            <div class="service_default">
                                                <a href="expolrePakistan.php">Expolre Pakistan</a>
                                            </div>
                                            <div class="service_hover">
                                                <a href="expolrePakistan.php">Expolre Pakistan</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-2 col-sm-12 service_sec_col my-2">
                            <div class="service_container">
                                <img src="public/assets/images/tourism Influencer.jpg" alt="Avatar" class="service_image" />
                                <div class="service_overlay">
                                    <div class="service_text">
                                        <h3>Tourist Infulencer</h3>
                                        <p>
                                              Have you love to travel? become a internation infulencer? Get a chance to become ambassdor of any tourist organization that customize your travalling plan in the pakistan. Explore the Heaven on the Earth  to the World with your  followers.share your stories with us we will love to share your post on our platform.
                                        </p>
                                        <div class="service_button">
                                            <div class="service_default">
                                                <a href="infulencerStories.php">Influencer</a>
                                            </div>
                                            <div class="service_hover">
                                                <a href="infulencerStories.php">Influencer</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-2 col-sm-12 service_sec_col my-2">
                            <div class="service_container">
                                <img src="public/assets/images/roomrent.jpg" alt="Avatar" class="service_image" />
                                <div class="service_overlay">
                                    <div class="service_text">
                                        <h3>Rent A Room</h3>
                                        <p>
                                            Renting out a room in your house can be a good way to generate income and help cover the mortgage..
                                        </p>
                                        <div class="service_button">
                                            <div class="service_default">
                                                <a href="rentaroom.php">Rent Room</a>
                                            </div>
                                            <div class="service_hover">
                                                <a href="rentaroom.php">Rent Room</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <!-- // REcent Upcoming~Event section -->
    <section class="upcomingsection">
    <div class="upcomingevents">
        <div class="upcoming_heading">
            <h1 class="mb-2">Find Upcoming Events</h1>
            <div class="service_button">
                <div class="service_default mt-3">
                <a href="upcomingevents.php">Upcoming Event</a>
                </div>
                <div class="service_hover">
                <a href="upcomingevents.php">Upcoming Event</a>
                </div>
                </div>
        </div>
    </div>
    </section>

    <!-- expolre`pakistan section -->
    <section class="expolre_pakistan">
        <div class="expolre_pakistan_outer_section">
            <div class="expolre_pakistan_section_body">
                <h1 class="text-center my-5" style="color: white;">Expolre The Heaven on Earth</h1>
                <div class="expolre_container">
        
                    <div class="panel" id="panel-one">
                        <h2> <span class='Expolre_header'>The Hunza Valley </span> <br />
                            The much renowned Hunza valley is often referred to as heaven on earth, enveloped in the grand
                            Himalayas and the Karakoram mountain ranges, this place has been a great tourist attraction for many
                            years.
                            For me it all happened when I was 22 years old and left the home without telling anyone and reached
                            Gilgit. I did not know where to go from Gilgit; stranded, I heard a bus boy calling the passengers
                            for Hunza. I had heard of Hunza, so I hopped the bus and I could only paint pictures in my mind of
                            what was coming next.</h2>
                    </div>
                    <div class="panel" id="panel-two">
                        <h2> <span class='Expolre_header'>The Kumrat Valley </span> <br />
                            Kumrat Valley is located in the Upper Dir district of KPK. The nearest town to the valley is Thall.
                            Thall is around 45 km from Kumrat Valley and is used as the launching point for trips to Kumrat
                            Valley. Thall is perhaps one of the most conservative places in Pakistan, so make sure to behave
                            appropriately when you visit.
                            The Panjkora river, which originates in the Hindu Kush mountains, runs through Kumrat Valley, and
                            the valley is incredibly lush and green.
                            Kumrat Valley is mostly known for its beautiful deodar forest. The large deodars give Kumrat a
                            fairytale-like ambiance. Unfortunately, many of the large deodar trees in Kumrat Valley and the
                            surrounding areas are quickly disappearing, as their wood is used for warmth and cooking by locals.
                        </h2>
                    </div>
                    <div class="panel active" id="panel-three">
                        <h2> <span class='Expolre_header'>Pakistani Beaches </span> <br />
                            “Pakistan offers some breathtaking beaches with unparalleled serenity. These are 12 exotic beaches
                            where one can gaze at mesmerising waves of Arabian Sea. #BeautifulPakistan”
                            Pakistan's southern coastline meets the Arabian Sea, running along the provinces of Sindh and
                            Balochistan. There are various beaches on the coastline but the PID has selected 12 of them.
                        </h2>
                    </div>
                    <div class="panel" id="panel-four">
                        <h2> <span class='Expolre_header'>Paradise on earth The Kashmir </span> <br />
                            Nature has endowed Kashmir with implausible beauty and is rightly called as "Paradise on Earth". ...
                            Incredibly beautiful valleys like Kishtwar, Markha, Suru, Shyok, Nubra, Nageen, Betaab, Dha Hanu,
                            Poonch and many others add a different definition to beauty. The valleys of Kashmir are untamed and
                            unspoilt.</h2>
                    </div>
                    <div class="panel" id="panel-five">
                        <h2> <span class='Expolre_header'>Hunza: The mountain kingdom</span> <br />
                            Hunza is one of the most beautiful valleys in Pakistan, and is a major attraction for the tourists
                            from all over the world. ... Central Hunza is where remarkable history and heritage sites like
                            Baltit Fort and Altit Fort are situated. Central Hunza is the most popular tourist destination
                            because of its stunning scenery.</h2>
                    </div>
                </div>
                <div class="event_find_more_button mt-3 ">
                    <div class="event_find_more_default ">
                        <a href="">Expolre More</a>
                    </div>
                    <div class="event_find_more_hover ">
                        <a href="">Expolre More</a>
                    </div>
                </div>
            </div>
        </div>
       
    </section>
    <section class="upcomingsection " style="margin-top: -25px;">
    <div class="upcomingevents">
        <div class="upcoming_heading">
            <h1 class="">Find Tourist Guider Events</h1>
            <div class="service_button">
                <div class="service_default mt-3">
                <a href="upcomingevents.php">Tourist Guider</a>
                </div>
                <div class="service_hover">
                <a href="upcomingevents.php">Tourist Guider</a>
                </div>
                </div>
        </div>
    </div>
    </section>
    <!-- Suscribe NewsLetter section  -->
    <section class="newsletter_section my-5">
        <div class="newsletter_outer_section">
            <h1 class="text-center">Subscribe Newsletter</h1>
            <div class="suscribe_para" style="width: 50%; margin: auto;">
                <h6 class="text-center" style="margin:auto">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Autem rem voluptatum molestiae tempore doloribus, provident expedita quo nobis eos. Nam, quas dicta.
                </h6>
            </div>
            <div class="newsletter_box ">
                <div class="newsletter_header"><i class="fa fa-paper-plane" aria-hidden="true"></i>
                    <p class="newsletter_hidden">Thanks!</p>
                </div>
                <div class="newsletter_form">
                    <form action="" method="post">
                        <input type="text" placeholder="Your Email" class="newsletter_field" style="margin-top: 110px;" name="email">
                    <input type="submit" value="Subscribe" class="newsletter_button" style="margin-top: 50px;">
                    </form>
                </div>
            </div>
        </div>
        <script>
            var button = document.querySelector('.newsletter_button');
            var field = document.querySelector('.newsletter_field');
            var icon = document.querySelector('.newsletter_header i');
            var text = document.querySelector('.newsletter_header p');

            button.addEventListener('click', function () {

                if (field.value === '') {
                    field.placeholder = 'You must enter your email';
                    // alert('You must enter an email');
                } else {
                    icon.classList.toggle('animation');
                    text.classList.toggle('show');
                }
            });
        </script>
    </section>

    <!-- footer section  -->
    <?php include "particles/mainfooter.php" ?>

        <!-- Gallery Section Script  -->
        <script>
            const panels = document.querySelectorAll('.panel');

            panels.forEach((panel) => {
                panel.addEventListener('click', () => {
                    removeActiveClasses();
                    panel.classList.add('active');
                })
            })

            function removeActiveClasses() {
                panels.forEach(panel => {
                    panel.classList.remove('active');
                })
            }
        </script>


                <script>
                    $(".default, .hover").click(function () {
                        $(this).parent(".button").toggleClass("active");
                    });
                </script>
                
</body>

</html>