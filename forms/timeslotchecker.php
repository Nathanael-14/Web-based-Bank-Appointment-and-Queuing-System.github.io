<?php 
	if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["btncheck"]) && $_POST["btncheck"] != "")
	{
		$servername = "localhost";
    $name = "root";
    $pass = "";
    $dbname = "db_appointment";
		try 
      	{
          $str = explode(" ", $_POST["btncheck"]);

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

          echo "<script>document.getElementById('reserveDay').value = ".$day."</script>";
          
          echo "<script>document.getElementById('reserveYear').value = ".$year."</script>";

          echo "<script>document.getElementById('reserveMonth').value = ".$newMonth."</script>";

        	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $name, $pass);
        	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        	$stmt = $conn->prepare("SELECT slot_time, COUNT(slot_time) AS slots FROM tbl_appointment WHERE slot_day = :day AND slot_month = :month AND slot_year = :year GROUP BY slot_time ORDER BY slot_time");
        	$stmt->bindParam(':year', $year);
       		$stmt->bindParam(':month', $newMonth);
       		$stmt->bindParam(':day', $day);

          /*$stmt = $conn->prepare("INSERT INTO tbl_appointment (slot_day, slot_month, slot_year, slot_time) VALUES (:day, :month, :year, :slot)");
          $stmt->bindParam(':year', $year);
          $stmt->bindParam(':month', $month);
          $stmt->bindParam(':day', $day);
          $stmt->bindParam(':slot', $slot);*/

       		$stmt->execute();

        	/*echo "<script>document.getElementById('radio910').disabled = false;</script>";
          echo "<script>document.getElementById('radio1011').disabled = false;</script>";
          echo "<script>document.getElementById('radio1112').disabled = false;</script>";
          echo "<script>document.getElementById('radio12').disabled = false;</script>";
          echo "<script>document.getElementById('radio23').disabled = false;</script>";
          echo "<script>document.getElementById('radio34').disabled = false;</script>";*/

       		foreach($stmt->fetchAll() as $k=>$v) 
       		{
         		if($v["slots"] >= 5)
            {
              switch ($v["slot_time"]) 
              {
                case '9':
                  echo "<script>document.getElementById('radio910').disabled = true;</script>";
                  echo "<script>document.getElementById('lbl11').disabled = true;</script>";
                  break;
                case '10':
                  echo "<script>document.getElementById('radio1011').disabled = true;</script>";
                  break;
                case '11':
                  echo "<script>document.getElementById('radio1112').disabled = true;</script>";
                  break;
                case '1':
                  echo "<script>document.getElementById('radio12').disabled = true;</script>";
                  break;
                case '2':
                  echo "<script>document.getElementById('radio23').disabled = true;</script>";
                  break;
                case '3':
                  echo "<script>document.getElementById('radio34').disabled = true;</script>";
                  break;
                default:
                  break;
              }
            } 
        	}

          
          //print_r($arr);
          //echo "<script> document.getElementById('btncheck').disabled=true; </script>";
		}
	    catch(PDOException $e) 
	    {
		   	echo "Error: " . $e->getMessage();
		}
	    $conn = null;  
	}
?>