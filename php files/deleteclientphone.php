<!DOCTYPE html>
<html>
<body>
<h1> Give Registration Number of Client you want to delete his phone registration. </h1>
<form action="deleteclientphone.php" method="get">
Client Registration Number:<br>
<input type="text" name="ClientRegistrationNo" required>
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
$ClientRegistrationNo=0;
if(isset($_GET['ClientRegistrationNo'])){$ClientRegistrationNo=intval($_GET['ClientRegistrationNo']);}
$sql = "DELETE FROM clientphones WHERE ClientRegistrationNo=$ClientRegistrationNo";
$sql1 = "SELECT ClientRegistrationNo FROM clients WHERE ClientRegistrationNo=$ClientRegistrationNo";
$result =$conn->query($sql1);
if ($ClientRegistrationNo!=0){
if ($result->num_rows<=0)
	echo "there is no such client registered";
else{
if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}
}
}
$conn->close();
?> 