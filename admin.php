<?php session_start();
if($_SESSION["admin"] != 1)
{
  header("Location: index.php");
}
?>

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
        <h1 class="text-light"><a href="admin.php"><span>Appoint.io</span></a></h1>
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="admin.php">Home</a></li>
          <li><a href="adminAppointment.php">View Appointments</a></li>
          <li><a href="adminNewAccount.php">View New Accounts</a></li>
          <li><a href="adminUsers.php">View Users</a></li> 

          <!-- LOGIN HTML, TOP RIGHT NG HOME PAGE -->
          <li class="drop-down"><a href="" class="login" id="login">Admin</a>
            <ul>
              <li><a href="logout.php">Log Out</a></li>
            </ul></li>>
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
          <h2 class="animate__animated animate__fadeInDown">WELCOME BANK ADMINISTRATOR</span></h2>
         
        </div>
      </div>
    </div>
  </section><!-- End Hero -->
  
  <main id="main">
    

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
            <li><i class="bx bx-chevron-right"></i> <a href="index.php">Home</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="adminAppointment.php">View Appointments</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="adminNewAccount.php">View New Accounts</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="adminUsers.php">View Users</a></li>
          </ul>
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
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
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
