<?php
	session_start();
	$status = "PENDING APPROVAL";
	$accountnumber = null;

	if(isset($_POST["appointmentfor"]))
	{
		if(!($_POST["appointmentfor"] == "New Account"))
		{
			$accountnumber = $_SESSION["account_number"];
			$status = "APPROVED";
		}


		$servername = "localhost";
    	$name = "root";
    	$pass = "";
    	$dbname = "db_appointment";
		try
		{
			$conn = new PDO("mysql:host=$servername;dbname=$dbname", $name, $pass);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$stmt = $conn->prepare("SELECT count(*) as total FROM tbl_appointment WHERE slot_day = :day AND slot_month = :month AND slot_year = :year AND slot_time = :slot");

			$stmt->bindParam(":day",$_POST["reserveDay"]);
			$stmt->bindParam(":month",$_POST["reserveMonth"]);
			$stmt->bindParam(":year",$_POST["reserveYear"]);
			$stmt->bindParam(":slot",$_POST["timeslot"]);

			$queue = 1;

			$stmt->execute();

			foreach($stmt->fetchAll() as $k=>$v) 
			{
				if($v["total"] > 0)
				{
					$queue = $v["total"] + 1;
				}
			}

			$stmt = $conn->prepare("INSERT INTO tbl_appointment(slot_day, slot_month, slot_year, slot_time, customer_comment, queue_number, service_type, appointment_status, account_number) VALUES(:day, :month, :year, :slot, :comment, :queue, :service, :status, :accountnumber)");

			if(!(isset($_POST["addNotes"])))
			{
				$_POST["addNotes"] = null;	
			}

			$stmt->bindParam(":day",$_POST["reserveDay"]);
			$stmt->bindParam(":month",$_POST["reserveMonth"]);
			$stmt->bindParam(":year",$_POST["reserveYear"]);
			$stmt->bindParam(":slot",$_POST["timeslot"]);
			$stmt->bindParam(":comment",$_POST["addNotes"]);
			$stmt->bindParam(":queue",$queue);
			$stmt->bindParam(":service",$_POST["appointmentfor"]);
			$stmt->bindParam(":status",$status);
			$stmt->bindParam(":accountnumber",$accountnumber);

			$stmt->execute();

			if($_POST["appointmentfor"] == "New Account")
			{
				$stmt = $conn->prepare("SELECT id FROM tbl_appointment WHERE slot_day = :day AND slot_month = :month AND slot_year = :year AND slot_time = :slot AND queue_number = :queue");
				$stmt->bindParam(":day",$_POST["reserveDay"]);
				$stmt->bindParam(":month",$_POST["reserveMonth"]);
				$stmt->bindParam(":year",$_POST["reserveYear"]);
				$stmt->bindParam(":slot",$_POST["timeslot"]);
				$stmt->bindParam(":queue",$queue);

				$stmt->execute();

				$slot_id;

				foreach($stmt->fetchAll() as $k=>$v) 
				{
					$slot_id = $v["id"];
				}

				$stmt = $conn->prepare("INSERT INTO tbl_new_accounts(fName, mName, lName, email, approval_status, slot_id) VALUES(:fName, :mName, :lName, :email, :status, :slot)");
				$stmt->bindParam(":fName",$_POST["fName"]);
				$stmt->bindParam(":mName",$_POST["mName"]);
				$stmt->bindParam(":lName",$_POST["lName"]);
				$stmt->bindParam(":email",$_POST["email"]);
				$stmt->bindParam(":status", $status);
				$stmt->bindParam(":slot", $slot_id);

				$stmt->execute();
			}

			header("Location: index.php");
		}
		catch(PDOException $e) 
		{
			echo "Error: " . $e->getMessage();
		}
		$conn = null;
	}

?>