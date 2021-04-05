<?php
	$servername = "localhost";
    $name = "root";
    $pass = "";
    $dbname = "db_appointment";

    try 
    {
    	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $name, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("SELECT account_number, id, slot_day, slot_month, slot_year, slot_time, customer_comment, queue_number, service_type, appointment_status FROM tbl_appointment");
        $stmt->execute();

        
        foreach($stmt->fetchAll() as $k=>$v) 
        {
          echo "<tr><td>".$v["account_number"]."</td>";
          echo "<td>".$v["id"]."</td>";
          echo "<td>".$v["slot_day"]."</td>";
          echo "<td>".$v["slot_month"]."</td>";
          echo "<td>".$v["slot_year"]."</td>";
          echo "<td>".$v["slot_time"]."</td>";
          echo "<td>".$v["customer_comment"]."</td>";
          echo "<td>".$v["queue_number"]."</td>";
          echo "<td>".$v["service_type"]."</td>";
          echo "<td>".$v["appointment_status"]."</td>";
          echo "<td><form method='POST'><button type='submit' value=".$v["id"]." name='editBtn'>EDIT</button></form></td></tr>";
        }
    }
    catch(PDOException $e) 
    {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
?>