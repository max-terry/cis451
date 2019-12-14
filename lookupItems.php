<?php

include('connectionData.txt');

$conn = mysqli_connect($server, $user, $pass, $dbname, $port)
or die('Error connecting to MySQL server.');
?>

<html>
<body>
<hr>

<?php
$item_price = $_POST['item_price'];
$item_price = mysqli_escape_string($conn, $item_price);
print "The items that cost less than or equal to $item_price gold pieces are as follows (item, cost, description, stall name, stall owner):<br>";
$query = "SELECT item_name, cost, description, stall_name, first_name, last_name FROM fantasyWorld.items JOIN fantasyWorld.stall USING(stall_id) 
			JOIN fantasyWorld.merchant USING(citizen_id) JOIN fantasyWorld.citizen USING(citizen_id)
			WHERE cost<=$item_price";

$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

print "<pre>";
while($row = mysqli_fetch_array($result, MYSQLI_BOTH))
  {
    print "\n";
    print "$row[item_name] -- $row[cost] gold pieces -- $row[description] -- Sold at: $row[stall_name] -- Owned by: $row[first_name] $row[last_name]";
  }
print "</pre>";

mysqli_free_result($result);

mysqli_close($conn);
?>


<br>
<button onclick="location.href='finalProjectMaxTerry.html'">Home Screen</button>
<button onclick="location.href='lookupItems.html'">Lookup Another</button>

</hr>
</body>
</html>