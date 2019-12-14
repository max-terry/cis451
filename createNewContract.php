<?php

include('connectionData.txt');

$conn = mysqli_connect($server, $user, $pass, $dbname, $port)
or die('Error connecting to MySQL server.');
?>

<html>
<head>
	<title>Create Monster Contract</title>
</head>

<body bgcolor="white">

<hr>
	<p> Fill out a monster contract for eligible knights </p>

	<form action="newContractScreen.php" method="POST">
	Knight: <select name="knights" class='form-control' style='width:150px;'>
		<option value=''>----Select----</option>
			<?php
				$query = "SELECT first_name, last_name, citizen_id FROM fantasyWorld.citizen JOIN fantasyWorld.knight USING(citizen_id)";
				$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

				#echo "<select id=knights name=knights value='' class='form-control' style='width:150px;'>";
				while($row = mysqli_fetch_array($result, MYSQLI_BOTH)){
					#print "$row";
					echo "<option value='$row[citizen_id]'>$row[first_name] $row[last_name]</option>";
					#print "$row[first_name]";
				}
				//echo "</select></br>";
			?>
		</select>
		<br>
		Monster Name: <input type="text" name="monster_name">
		<br>
		Monster Species: <input type="text" name="monster_species">
		<br>
		Description: <input type="text" name="monster_description">
		<br>
		Reward: <input type="number" min=0 value=0 name="monster_reward">
		<br>
		<input type="submit" value="submit">
		<input type="reset" value="erase">
	</form>

	<!--<form action="createNewContract.php" method="POST">
		Monster Type: <input type="text" name="monster_type">
		<br>
		<input type="submit" value="submit">
		<input type="reset" value="erase">
	</form>-->

	<button onclick="location.href='finalProjectMaxTerry.html'">Home Screen</button>

</hr>
</body>
</html>