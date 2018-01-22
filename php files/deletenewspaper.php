<!DOCTYPE html>
<html>
<body>
<form action="deletenewspaper.php" method="get">
NewspaperID:<br>
<input type="text" name="NewspaperID" required>
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
$NewspaperID=0;
$NewspaperID1=0;
if(isset($_GET['NewspaperID'])){
	$NewspaperID1=intval($_GET['NewspaperID']);
if ($NewspaperID!=0){
$sql = "DELETE FROM newspapers WHERE NewspaperID=$NewspaperID1";
}

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}
}
$conn->close();
?> 
