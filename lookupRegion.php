<?php

include('connectionData.txt');

$conn = mysqli_connect($server, $user, $pass, $dbname, $port)
or die('Error connecting to MySQL server.');
?>

<html>
<body>
<hr>

<?php
$region_id = $_POST['region_id'];
$region_id = mysqli_escape_string($conn, $region_id);

$regname_query = "SELECT region_name FROM fantasyWorld.region WHERE region_id=$region_id";

$regname_result = mysqli_query($conn, $regname_query) or die(mysqli_error($conn));

$row = mysqli_fetch_array($regname_result, MYSQLI_BOTH);

print "You are looking at the following region: $row[region_name]</br></br>";

print "The following stalls are found here (name, affordability): </br>";
$stall_query = "SELECT stall_name, affordability FROM fantasyWorld.stall WHERE region_id=$region_id";
$stall_result = mysqli_query($conn, $stall_query) or die(mysqli_error($conn));

print "<pre>";
while($row = mysqli_fetch_array($stall_result, MYSQLI_BOTH))
  {
    print "\n";
    print "$row[stall_name] -- $row[affordability]";
  }
print "</pre></br></br>";

print "The following monsters are found here (type, weight, height): ";
$monster_query = "SELECT monster_type, weight, height FROM fantasyWorld.monster WHERE region_id=$region_id";
$monster_result = mysqli_query($conn, $monster_query) or die(mysqli_error($conn));

print "<pre>";
while($row = mysqli_fetch_array($monster_result, MYSQLI_BOTH))
  {
    print "\n";
    print "$row[monster_type] -- $row[weight] lbs -- $row[height] ft.";
  }
print "</pre></br></br>";

mysqli_free_result($regname_result);
mysqli_free_result($stall_result);
mysqli_free_result($monster_result);

mysqli_close($conn);
?>


<br>
<button onclick="location.href='finalProjectMaxTerry.html'">Home Screen</button>
<button onclick="location.href='lookupRegion.html'">Lookup Another</button>

</hr>
</body>
</html>