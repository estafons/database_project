<!DOCTYPE html>
<html>
<body>
<h1> Give AFM of Owner you want to delete his phone registration. </h1>
<form action="deleteownersphone.php" method="get">
AFM:<br>
<input type="text" name="AFM" required>
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
$sql = "DELETE FROM ownersphones WHERE AFM=$AFM";
$sql1 = "SELECT AFM FROM owners WHERE AFM=$AFM";
$result =$conn->query($sql1);
if ($AFM!=0){
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