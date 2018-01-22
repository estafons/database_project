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
$salary1= intval($_GET['salary1']);
$sql = "SELECT avg(salary) as average_salary, Addr_postalcode FROM employees group by Addr_postalcode having average_salary>$salary1 ;";
$result = $conn->query($sql);
if ($result->num_rows>0){
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "average salary per district: " . $row["average_salary"] . "-postalcode " . $row["Addr_postalcode"] . "<br>";
    }
} else {
    echo "0 results";
}
	$conn->close();
?> 

</body>
</html>