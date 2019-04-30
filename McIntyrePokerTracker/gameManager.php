<html>
	<div class="box">
		<head>
			 <link rel="stylesheet" href="styles/main.css">
			 <link rel="stylesheet" href="styles/normalize.css">
		</head>
		<header>
		    <h2 class = "pageTitle">Poker Game Tracker - Game Manager</h2>
		    <div class = "menu">
				<a href="index.php">Home</a>
				<a href="gameManager.php">Game Manager</a>
				<a href="playerList.php">Player List</a>
				<a href="playerStandings.php">Player Standings</a>
			</div>
		</header>
		<body>
			<div class="contentBoxGameManager">
				<h3>New Game</h3>
				<form method="post" action="phpAct/addGame.php">  
				  <label class="inputLabel">Date: </label>
				  <div class="alignRight"><input type="date" name="date" id="date"></div>
				  <br><br>
				  <label class="inputLabel">Location: </label>
				  <div class="alignRight"><input type="text" name="location" id="location"></div>
				  <br><br>
				  <label class="inputLabel">Number Players: </label>
				  <div class="alignRight"><input type="text" name="numPlayers" id="numPlayers"></div>
				  <br><br>
				  <div class="buttonWrapper"><input type="submit" name="submit" value="Add Game"></div>  
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
						FROM games";

					$result = mysqli_query($con, $sql);
					echo "<table border='1'>
					<thead>
					<tr>
					<th>Game ID</th>
					<th>Date</th>
					<th>Location</th>
					<th>Num Players</th>
					</tr>
					</thead>
					<tbody>";
					while($row = mysqli_fetch_array($result))
					{
					echo "<tr>";
					echo "<td><button id='myBtn'>" . $row['gameID'] . "</button></td>";
					echo "<td>" . $row['date'] . "</td>";
					echo "<td>" . $row['location'] . "</td>";
					echo "<td>" . $row['numPlayers'] . "</td>";
					echo "</tr>";
					}
					echo "</table>";
				
				?>
			</div>
		</body>
    </div>
	<div id="myModal" class="modal">

	  <!-- Modal content -->
	  <div class="modal-content">
		<span class="close">&times;</span>
		<h3>Pick Winners for this Game</h3>
		<form method="post" action="phpAct/setWinners.php">
		  <label class="inputLabel">Winner 1: </label>
		  <div class="alignRight"><select name="winner1" id="winner1">
		  <?php
			$winnersql = "SELECT *
						  FROM players";
			$winners = mysqli_query($con, $winnersql);
			while ($row = mysqli_fetch_array($winners)) {
				echo "<option value='" . $row['playerID'] . "'>" . $row['name'] . "</option>";
			}
		  ?>
		  </select></div>
		  <br><br>
		  <label class="inputLabel">Winner 2: </label>
		  <div class="alignRight"><select name="winner2" id="winner2">
		  <?php
			$winnersql = "SELECT *
						  FROM players";
			$winners = mysqli_query($con, $winnersql);
			while ($row = mysqli_fetch_array($winners)) {
				echo "<option value='" . $row['playerID'] . "'>" . $row['name'] . "</option>";
			}
		  ?>
		  </select></div>
		  <br><br>
		  <label class="inputLabel">Winner 3: </label>
		  <div class="alignRight"><select name="winner3" id="winner3">
		  <?php
			$winnersql = "SELECT *
						  FROM players";
			$winners = mysqli_query($con, $winnersql);
			while ($row = mysqli_fetch_array($winners)) {
				echo "<option value='" . $row['playerID'] . "'>" . $row['name'] . "</option>";
			}
		  ?>
		  </select></div>
		  <br><br>
		  <div class="buttonWrapper"><input type="submit" name="submit" value="Set Winners"></div>  
		</form>
	  </div>

	</div>
</html>

<script>
	// Get the modal
	var modal = document.getElementById('myModal');

	// Get the button that opens the modal
	var btn = document.getElementById("myBtn");

	// Get the <span> element that closes the modal
	var span = document.getElementsByClassName("close")[0];

	// When the user clicks the button, open the modal 
	btn.onclick = function() {
	  modal.style.display = "block";
	}

	// When the user clicks on <span> (x), close the modal
	span.onclick = function() {
	  modal.style.display = "none";
	}

	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
	  if (event.target == modal) {
		modal.style.display = "none";
	  }
	}

	
</script>
