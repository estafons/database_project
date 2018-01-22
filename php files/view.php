<!DOCTYPE html>
<html>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "s122885";
$dbname = "idealhouse";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "CREATE VIEW employeeinfo as SELECT AFM, firstname, lastname, salary;";
$dbname->QueryArray($sql);
echo "view created succesfully <br>";
	$conn->close();
?> 

</body>
</html>