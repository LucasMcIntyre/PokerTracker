<html>
	<div class="box">
		<head>
			 <link rel="stylesheet" href="styles/main.css">
			 <link rel="stylesheet" href="styles/normalize.css">
		</head>
		<header>
		    <h2 class = "pageTitle">Poker Game Tracker - Player List</h2>
		    <div class = "menu">
				<a href="index.php">Home</a>
				<a href="gameManager.php">Game Manager</a>
				<a href="playerList.php">Player List</a>
				<a href="playerStandings.php">Player Standings</a>
			</div>
		</header>
		<body>
			<div class="contentBoxGameManager">
				<h3>New Player</h3>
				<form method="post" action="phpAct/addPlayers.php">  
				  <label class="inputLabel">Name: </label>
				  <div class="alignRight"><input type="text" name="name" id="name"></div>
				  <br><br>
				  <div class="buttonWrapper"><input type="submit" name="submit" value="Add Player"></div>  
				</form>
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

				$sql = "SELECT *
						FROM players";

					$result = mysqli_query($con, $sql);
					echo "<table border='1'>
					<thead>
					<tr>
					<th>Player ID</th>
					<th>Name</th>
					</tr>
					</thead>
					<tbody>";
					while($row = mysqli_fetch_array($result))
					{
					echo "<tr>";
					echo "<td>" . $row['playerID'] . "</td>";
					echo "<td>" . $row['name'] . "</td>";
					echo "</tr>";
					}
					echo "</table>";
				
				?>
			</div>
		</body>
    </div>
</html>
