<!DOCTYPE html>
<html>
<body>
 <form action="insertbusinessowners.php" method="get">
AFM:<br>
<input type="text" name="AFM" required>
<br>
 Business Name:<br>
<input type="text" name="Businessname" required>
<br>
Business Type:<br>
<input type="text" name="Businesstype" required>
<br><br>
Contact First Name:<br>
<input type="text" name="ContactfirstName" required>
<br>
Contact Last Name:<br>
<input type="text" name="ContactlastName" required>
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
if(isset($_GET['Businessname'])){$Businessname=($_GET['Businessname']);}
if(isset($_GET['Businesstype'])){$Businesstype=($_GET['Businesstype']);}
if(isset($_GET['ContactfirstName'])){$ContactfirstName=$_GET['ContactfirstName'];}
if(isset($_GET['ContactlastName'])){$ContactlastName=$_GET['ContactlastName'];}
if ($AFM!=0){
$sql = "INSERT INTO BusinessOwners(AFM,BusinessName,BusinessType, ContactFirstName, ContactLastName)
VALUES ('$AFM','$Businessname','$Businesstype','$ContactfirstName','$ContactlastName')";
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