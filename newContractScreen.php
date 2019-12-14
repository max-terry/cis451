<?php

include('connectionData.txt');

$conn = mysqli_connect($server, $user, $pass, $dbname, $port)
or die('Error connecting to MySQL server.');
?>

<html>
<body>
<hr>

<?php
$citizen_id = $_POST['knights'];
$monster_name = $_POST['monster_name'];
$monster_description = $_POST['monster_description'];
$species = $_POST['monster_species'];
$reward = $_POST['monster_reward'];
$citizen_id = mysqli_escape_string($conn, $citizen_id);
$monster_name = mysqli_escape_string($conn, $monster_name);
$monster_description = mysqli_escape_string($conn, $monster_description);
$reward = mysqli_escape_string($conn, $reward);

$knight_query = "SELECT first_name, last_name FROM fantasyWorld.citizen WHERE citizen_id=$citizen_id";
$knight_result = mysqli_query($conn, $knight_query);
$first_row = mysqli_fetch_array($knight_result, MYSQLI_BOTH);
$knight = $first_row[first_name]." ".$first_row[last_name];
$knight = mysqli_escape_string($conn, $knight);

$species_query = "SELECT species_id FROM fantasyWorld.monster WHERE monster_type='$species'";
$species_result = mysqli_query($conn, $species_query);
$first_row = mysqli_fetch_array($species_result, MYSQLI_BOTH);
$species_id = $first_row[species_id];
$species_id = mysqli_escape_string($conn, $species_id);

print "Your new contract has the following characteristics: <br>";
print "Knight: $knight <br>";
print "Name of Creature: $monster_name <br>";
print "Species of Creature: $species <br>";
print "Description: $monster_description <br>";
print "Reward Offered: $reward gold pieces <br>";


$query = "INSERT INTO fantasyWorld.monster_contract (citizen_id,species_id,monster_name,description,reward) VALUES ('$citizen_id','$species_id','$monster_name', '$monster_description', '$reward')";

$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

mysqli_free_result($result);
mysqli_free_result($knight_result);
mysqli_free_result($species_result);

mysqli_close($conn);
?>


<br>
<button onclick="location.href='finalProjectMaxTerry.html'">Home Screen</button>
<button onclick="location.href='createNewContract.php'">Create Another</button>

</hr>
</body>
</html>