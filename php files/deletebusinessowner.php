<!DOCTYPE html>
<html>
<body>
<h1> Give AFM of Business Owner you want to delete. </h1>
<form action="deletebusinessowner.php" method="get">
AFM:<br>
<input type="text" name="AFM">
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
if(isset($_GET['AFM'])and($_GET['AFM']!=0))$AFM=intval($_GET['AFM']);
$sql = "DELETE FROM BusinessOwners WHERE AFM=$AFM";
$sql1 = "SELECT AFM FROM owners WHERE AFM=$AFM";
if($AFM!=0){
$result =$conn->query($sql1);
if ($result->num_rows<=0)
	echo "there is no such owner registered";
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