<!DOCTYPE html>
<html>
<body>
 <form action="updateclientphone.php" method="get">
Client Registration Number:<br>
<input type="text" name="ClientRegistrationNo">
<br>
Client Phone number:<br>
<input type="text" name="PhoneNumber">
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
if(isset($_GET['ClientRegistrationNo'])and($_GET['ClientRegistrationNo']!=0)){$ClientRegistrationNo=intval($_GET['ClientRegistrationNo']);
$sql = "UPDATE clientphones SET ClientRegistrationNo='$ClientRegistrationNo' WHERE ClientRegistrationNo=$ClientRegistrationNo;";}
if(isset($_GET['PhoneNumber'])and($_GET['PhoneNumber']!="")){$PhoneNumber=($_GET['PhoneNumber']);
$sql .= "UPDATE clientphones SET PhoneNumber='$PhoneNumber' WHERE ClientRegistrationNo=$ClientRegistrationNo;";}
$sql1 = "SELECT ClientRegistrationNo FROM clients WHERE ClientRegistrationNo=$ClientRegistrationNo";
if ($ClientRegistrationNo!=0){
$result =$conn->query($sql1);
if ($result->num_rows<=0)
	echo "there is no such client registered";
else{
if ($conn->multi_query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
}
}
$conn->close();
?> 
</body>
</html>
