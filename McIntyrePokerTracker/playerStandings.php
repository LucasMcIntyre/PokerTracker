<html>
	<div class="box">
		<head>
			 <link rel="stylesheet" href="styles/main.css">
			 <link rel="stylesheet" href="styles/normalize.css">
		</head>
		<header>
		    <h2 class = "pageTitle">Poker Game Tracker - Player Standings</h2>
		    <div class = "menu">
				<a href="index.php">Home</a>
				<a href="gameManager.php">Game Manager</a>
				<a href="playerList.php">Player List</a>
				<a href="playerStandings.php">Player Standings</a>
			</div>
		</header>
		<body>
			<div class="contentBoxGameManager">
				<div class="standingsTitle"><h3>Player Standings</h3></div>
				<br>
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
				echo "<table border='0' class='playerStandings'>
				<thead>
				<tr>
				<th>Name</th>
				<th>Score</th>
				</tr>
				</thead>
				<tbody>";

				$sql = "SELECT *
						FROM players";

					$result = mysqli_query($con, $sql);
					while($row = mysqli_fetch_array($result))
					{
						$total ="0";
						$sqlWinners1 = "SELECT *
										FROM games
										WHERE 1stWinner =  '". $row['playerID']."' ";
						$resultWinners1 = mysqli_query($con, $sqlWinners1);
						while($rowWin1 = mysqli_fetch_array($resultWinners1))
						{
							$total = $total + $rowWin1['numPlayers'];
						}
						$sqlWinners2 = "SELECT *
										FROM games
										WHERE 2ndWinner =  '". $row['playerID']."' ";
						$resultWinners2 = mysqli_query($con, $sqlWinners2);
						while($rowWin2 = mysqli_fetch_array($resultWinners2))
						{
							$total = $total + $rowWin2['numPlayers']/2;
						}
						$sqlWinners3= "SELECT *
										FROM games
										WHERE 3rdWinner =  '". $row['playerID']."' ";
						$resultWinners3 = mysqli_query($con, $sqlWinners3);
						while($rowWin3 = mysqli_fetch_array($resultWinners3))
						{
							$total = $total + $rowWin3['numPlayers']/3;
						}
						
						echo "<tr>";
						echo "<td>" . $row['name'] . "</td>";
						echo "<td>" . floor($total) . "</td>";
						echo "</tr>";
					}
					echo "</table>";
				
				?>
			</div>
		</body>
    </div>
</html>
