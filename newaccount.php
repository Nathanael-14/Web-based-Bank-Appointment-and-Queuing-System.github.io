<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Set Appointment</title>
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
  <link href="assets/css/calendar.css" rel="stylesheet">

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
          <li><a href="index.php">Home</a></li>
          <!-- LOGIN HTML, TOP RIGHT NG HOME PAGE -->
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

  <main id="main">

    <!-- ======= Contact Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Set Appointment</h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Set Appointment</li>
          </ol>
        </div>

      </div>
    </section><!-- End Contact Section -->

    <!-- ======= Calendar Section ======= -->
    <section class="contact" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
      <div class="app-container" ng-app="dateTimeApp" ng-controller="dateTimeCtrl as ctrl" ng-cloak>


        <div date-picker
           datepicker-title="Please select a date to check available slots"
           picktime="true"
           pickdate="true"
           pickpast="false"
           mondayfirst="false"
           custom-message="You have selected"
           selecteddate="ctrl.selected_date"
           updatefn="ctrl.updateDate(newdate)">

          <div class="datepicker"
             ng-class="{
              'am': timeframe == 'am',
              'pm': timeframe == 'pm',
              'compact': compact
            }">
            <div class="datepicker-header">
              <div class="datepicker-title" ng-if="datepicker_title">{{ datepickerTitle }}</div>
              <div class="datepicker-subheader" id="dateSubheader"></div>
            </div>
            <div class="datepicker-calendar" id="datepicker"><!---->
              <div class="calendar-header">
                <div class="goback" ng-click="moveBack()" ng-if="pickdate">
                  <svg width="30" height="30">
                    <path fill="none" stroke="#0DAD83" stroke-width="3" d="M19,6 l-9,9 l9,9"/>
                  </svg>
                </div>
                <div class="current-month-container">{{ currentViewDate.getFullYear() }} {{ currentMonthName() }}</div>
                <div class="goforward" ng-click="moveForward()" ng-if="pickdate">
                  <svg width="30" height="30">
                    <path fill="none" stroke="#0DAD83" stroke-width="3" d="M11,6 l9,9 l-9,9" />
                  </svg>
                </div>
              </div>
              <div class="calendar-day-header">
                <span ng-repeat="day in days" class="day-label">{{ day.short }}</span>
              </div>
              <div class="calendar-grid" ng-class="{false: 'no-hover'}[pickdate]">
                <div
                  ng-class="{'no-hover': !day.showday}"
                  ng-repeat="day in month"
                  class="datecontainer"
                  ng-style="{'margin-left': calcOffset(day, $index)}"
                  track by $index>
                  <div class="datenumber" ng-class="{'day-selected': day.selected }" ng-click="selectDate(day)">
                    {{ day.daydate }}
                  </div>
                </div>
              </div>
              </select>
              <div id="display_div">
                <form method="POST" action="">
                  <button type="submit" id="btncheck" class="set-button" name="btncheck" value="">Check Date</button>
                </form>
              </div>
            </div>
            <div class="timeline">
            </div>
              <div class="appointmentForm" id="appointmentForm">
                <form method="POST" action="appointmentdata.php">
                  <input type="hidden" id="reserveDay" name="reserveDay" value="">
                  <input type="hidden" id="reserveYear" name="reserveYear" value="">
                  <input type="hidden" id="reserveMonth" name="reserveMonth" value="">
                  <input type="hidden" name="appointmentfor" value="New Account">
                <div id="test" class="timepicker-container-outer">
                    <div class="form-group">
                      <input type="text" name="fName" placeholder="Full Name">
                      <input type="text" name="mName" placeholder="Middle Name">
                      <input type="text" name="lName" placeholder="Last Name">
                      <input type="text" name="email" placeholder="Email Address">
                    </div>
                    <label class="control-label" for="timeSlot">Time Slots Available:</label><br>
                    <div class="radio-toolbar" id="radioslots">
                      <input type="radio" id="radio910" name="timeslot" value="9" >
                      <label for="radio910">9AM-10AM</label>

                      <input type="radio" id="radio1011" name="timeslot" value="10">
                      <label for="radio1011">10AM-11AM</label>

                      <input type="radio" id="radio1112" name="timeslot" value="11">
                      <label for="radio1112">11AM-12PM</label>

                      <input type="radio" id="radio12" name="timeslot" value="1">
                      <label for="radio12">1PM-2PM</label>
                      <input type="radio" id="radio23" name="timeslot" value="2">
                      <label for="radio23">2PM-3PM</label>

                      <input type="radio" id="radio34" name="timeslot" value="3">
                      <label for="radio34">3PM-4PM</label>
                  </div>
                      <button id="submit" class="set-button" type="submit">Book Appointment</button>
                </div>
                </form>
              </div>
          </div>
        </div>
      </div>
      <?php
        /*echo "<script>document.getElementById('appointmentfor').disabled = true;</script>;";
        echo "<script>document.getElementById('addNotes').disabled = true;</script>;";
        echo "<script>document.getElementById('radioslots').disabled = true;</script>;";*/
        /*echo "<script>
                $(document).ready(function()
                {
                  $('#toggle').click(function(){
                  $('#newstuff').toggle();});
                });
              </script>";*/
        include "forms/timeslotchecker.php";
      ?>
    </section><!-- End Calendar Section -->
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">

    <!-- Removed default Newsletter Section -->


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
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.2/angular.min.js'></script>
  <script  src="./assets/js/calendar.js"></script>
  <script type="text/javascript" src="assets/js/appointment.js"></script>

</body>

</html>
