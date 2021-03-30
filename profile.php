<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Profile</title>
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

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class=""><a href="index.php">Home</a></li>
          <li><a href="appointment.php">Set Appointment</a></li> 
          <!-- LOGIN HTML, TOP RIGHT NG HOME PAGE -->
          <?php
            echo "<li class='drop-down log'><a href='' class='login' id='login'>".$_SESSION["username"]."</a>
                    <ul>
                      <li><a href='profile.php'>Profile</a></li>
                      <li><a href='logout.php'>Log Out</a></li>
                    </ul>
                  </li>";
          ?>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Our Team Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>My Profile</h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>My Profile</li>
          </ol>
        </div>

      </div>
    </section><!-- End Our Team Section -->

    <?php
      include 'forms/loadInfo.php';
    ?>

    <!-- ======= Team Section ======= -->
    <section class="team" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
      <div class="container">
        <div class="row">
          <div class="col-lg-3">
            <div class="member">
              <div class="member-info"><br>
                <div class="fullName">
                  <?php
                    echo "<h4>".$account['first_name']." </h4>";
                    echo "<h4>".substr($account['middle_name'],0,1).". </h4>";
                    echo "<h4>".$account['last_name']."</h4>";
                  ?> 
                  <br><br>
                </div>

                <div class="radioOptions">
                  <!--<input type="radio" id="radio910" name="timeslot" onclick="myAccountChange()" checked="true">
                  <label for="radio910">My Account</label>-->

                  <input type="radio" id="profileSettings" name="option" onclick="mySettingChange()" checked="true">
                  <label for="profileSettings">Profile Settings</label>

                  <input type="radio" id="appointmentRecord" name="option" onclick="myAppointmentChange()">
                  <label for="appointmentRecord">Appointment Records</label>
                </div>
            </div>
          </div>
        </div>
        <div class="col-lg-9" id="formContainers">
          <!--<div id="myAccountContainer" class="myAccountContainer">
            <div class="myAccount">
              <h2>My Account</h2><hr><br>

              <h4>Name:</h4> <div class="myAccountPosition"><h5>First Name</h5> <h5>M.I.</h5> <h5>Last Name</h5><br><br></div>
              <h4>Username:</h4> <div class="myAccountPosition"><h5>My Username</h5> <br><br></div>
              <h4>Email Address:</h4> <div class="myAccountPosition"><h5>My Email Address</h5> <br><br></div>
              <h4>Account Number:</h4> <div class="myAccountPosition"><h5>My Account Number</h5> <br><br></div>
            </div>
          </div>-->
          <div id="myAppointmentsContainer" class="myAppointmentsContainer">
            <div class="myAppointments">
              <h2>Appointments</h2><br>
              <h5>Upcoming</h5> <hr>
              <div class="tableContainer">
                <table class="table table-hover table-sm">
                  <thead class="thead-light">
                    <tr>
                      <th>Appointment</th>
                      <th>Date (MM/DD/YYYY)</th>
                      <th>Time</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      include "forms/upcomingAppointment.php";
                    ?>
                  </tbody>
                </table>
              </div>
              <br> <br><br><br>
              <h5>History</h5><hr>
              <div class="tableContainer">
                <table class="table table-hover table-sm">
                  <thead class="thead-light">
                    <tr>
                      <th>Appointment</th>
                      <th>Date (MM/DD/YYYY)</th>
                      <th>Time</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      include "forms/pastAppointment.php";
                    ?>
                  </tbody>
                </table>
              </div>
              <br> <br><br>
            </div>
          </div class="col-lg-6">
          <div id="profileSettingsContainer" class="profileSettingsContainer">
            <div class="profileSettings">
              <h2>Profile Settings</h2><hr><br>
              <h4>Personal Info</h4>
              <p>Your information displayed in appointments</p>
              <form> 
                <div class="personalInformation">
                  <label for="firstName">First Name:</label>
                  <input id="firstName" type="text" name="firstName" class="noForm" value=<?php echo $account['first_name'];?> readonly></input> 

                  <label for="middleName">Middle Name:</label>
                  <input id="middleName" type="text" name="middleName" class="noForm" value=<?php echo $account['middle_name'];?> readonly></input>
                 
                  <label for="lastName">Last Name:</label>
                  <input id="lastName" type="text" name="lastName" class="noForm" value=<?php echo $account['last_name'];?> readonly></input>

                  <label for="emailAddress">Email Address:</label>
                  <div class="emailForm">
                    <input id="emailAddress" type="text" name="emailAddress" value=<?php echo $account['email'];?> readonly></input>
                    <a id="profileEdit" onclick="profileEdit()">Edit</a>
                  </div>
                </div>
              </form><hr>
              <h4>Account Details</h4>
              <p>Your login credentials in Appoint.io</p>
              <form>
                <div class="userInformation">
                  <label for="username">Account Number:</label>
                  <input id="accountNumber" type="text" name="accountNumber" class="noForm" value=<?php echo $account['account_number'];?> readonly></input>

                  <label for="username">Username:</label>
                  <input id="username" type="text" name="username" class="noForm" value=<?php echo $account['username'];?> readonly></input>

                  <label for="password">Password:</label>
                  <div class="passwordForm">
                    <input id="password" type="password" name="password" value=<?php echo $account['password'];?> readonly></input>
                    <a id="accountEdit" onclick="accountEdit()">Edit</a>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Team Section -->
  </main><!-- End #main -->
  <br><br><br><br><br><br>
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
              <li><i class="bx bx-chevron-right"></i> <a href="index.php#about">About</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="index.php#services">Set Appointment</a></li>
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
