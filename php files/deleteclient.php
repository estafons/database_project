<!DOCTYPE html>
<html>
<body>
<form action="deleteclient.php" method="get">
ClientRegistrationNo:<br>
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
$ClientRegistrationNo1=0;
if(isset($_GET['ClientRegistrationNo'])){$ClientRegistrationNo1=intval($_GET['ClientRegistrationNo']);}
if ($ClientRegistrationNo1!=0){
$sql = "DELETE FROM clients WHERE ClientRegistrationNo=$ClientRegistrationNo1;";
$sql .="DELETE FROM clientphones WHERE ClientRegistrationNo=$ClientRegistrationNo1;";
if ($conn->multi_query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}
}
$conn->close();
?> 