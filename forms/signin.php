<?php
	if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"]))
	{
		$username = trim($_POST["username"]);
		$password = trim($_POST["password"]);
		$okay = true;

		if(strlen($username) == 0)
		{
			echo "<div class='alert alert-danger alert-dismissible'>
                  <button type='button' class='close' data-dismiss='alert'>&times;</button>
                  <strong>Error!</strong> Please fill out all of the fields.
                </div>";
			$okay = false;
		}

		if(strlen($password) < 8)
		{
			echo "<div class='alert alert-danger alert-dismissible'>
                  <button type='button' class='close' data-dismiss='alert'>&times;</button>
                  <strong>Error!</strong> Invalid password.
                </div>";
			$okay = false;
		}

		if($okay)
		{
			$servername = "localhost";
      $name = "root";
      $pass = "";
      $dbname = "db_appointment";

      try 
      {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $name, $pass);
        		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      	$stmt = $conn->prepare("SELECT username, user_status, admin, account_number FROM tbl_users WHERE username = :username and password = :password");
    		$stmt->bindParam(':username', $username);
    		$stmt->bindParam(':password', $password);
    		$stmt->execute();

    		$arr = array();
        session_start();
        foreach($stmt->fetchAll() as $k=>$v) 
      	{
     			foreach ($v as $key => $value) 
     			{
      			array_push($arr, $value);
       			$_SESSION[$key] = $value;
          }
      	}

    		if(count($arr)>0)
     		{	
     			if($_SESSION["user_status"])
     			{	
     				echo "<div class='alert alert-danger alert-dismissible'>
                  				<button type='button' class='close' data-dismiss='alert'>&times;</button>
                  				<strong>Error!</strong> Your account has either been suspended or inactivated. Please contact bank personel for more information.
                			</div>";
        	}
      		else
     			{
        		$_SESSION["login"] = true;
      			//redirect page
	         	echo "<div class='alert alert-success alert-dismissible'>
			                  <button type='button' class='close' data-dismiss='alert'>&times;</button>
			                  <strong>Success!</strong> .".$_SESSION["username"]."
			                </div>";
            header("Location: index.php");
          }
        }
        else
        {
		     	echo "<div class='alert alert-danger alert-dismissible'>
             			<button type='button' class='close' data-dismiss='alert'>&times;</button>
            			<strong>Error!</strong> Account with specified username and passoword does not exist.
            		</div>";
        }
		  }
	  catch(PDOException $e) 
    {
		   		echo "Error: " . $e->getMessage();
		}
		$conn = null;    
    }
	}
?>