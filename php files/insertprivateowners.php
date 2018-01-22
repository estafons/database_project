<!DOCTYPE html>
<html>
<body>
 <form action="insertprivateowners.php" method="get">
AFM:<br>
<input type="text" name="AFM"required>
<br>
 Firstname:<br>
<input type="text" name="firstname"required>
<br>
Lastname:<br>
<input type="text" name="lastname"required>
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
if(isset($_GET['firstname'])){$firstname=$_GET['firstname'];}
if(isset($_GET['lastname'])){$lastname=$_GET['lastname'];}
if ($AFM!=0){
$sql = "INSERT INTO privateowners(AFM,Firstname,Lastname)
VALUES ('$AFM','$firstname','$lastname')";
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