<!DOCTYPE html>
<html>
<body>
<form action="deleteemployee.php" method="get">
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
$AFM1=0;
if(isset($_GET['AFM'])){$AFM1=intval($_GET['AFM']);}
if ($AFM1!=0){
$sql = "DELETE FROM employees WHERE afm=$afm1";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}
}
$conn->close();
?> 