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
$maxrent1= intval($_GET['maxrent1']);
$postalcode1= intval($_GET['postalcode1']);
$sql = "SELECT DISTINCT ClientRegistrationNo,addr_postalcode FROM clients WHERE addr_postalcode= $postalcode1 and ClientRegistrationNo in(SELECT ClientRegistrationNo FROM clients WHERE MaxRent>$maxrent1);";
$result = $conn->query($sql);
echo "clients that can afford apartment's with the given rent and postal code  around theirs <br>";
if ($result->num_rows>0){
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo " - ClientRegistrationNo: " . $row["ClientRegistrationNo"] . " " . "-Lives in district with Postal code " . $row["addr_postalcode"] . "<br>";
    }
} else {
    echo "0 results";
}
	$conn->close();
?> 

</body>
</html>