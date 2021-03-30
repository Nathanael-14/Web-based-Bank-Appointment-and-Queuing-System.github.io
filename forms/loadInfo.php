<?php
	$account = array();
	$servername = "localhost";
    $name = "root";
    $pass = "";
    $dbname = "db_appointment";

    try 
    {
    	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $name, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("SELECT * FROM tbl_users AS users INNER JOIN tbl_bankaccount AS bank ON users.account_number=bank.account_number WHERE username = :username");
        $stmt->bindParam(':username', $_SESSION["username"]);
        $stmt->execute();

        
        foreach($stmt->fetchAll() as $k=>$v) 
        {
          foreach ($v as $key => $value) 
          {
          	$account[$key] = $value; 
          }
        }
    }
    catch(PDOException $e) 
    {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
?>