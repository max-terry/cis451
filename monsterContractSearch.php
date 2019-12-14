<?php

include('connectionData.txt');

$conn = mysqli_connect($server, $user, $pass, $dbname, $port)
or die('Error connecting to MySQL server.');
?>

<html>
<body>
<hr>

<?php
$monster_type = $_POST['monster_type'];
$monster_type = mysqli_escape_string($conn, $monster_type);
print "The following contracts are all against different $monster_type:<br>";

print "The format is as such: monster name, type, contract description, height, weight, reward money, knight assigned to contract";

$query = "SELECT monster_name, monster_type, description, height, weight, reward, first_name, last_name, date_completed
	FROM fantasyWorld.monster JOIN fantasyWorld.monster_contract USING(species_id)
		JOIN fantasyWorld.knight USING (citizen_id) JOIN fantasyWorld.citizen USING(citizen_id)
        WHERE monster_type="."'".$monster_type."'";

$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

print "<pre>";
while($row = mysqli_fetch_array($result, MYSQLI_BOTH))
  {
    print "\n";
    print "$row[monster_name] -- $row[monster_type] -- $row[description] -- $row[height] ft. -- $row[weight] lbs -- $row[reward] -- Assigned to: $row[first_name] $row[last_name] -- Completed on: $row[date_completed]";
  }
print "</pre>";

mysqli_free_result($result);

mysqli_close($conn);
?>


<br>
<button onclick="location.href='finalProjectMaxTerry.html'">Home Screen</button>
<button onclick="location.href='monsterContractSearch.html'">Lookup Another</button>

</hr>
</body>
</html>