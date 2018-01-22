<!DOCTYPE html>
<html>
<body>
<form action="deletecontracts.php" method="get">
ContractNo:<br>
<input type="text" name="ContractNo" required>
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
if(isset($_GET['ContractNo'])){$ContractNo1=intval($_GET['ContractNo']);
	if ($ContractNo1!=0){
		$sql = "DELETE FROM contracts WHERE ContractNo=$ContractNo1";
	}

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}
}
$conn->close();
?> 