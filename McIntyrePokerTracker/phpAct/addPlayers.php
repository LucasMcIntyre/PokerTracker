<?php 
	// 1. database credentials
	$host = "localhost";
	$db_name = "pokerTracker";
	$username = "username";
	$password = "password";
	 
	// 2. connect to database
	$con = mysqli_connect($host, $username, $password, $db_name);

	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

		// define variables and set to empty values
	$name = "";
	$nameErr = "";
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (empty($_POST["name"])) {
			$nameErr = "Input is required";
		}
		else {
			$name = $_POST["name"];
		}
		
		if ($name != null)
		{
			$sql = "INSERT INTO players (name)
			VALUES ('$name')";
			if ($con->query($sql) === TRUE) {
				header('Location: ../playerList.php');
			} else {
				echo "Error: " . $sql . "<br>" . $con->error;
			}
		}
		
		
	}
	
?>