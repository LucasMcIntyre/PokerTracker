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
	$date = $location = $numPlayers = "";
	$dateErr = $locationErr = $numPlayersErr = "";
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (empty($_POST["date"])) {
			$dateErr = "Input is required";
		}
		else {
			$date = $_POST["date"];
		}
		
		if (empty($_POST["location"])) {
			$locationErr = "Input is required";
		}
		else {
			$location = $_POST["location"];
		}
		if (empty($_POST["numPlayers"])) {
			$numPlayersErr = "Input is required";
		}
		else {
			$numPlayers = $_POST["numPlayers"];
		}
		if ($date != null && $location != null && $numPlayers != null )
		{
			$sql = "INSERT INTO games (date, location, numPlayers)
			VALUES ('$date', '$location', '$numPlayers')";
			if ($con->query($sql) === TRUE) {
				header('Location: ../gameManager.php');
			} else {
				echo "Error: " . $sql . "<br>" . $con->error;
			}
		}
		
		
	}
	
?>