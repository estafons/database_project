<!DOCTYPE html>
<html>
<body>
 <form action="insertclientphone.php" method="get">
Client Registration Number:<br>
<input type="text" name="ClientRegistrationNo"required>
<br>
Client Phone number:<br>
<input type="text" name="PhoneNumber"required>
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
if(isset($_GET['PhoneNumber'])){$PhoneNumber=intval($_GET['PhoneNumber']);}
$sql = "SELECT ClientRegistrationNo FROM clients WHERE ClientRegistrationNo=$ClientRegistrationNo";
$result =$conn->query($sql);
if ($ClientRegistrationNo!=0){
if ($result->num_rows<=0)
	echo "there is no such client registered";
else{
$sql = "INSERT INTO Clientphones(ClientRegistrationNo,PhoneNumber)
VALUES ('$ClientRegistrationNo','$PhoneNumber')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
}
$conn->close();
?>
</body>
</html>