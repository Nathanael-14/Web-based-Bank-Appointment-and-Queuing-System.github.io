<?php
	$servername = "localhost";
    $name = "root";
    $pass = "";
    $dbname = "db_appointment";

    try 
    {
    	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $name, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("SELECT * FROM tbl_users");
        $stmt->execute();

        
        foreach($stmt->fetchAll() as $k=>$v) 
        {

          echo "<tr><td>".$v["username"]."</td>";
          echo "<td>".$v["password"]."</td>";
          echo "<td>".$v["email"]."</td>";
          echo "<td>".$v["user_status"]."</td>";
          echo "<td>".$v["admin"]."</td>";
          echo "<td>".$v["account_number"]."</td>";
          if($_SESSION["username"] == $v["username"])
          {
            echo "<td><button type='submit'disabled>EDIT</button></td></tr>";
          }
          else
          {
            echo "<td><form method='POST'><button type='submit' value=".$v["username"]." name='editBtn'>EDIT</button></form></td></tr>";
          }
          
        }
    }
    catch(PDOException $e) 
    {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
?>