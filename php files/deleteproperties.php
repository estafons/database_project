<!DOCTYPE html>
<html>
<body>
<form action="deleteproperties.php" method="get">
PropertyRegistrationNo:<br>
<input type="text" name="PropertyRegistrationNo" required>
<br>
<input type="submit" value="Ok">
</form> 
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
$PropertyRegistrationNo1=0;
if(isset($_GET['PropertyRegistrationNo'])){
	$PropertyRegistrationNo1=intval($_GET['PropertyRegistrationNo']);
if ($PropertyRegistrationNo1!=0){
$sql = "DELETE FROM properties WHERE PropertyRegistrationNo=$PropertyRegistrationNo1";}


if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}
}
$conn->close();
?> 
</body>
</html>