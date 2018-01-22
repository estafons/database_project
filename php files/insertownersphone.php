<!DOCTYPE html>
<html>
<body>
 <form action="insertownersphone.php" method="get">
AFM:<br>
<input type="text" name="AFM"required>
<br>
Owners Phone number:<br>
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
$AFM=0;
if(isset($_GET['AFM'])){$AFM=intval($_GET['AFM']);}
if(isset($_GET['PhoneNumber'])){$PhoneNumber=intval($_GET['PhoneNumber']);}
if ($AFM!=0){
$sql = "INSERT INTO ownersphones(AFM,PhoneNumber)
VALUES ('$AFM','$PhoneNumber')";
$sql1 = "SELECT AFM FROM owners WHERE AFM=$AFM";
$result =$conn->query($sql1);
if ($result->num_rows<=0)
	echo "there is no such owner registered";
else{
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