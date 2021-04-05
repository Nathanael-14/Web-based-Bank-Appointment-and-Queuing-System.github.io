<?php
  $servername = "localhost";
    $name = "root";
    $pass = "";
    $dbname = "db_appointment";

    try 
    {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $name, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("UPDATE tbl_new_accounts SET approval_status = :status WHERE id = :id");
        $stmt->bindParam(":status", $_POST["userStatus"]);
        $stmt->bindParam(":id", $_POST["id"]);
        $stmt->execute();

        header("Location: adminNewAccount.php");
    }
    catch(PDOException $e) 
    {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
?>