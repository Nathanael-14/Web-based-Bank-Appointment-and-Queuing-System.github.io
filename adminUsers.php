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

  <title>View Users</title>
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
        <h1 class="text-light"><a href="admin.php"><span>Appoint.io</span></a></h1>
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li><a href="admin.php">Home</a></li>
          <li><a href="adminAppointment.php">View Appointments</a></li>
          <li><a href="adminNewAccount.php">View New Accounts</a></li>
          <li class="active"><a href="adminUsers.php">View Users</a></li> 

          <!-- LOGIN HTML, TOP RIGHT NG HOME PAGE -->
          <li class="drop-down"><a href="" class="login" id="login">Admin</a>
            <ul>
              <li><a href="logout.php">Log Out</a></li>
            </ul></li>>
        </ul>
      </nav><!-- .nav-menu -->
      
    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Contact Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>View Users</h2>
          <ol>
            <li><a href="#">Admin</a></li>
            <li>Users</li>
          </ol>
        </div>

      </div>
    </section><!-- End Contact Section -->

              <!-- ======= Modal ======= -->
<?php

  if($_SERVER["REQUEST_METHOD"] == "POST")
  {
    echo "<div class='modal show' id='modalForm'>
      <div class='modal-dialog modal-dialog-centered'>
        <div class='modal-content'>
          <div class='modal-header'>
            <h4 class='modal-title'>Edit </h4>
            <button type='button' class='close' data-dismiss='modal'>&times;</button>
          </div>
          <div class='modal-body'>";

          $servername = "localhost";
          $name = "root";
          $pass = "";
          $dbname = "db_appointment";
          $accountArr = array();

          try
          {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $name, $pass);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $conn->prepare("SELECT * FROM tbl_users WHERE username = :username");
            $stmt->bindParam(":username", $_POST["editBtn"]);
            $stmt->execute();

            foreach ($stmt->fetchAll() as $k=>$v)
            {
              foreach ($v as $key => $value) {
                $accountArr[$key] = $value;
              }
            }
          }
          catch(PDOException $e) 
          {
              echo "Error: " . $e->getMessage();
          }
          $conn = null;

          echo "<label for=''>Username:</label>
            <h5>".$accountArr["username"]."</h5>
            <label for=''>Password:</label>
            <h5>".$accountArr["password"]."</h5>
            <label for=''>Email:</label>
            <h5>".$accountArr["email"]."</h5>
            <label for=''>Admin Authorithy:</label>
            <h5>".$accountArr["admin"]."</h5>
            <label for=''>Account Number:</label>
            <h5>".$accountArr["account_number"]."</h5>
            <label for=''>Account Status:</label>
            <div class='dropdown'>
              <button class='dropdown-toggle DropdownBtn' data-toggle='dropdown' id='adminStatusBtn'>".$accountArr["user_status"]."
              </button> 
              <div class='dropdown-menu'>
                  <a id='apprBtn' class='dropdown-item' onclick='approveStatus()'>0</a>
                  <a id='denyBtn' class='dropdown-item' onclick='denyStatus()'>1</a>
                  <a id='failBtn' class='dropdown-item' onclick='failStatus()'>2</a>
              </div>
            </div>
          </div>
          <div class='modal-footer'>
            <form method='POST' action='userChangeStatus.php'>
              <input type='hidden' id='userStatus' name='userStatus' value=''>
              <input type='hidden' name='username' value=".$accountArr["username"].">
              <button type='submit' class='btn SaveBtn' id='saveBtn' disabled>Save</button>
            </form>
            <button type='button' class='btn btn-danger Cancelbtn' data-dismiss='modal'>Cancel</button>
          </div>
        </div>
      </div>
    </div>";  
  }
?>
  <!-- End Modal -->

    <!-- ======= Calendar Section ======= -->
    <button  data-toggle="modal" data-target="#modalForm"  id='formb' style="opacity: 0%"></button>
   <section class="contact" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
        <div class="tableContainer">
          <h2>Users Table</h2><br>
          <table class="table table-bordered table-hover">
            <thead class="thead-light">
              <tr>
                <th>USERNAME</th>
                <th>PASSOWRD</th>
                <th>EMAIL</th>
                <th>ACCOUNT STATUS</th>
                <th>ADMIN AUTHORITY</th>
                <th>ACCOUNT NUMBER</th>
                <th>ACTION</th>
              </tr>
            </thead>
            <tbody>
              <?php
                include "forms/userTbl.php";
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </section><!-- End Table Section -->
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

  <?php include "forms/modalLoad.php";?>

</body>

</html>
