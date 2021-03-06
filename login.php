<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Log In</title>
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

  <!-- =======================================================
  * Template Name: Moderna - v2.2.1
  * Template URL: https://bootstrapmade.com/free-bootstrap-template-corporate-moderna/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container">

      <div class="logo float-left">
        <h1 class="text-light"><a href="index.php"><span>Appoint.io</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav class="nav-menu float-right d-none d-lg-block">
        <ul>
          <li ><a href="index.php">Home</a></li>
          <!-- LOGIN HTML, TOP RIGHT NG HOME PAGE -->
        </ul>
      </nav><!-- .nav-menu -->

      
    </div>
  </header><!-- End Header -->

  <main id="main">

    <?php
      $accountholder = "Account Number";
      $firstholder = "First Name";
      $middleholder = "Middle Name";
      $lastholder = "Last Name";
      $btnholder = "verify";
      $text = "text";
      $foreignkey = "";

      include "forms/verify.php";
      include "forms/signin.php";
    ?>
      

    <!-- ======= Login Section ======= -->
    <section class="d-flex justify-cntent-center align-items-center">
        <div class="login-page">
        <div class="form" id="form1">
          <form id="register" class="register-form" method="POST">

            <?php            
              echo "<input type='hidden' name='foreignkey' value='".$foreignkey."'>";
              echo "<input type='text' name='accountnumber' placeholder='".$accountholder."'/>";
              echo "<input type='".$text."' name='firstname' placeholder='".$firstholder."'/>";
              echo "<input type='".$text."' name='middlename' placeholder='".$middleholder."'/>";
              echo "<input type='text' name='lastname' placeholder='".$lastholder."'/>";
              echo "<button type='submit' name='verify' value='".$btnholder."'>".$btnholder."</button>";
            ?>
              <p class="message" style="color:black">Already registered?<a href="#">Sign In</a></p>

          </form>
          <form id="login" class="login-form" method="POST">
            <input type="text" name="username" placeholder="Username"/>
            <input type="password" name="password" placeholder="Password"/>
            <button type="submit" name="login" value="login">login</button>
            <p class="message" style="color:black">Not registered? <a href="#">Create an account</a></p>
          </form>
        </div>
      </div> 
    </section><!-- End Login Section -->


  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">

    <!-- Removed default Newsletter Section -->
    <div class="footer-top">
      <div class="container">
        <div class="row">

        <div class="col-lg-3 col-md-6 footer-links">
            <h4>Navigation</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="index.php">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="index.php#about">About</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="index.php#services">Set Appointment</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="login.php">Withdraw</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="login.php">Deposit</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="blog.html">New Accounts</a></li>
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
          <!-- Removed soc med icons -->
        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Moderna</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
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

  <?php include "formload.php" ?>
</body>

</html>
