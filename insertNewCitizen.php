<?php

include('connectionData.txt');

$conn = mysqli_connect($server, $user, $pass, $dbname, $port)
or die('Error connecting to MySQL server.');
?>

<html>
<body>
<hr>

<?php
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$birthday = $_POST['birthday'];
$first_name = mysqli_real_escape_string($conn, $first_name);
$last_name = mysqli_escape_string($conn, $last_name);
$birthday = mysqli_escape_string($conn, $birthday);

$query = "INSERT INTO fantasyWorld.citizen (first_name,last_name,birthday) VALUES ('$first_name','$last_name','$birthday')";

$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

echo "Inserted the following values:";
echo "<br/>";
echo "First Name: $first_name";
echo "<br/>";
echo "Last Name: $last_name";
echo "<br/>";
echo "Birthday: $birthday";

mysqli_free_result($result);

mysqli_close($conn);
?>
<br>
<button onclick="location.href='finalProjectMaxTerry.html'">Home Screen</button>
<button onclick="location.href='insertNewCitizen.html'">Insert Another</button>

</hr>
</body>
</html>