<?php

include('connectionData.txt');

$conn = mysqli_connect($server, $user, $pass, $dbname, $port)
or die('Error connecting to MySQL server.');

?>

<html>
<head>
  <title>Find Citizens</title>
  </head>
  
  <body bgcolor="white">
  
  
  <hr>
  
  
<?php
  
$citizen = $_POST['citizen'];

$citizen = mysqli_real_escape_string($conn, $citizen);
// this is a small attempt to avoid SQL injection
// better to use prepared statements

$query = "SELECT * FROM fantasyWorld.citizen";
#$query = $query."'".$citizen."';";

?>

<p>
The query:
<p>
<?php
print $query;
?>

<hr>
<p>
Result of query:
<p>

<?php
$result = mysqli_query($conn, $query)
or die(mysqli_error($conn));

print "<pre>";
while($row = mysqli_fetch_array($result, MYSQLI_BOTH))
  {
    print "\n";
    print "$row[firstName]  $row[lastName] $row[birthday]";
  }
print "</pre>";

mysqli_free_result($result);

mysqli_close($conn);

?>

<p>
<hr>

<p>
<a href="findOrdersCust.txt" >Contents</a>
of the PHP program that created this page. 	 
 
</body>
</html>
	  