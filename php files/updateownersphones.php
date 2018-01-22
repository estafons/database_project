<!DOCTYPE html>
<html>
<body>
 <form action="updateownersphones.php" method="get">
AFM:<br>
<input type="text" name="AFM"required>
<br>
Owners Phone number:<br>
<input type="text" name="PhoneNumber">
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
if(isset($_GET['AFM'])and($_GET['AFM']!=0)){$AFM=intval($_GET['AFM']);
$sql = "UPDATE ownersphones SET AFM='$AFM' WHERE AFM=$AFM;";}
if(isset($_GET['PhoneNumber'])and($_GET['PhoneNumber']!="")){$PhoneNumber=($_GET['PhoneNumber']);
$sql .= "UPDATE ownersphones SET PhoneNumber='$PhoneNumber' WHERE AFM=$AFM;";}
$sql1 = "SELECT AFM FROM owners WHERE AFM=$AFM";
$result =$conn->query($sql1);
if($AFM!=0){
if ($result->num_rows<=0)
	echo "there is no such owner registered";
else{
if ($conn->multi_query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
}
}
$conn->close();
?> 
</body>
</html>
