<?php
	$servername = "localhost";
    $name = "root";
    $pass = "";
    $dbname = "db_appointment";

    try 
    {
    	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $name, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("SELECT id, fName, mName, lName, email, approval_status, status_comment, slot_id FROM tbl_new_accounts");
        $stmt->execute();

        
        foreach($stmt->fetchAll() as $k=>$v) 
        {

          echo "<tr><td>".$v["id"]."</td>";
          echo "<td>".$v["fName"]."</td>";
          echo "<td>".$v["mName"]."</td>";
          echo "<td>".$v["lName"]."</td>";
          echo "<td>".$v["email"]."</td>";
          echo "<td>".$v["approval_status"]."</td>";
          echo "<td>".$v["slot_id"]."</td>";
          echo "<td><form method='POST'><button type='submit' value=".$v["id"]." name='editBtn'>EDIT</button></form></td></tr>";
        }
    }
    catch(PDOException $e) 
    {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
?>