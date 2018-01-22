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
//$AFM=0;
//if(isset($_GET['AFM'])){$AFM=intval($_GET['AFM']);}
//if ($AFM!=0){
$sql = "SELECT privateowners.AFM, privateowners.Firstname as fname, privateowners.Lastname as lname, ownersphones.PhoneNumber as Phnumber FROM ownersphones INNER JOIN privateowners ON privateowners.AFM=ownersphones.AFM; ";
$result = $conn->query($sql);
if ($result->num_rows>0){
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "FirstName: " . $row["fname"] . "LastName " . $row["lname"] . "PhoneNumber: " . $row["Phnumber"] . "<br>";
    }
} else {
    echo "0 results";
}

	$conn->close();
?> 

</body>
</html>