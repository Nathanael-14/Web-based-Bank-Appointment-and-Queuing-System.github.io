<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Appoint.io</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/A.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top header-transparent">
    <div class="container">

      <div class="logo float-left">
        <h1 class="text-light"><a href="index.php"><span>Appoint.io</span></a></h1>
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="#hero">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#services">Services</a></li>
          <?php

            if(isset($_SESSION["login"]))
            {
              echo "<li class='drop-down log'><a href='' class='login' id='login'>".$_SESSION["username"]."</a>
                      <ul>
                        <li><a href='profile.php'>Profile</a></li>
                        <li><a href='logout.php'>Log Out</a></li>
                      </ul>
                    </li>";
            }
            else
            {
              echo "<li class='log'><a href='login.php' class='login' id='login'>Log In</a></li>";
            }
          ?>
        </ul>
      </nav><!-- .nav-menu -->
      
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex justify-cntent-center align-items-center">
    <div id="heroCarousel" class="container carousel carousel-fade" data-ride="carousel">

      <!-- Slide 1 -->
      <div class="carousel-item active">
        <div class="carousel-container">
          <h2 class="animate__animated animate__fadeInDown">Smart Online Appointment & Queuing System</span></h2>
          <p class="animate__animated animate__fadeInUp">Web-based queue and appointment scheduling system which reduces customer wait times while guaranteeing a healthy customer satisfaction and efficent workflow.</p>
          <a href="login.html" class="btn-get-started animate__animated animate__fadeInUp">Try it Now</a>
        </div>
      </div>

      <!-- Slide 2 -->
      <div class="carousel-item">
        <div class="carousel-container">
          <h2 class="animate__animated animate__fadeInDown">Banking Made Better</h2>
          <p class="animate__animated animate__fadeInUp">Appoint.io's queue management & appointment scheduling system allows easy planned appointment schedules by allowing customers to be queued from anywhere and any time using any web browser or mobile device. </p>
          <a href="#about" class="btn-get-started animate__animated animate__fadeInUp">Read More</a>
        </div>
      </div>

      <!-- Slide 3 -->
      <div class="carousel-item">
        <div class="carousel-container">
          <h2 class="animate__animated animate__fadeInDown">Customer Optimized Services</h2>
          <p class="animate__animated animate__fadeInUp">Appoint.io offers services which are optimized to meet the client's needs and grants satisfactory results which in turn is a positive feedback towards bank employess and also grants efficient productivity to customer queue management and scheduling. </p>
          <a href="#services" class="btn-get-started animate__animated animate__fadeInUp">Read More</a>
        </div>
      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon bx bx-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon bx bx-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>

    </div>
  </section><!-- End Hero -->
  
  <main id="main">
    
     <section class="about" data-aos="fade-up" id="about">
      <div class="container">

        <div class="section-title">
          <h2>About Us</h2>
        </div>


       <div class="row">
          <div class="col-lg-20 pt-4 pt-lg-0">
            <h3>What is Appoint.io?</h3><br>
            <p>Appoint.io is a web-based system that provides appointment scheduling, queue management and account creation services with in a single solution. 
              It is an ideal software for banks that do not have online appointment systems and also modernizes how  bank customers will be queued.
              This will result in higher customer satisfaction is and staff efficiency. </p>
            <p>The system also provides other features that complement this web-based software such as the account creation in which customers can view and manage their transaction records,
              slot reservation for each appointment of our provided services and appoint and account management for administrators .</p>
              <p>Appoint.io transforms customer experience and satisfaction in this fast paced system with real time queueing and appointment scheduling. </p>

            <br>

            <h3>Benefits of using Appoint.io</h3><br>   
            <ul>
              <li><i class="icofont-check-circled"></i> Reduces long queues through a scheduling process and improves staff efficiency.</li>
              <li><i class="icofont-check-circled"></i> Provides a better experience for customers through self-service online scheduling.</li>
              <li><i class="icofont-check-circled"></i> Ensures consistency in queue and appointment, in the requests conveyed to customers prior their arrival to an appointment, and in the way bank staff are prepared for their appointments.</li>
              <li><i class="icofont-check-circled"></i> Increased personnel time due to better time management</li>
            </ul>
            <p> Our goal  make the most of every customer appointment: <b>greater satisfaction and better experience.</b></p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

     <!-- ======= Services Section ======= -->
     <section class="services" id="services">
      <div class="container">

        <div class="section-title">
          <h2>Services</h2>
        </div>

        <div class="row">

          <div class="col-lg-6 col-md-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="icon-box icon-box-cyan">
              <div class="icon"></div>
              <h4 class="title"><a href="<?php if(isset($_SESSION["login"])){echo "appointment.php";}else{echo "login.php";} ?>">Withdraw/Deposit</a></h4>
              <p class="description">Set an appointment to withdraw/deposit money on existing bank account</p>
              <br><a href="<?php if(isset($_SESSION["login"])){echo "appointment.php";}else{echo "login.php";} ?>" class="get-started-btn">Start Appointment</a>
            </div>
          </div>

          <div class="col-lg-6 col-md-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box icon-box-green">
              <div class="icon"></div>
              <h4 class="title"><a href="newaccount.php">New Accounts</a></h4>
              <p class="description">Customers can set appointments  to create new bank accounts</p>
              <br><a href="newaccount.php" class="get-started-btn">Start Appointment</a>
            </div>
          </div>

          <!-- Tinanggal ko isang section, gawing ko tatlo tas gi center ko -->
           <!-- Need ng 1-2 pages for appointment schedulind pati queuing -->
        </div>

      </div>
    </section><!-- End Services Section -->


  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">

    <!-- Removed default Newsletter Section -->

    <!-- Ganito nalang kada footer -->
    <div class="footer-top">
      <div class="container">
        <div class="row">

         <div class="col-lg-3 col-md-6 footer-links">
          <h4>Navigation</h4>
          <ul>
            <li><i class="bx bx-chevron-right"></i> <a href="#hero">Home</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#about">About</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#services">Set Appointment</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-6 footer-links">
          <h4>Our Services</h4>
          <ul>
            <li><i class="bx bx-chevron-right"></i> <a href="<?php if(isset($_SESSION["login"])){echo "appointment.php";}else{echo "login.php";} ?>">Withdraw/Deposit</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="newaccount.php">New Accounts</a></li>
              <!-- Tinaggal ko ang defualt tas replaced with sa mga services natin -->
          </ul>
        </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              <a href="#" class="facebook"> Francis Jacob Aquino </a> <br> 
             <a href="#" class="facebook"> Justin Oryan Go</a><br> 
              <a href="#" class="facebook"> Nathanael Villaflor <br><br></a>
            </p>

          </div>

          <div class="col-lg-3 col-md-6 footer-info">
            <h3>About Appoint.io</h3>
            <p>Appoint.io is a web-based system that provides appointment scheduling, queue management and account creation services with in a single solution.</p>
           <br> <p>Appoint.io is an ideal solution for banks that do not have online appointment systems. </p>
        </div>
          </div>
          <!-- Removed soc med icons -->
        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Moderna</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/free-bootstrap-template-corporate-moderna/ -->
        Designed by <a href="javascript:void(0)">Aquino, Go, Villaflor</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
