<?php

  if ($_SERVER["REQUEST_METHOD"] == "POST" && (isset($_POST["verify"]) && ($_POST["verify"] == "verify" || $_POST["verify"] == "try again")))
  { 

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_appointment";

    try 
    {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $stmt = $conn->prepare("SELECT account_number, first_name, middle_name, last_name FROM tbl_bankaccount WHERE 
        account_number = :accountnumber");
      $stmt->bindParam(':accountnumber', $accountnumber);

      $accountnumber = trim($_POST["accountnumber"]);
      $firstname = trim($_POST["firstname"]);
      $middlename = trim($_POST["middlename"]);
      $lastname = trim($_POST["lastname"]);
      $stmt->execute();

      $account = array();

      $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
      foreach($stmt->fetchAll() as $k=>$v) 
      {
        foreach ($v as $key => $value) 
        {
          array_push($account, $value);
        }
        
      }

      if(count($account) > 0)
      {
        
        if($account[0] == $accountnumber && strtolower($account[1]) == strtolower($firstname) && strtolower($account[2]) == strtolower($middlename) && strtolower($account[3]) == strtolower($lastname))
        {
          $stmt = $conn->prepare("SELECT account_number FROM tbl_users WHERE account_number = :accountnumber");
          $stmt->bindParam(':accountnumber', $accountnumber);
          $stmt->execute();

          $arr = array();
          foreach($stmt->fetchAll() as $k=>$v) 
          {
            foreach ($v as $key => $value) 
            {
              array_push($arr, $value);
            }
          }

          if (count($arr) > 0)
          {
            echo "<div class='alert alert-danger alert-dismissible'>
                  <button type='button' class='close' data-dismiss='alert'>&times;</button>
                  <strong>Error!</strong> The specified account number already has an account.
                </div>";
          }
          else
          {
            echo "<div class='alert alert-success alert-dismissible'>
                  <button type='button' class='close' data-dismiss='alert'>&times;</button>
                  <strong>Success!</strong> Account has been validated please fill out the fields below to create an account.
                </div>";

            $accountholder = "Username";
            $firstholder = "Password";
            $middleholder = "Confirm Password";
            $lastholder = "Email Address";
            $btnholder = "register";
            $text = "password";
            $foreignkey = $accountnumber;  
          }
        }
        else
        {
          echo "<div class='alert alert-danger alert-dismissible'>
                  <button type='button' class='close' data-dismiss='alert'>&times;</button>
                  <strong>Error!</strong> The specified name does not match the account number.
                </div>";
          $btnholder = "try again";
        }
      }
      else 
      {
        echo "<div class='alert alert-danger alert-dismissible'>
                  <button type='button' class='close' data-dismiss='alert'>&times;</button>
                  <strong>Error!</strong> Account number does not exist.
                </div>";
        $btnholder = "try again";
      }
    }
    catch(PDOException $e) 
    {
      echo "Error: " . $e->getMessage();
    }
    $conn = null;    
  }
  elseif ($_SERVER["REQUEST_METHOD"] == "POST" && (isset($_POST["verify"]) && ($_POST["verify"] == "register")))
  {
    $accountnumber = trim($_POST["foreignkey"]);
    $username = trim($_POST["accountnumber"]);
    $password = trim($_POST["firstname"]);
    $confirmpass = trim($_POST["middlename"]);
    $email = trim($_POST["lastname"]);
    $okay = true;

    if(strlen($username) == 0)
    {
      echo "<div class='alert alert-danger alert-dismissible'>
                  <button type='button' class='close' data-dismiss='alert'>&times;</button>
                  <strong>Error!</strong> Please fill out all of the fields.
                </div>";
      $okay = false;
    }

    if(strlen($password) >= 8)
    {
      if(!(strcmp($password,$confirmpass) == 0))
      {
        echo "<div class='alert alert-danger alert-dismissible'>
                  <button type='button' class='close' data-dismiss='alert'>&times;</button>
                  <strong>Error!</strong> Passwords do not match.
                </div>";
        $okay = false;
      }
    }
    else
    {
      echo "<div class='alert alert-danger alert-dismissible'>
                  <button type='button' class='close' data-dismiss='alert'>&times;</button>
                  <strong>Error!</strong> Password must be at least 8 characters long.
                </div>";
      $okay = false;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
    {
      echo "<div class='alert alert-danger alert-dismissible'>
                  <button type='button' class='close' data-dismiss='alert'>&times;</button>
                  <strong>Error!</strong> Please enter a valid email address.
                </div>";
      $okay = false;
    }

    if($okay)
    {
      $servername = "localhost";
      $name = "root";
      $pass = "";
      $dbname = "db_appointment";

      try 
      {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $name, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("SELECT username FROM tbl_users WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        $arr = array();
        foreach($stmt->fetchAll() as $k=>$v) 
        {
          foreach ($v as $key => $value) 
          {
            array_push($arr, $value);
          }
        }

        if(count($arr)>0)
        {
          echo "<div class='alert alert-danger alert-dismissible'>
                  <button type='button' class='close' data-dismiss='alert'>&times;</button>
                  <strong>Error!</strong> Username already taken.
                </div>";
          $accountholder = "Username";
          $firstholder = "Password";
          $middleholder = "Confirm Password";
          $lastholder = "Email Address";
          $btnholder = "register";
          $text = "password";
          $foreignkey = $accountnumber;
        }
        else
        {
          $stmt = $conn->prepare("INSERT INTO tbl_users (username, password, email, account_number) VALUES (:username, :password, :email, :accountnumber)");
          $stmt->bindParam(':accountnumber', $accountnumber);
          $stmt->bindParam(':username', $username);
          $stmt->bindParam(':password', $password);
          $stmt->bindParam(':email', $email);
          $stmt->execute();

          echo "<div class='alert alert-success alert-dismissible'>
                  <button type='button' class='close' data-dismiss='alert'>&times;</button>
                  <strong>Success!</strong> Account has been created please login to book an appointment.
                </div>";
        }
      }
      catch(PDOException $e) 
      {
        echo "Error: " . $e->getMessage();
      }
      $conn = null;    
    }
    else
    {
      $accountholder = "Username";
      $firstholder = "Password";
      $middleholder = "Confirm Password";
      $lastholder = "Email Address";
      $btnholder = "register";
      $text = "password";
      $foreignkey = $accountnumber;
    }
  }
?>
