<?php
	$servername = "localhost";
    $name = "root";
    $pass = "";
    $dbname = "db_appointment";

    try 
    {
    	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $name, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $status = "APPROVED";

        $stmt = $conn->prepare("SELECT service_type, slot_day, slot_month, slot_year, slot_time FROM tbl_appointment WHERE account_number = :accountnumber AND appointment_status = :status");
        $stmt->bindParam(':accountnumber', $account["account_number"]);
        $stmt->bindParam(':status', $status);
        $stmt->execute();

        
        foreach($stmt->fetchAll() as $k=>$v) 
        {

          echo "<tr><td>".$v["service_type"]."</td>";
          $date = $v["slot_month"]."/".$v["slot_day"]."/".$v["slot_year"];
          echo "<td>".$date."</td>";
          echo "<td>".$v["slot_time"]."</td></tr>";
        }
    }
    catch(PDOException $e) 
    {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
?>