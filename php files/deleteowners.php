<!DOCTYPE html>
<html>
<body>
<script src="jump.js"></script>
<h1> Give AFM of Owner you want to delete. </h1>
<form action="deleteowners.php" method="get">
AFM:<br>
<input type="text" name="AFM" required>
<br>
<input type="submit" value="Ok">
</form> 
<form>
<h2> Specify the kind of owner.</h2>
<input type="radio" name="querytype" value="deletebusinessowners">Business
<br>
<input type="radio" name="querytype" value="deleteprivateowners">Private
<br>
<input type="button" onclick="jump()" value="Ok">
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
$sql = "DELETE FROM owners WHERE AFM=$AFM;";
$sql .= "DELETE FROM ownersphones WHERE AFM=$AFM";
if ($AFM!=0){
if ($conn->multi_query($sql) === TRUE) {
    echo "Record deleted successfully now specify business or private to procede";
} else {
    echo "Error deleting record: " . $conn->error;
}
}
$conn->close();
?> 