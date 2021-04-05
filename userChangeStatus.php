<?php
  $servername = "localhost";
    $name = "root";
    $pass = "";
    $dbname = "db_appointment";

    try 
    {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $name, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("UPDATE tbl_users SET user_status = :status WHERE username = :username");
        $stmt->bindParam(":status", $_POST["userStatus"]);
        $stmt->bindParam(":username", $_POST["username"]);
        $stmt->execute();

        header("Location: adminUsers.php");
    }
    catch(PDOException $e) 
    {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
?>