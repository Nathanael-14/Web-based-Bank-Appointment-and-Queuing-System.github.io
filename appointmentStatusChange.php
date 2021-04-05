<?php
	$servername = "localhost";
    $name = "root";
    $pass = "";
    $dbname = "db_appointment";

    try 
    {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $name, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if ($_POST["userStatus"] != '')
        {
            $stmt = $conn->prepare("UPDATE tbl_appointment SET appointment_status = :status WHERE id = :id");
            $stmt->bindParam(":status", $_POST["userStatus"]);
            $stmt->bindParam(":id", $_POST["id"]);
            $stmt->execute();
        }

        if ($_POST["newSlot"] != '')
        {
            $str = explode(" ", $_POST["newDate"]);

          $month = $str[1];
          $day = $str[2];
          $year = $str[3];

          switch ($month) {

            case 'Jan':
              $newMonth = 1;
              break;

            case 'Feb':
              $newMonth = 2;
              break;

            case 'Mar':
              $newMonth = 3;
              break;

            case 'Apr':
              $newMonth = 4;
              break;

            case 'May':
              $newMonth = 5;
              break;

            case 'Jun':
              $newMonth = 6;
              break;

            case 'Jul':
              $newMonth = 7;
              break;

            case 'Aug':
              $newMonth = 8;
              break;

            case 'Sep':
              $newMonth = 9;
              break;

            case 'Oct':
              $newMonth = 10;
              break;

            case 'Nov':
              $newMonth = 11;
              break;

            case 'Dec':
              $newMonth = 12;
              break;
            
            default:
              # code...
              break;
          }

            $stmt = $conn->prepare("SELECT COUNT(*) AS total FROM tbl_appointment WHERE slot_day = :day AND slot_month = :month AND slot_year = :year AND slot_time = :slot");
            $stmt->bindParam(':year', $year);
            $stmt->bindParam(':month', $newMonth);
            $stmt->bindParam(':day', $day);
            $stmt->bindParam(':slot', $_POST["newSlot"]);
            $stmt->execute();
            $queue = 0;

            foreach ($stmt->fetchAll() as $k => $v) 
            {
                $queue = $v["total"]+1;
            }

            $stmt = $conn->prepare("UPDATE tbl_appointment SET slot_day = :day, slot_month = :month, slot_year = :year, slot_time = :slot, queue_number = :queue WHERE id = :id");
            $stmt->bindParam(':year', $year);
            $stmt->bindParam(':month', $newMonth);
            $stmt->bindParam(':day', $day);
            $stmt->bindParam(':slot', $_POST["newSlot"]);
            $stmt->bindParam(':queue', $queue);
            $stmt->bindParam(':id', $_POST["id"]);

            $stmt->execute();
        }

        header("Location: adminAppointment.php");
    }
    catch(PDOException $e) 
    {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
?>