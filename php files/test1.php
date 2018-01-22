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
$salary1= intval($_GET['salarytest']);
$sql = "SELECT AFM, firstname, lastname FROM employees WHERE salary> $salary1";
$result = $conn->query($sql);
if ($result->num_rows>0){
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "AFM: " . $row["AFM"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    }
} else {
    echo "0 results";
}
	$conn->close();
?> 

</body>
</html>