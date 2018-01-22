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
$rent1= intval($_GET['rent1']);
$sql = "SELECT Count(PropertyRegistrationNo) as count_per_floor, Size, Floor, Rent FROM properties where Rent<$rent1 group by floor ;";
$result = $conn->query($sql);
if ($result->num_rows>0){
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "appartments per floor: " . $row["count_per_floor"] . "-floor " . $row["Floor"] . "<br>";
    }
} else {
    echo "0 results";
}
	$conn->close();
?> 

</body>
</html>