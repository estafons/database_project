<!DOCTYPE html>
<html>
<body>
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
//$sql = "CREATE VIEW clientssperemployee as SELECT RegisteredBy as AFM, COUNT(RegisteredBy) as total FROM clients GROUP BY RegisteredBy ;";
//if ($conn->query($sql) === TRUE){
echo "Number of clients registered per employee <br>";
	$sql1= "select * from clientssperemployee;";
    $result1 = $conn->query($sql1);
	if ($result1->num_rows>0){
	// output data of each row
    while($row = $result1->fetch_assoc()) {
        echo " - Employees AFM: " . $row["AFM"] . " " . "-number of clients " . $row["total"] . "<br>";
    }
}
 else {
    echo "0 results";
}
	$conn->close();
?> 

</body>
</html>