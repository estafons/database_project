<!DOCTYPE html>
<html>
<body>
 <form action="updateprivateowners.php" method="get">
AFM:<br>
<input type="text" name="AFM"required>
<br>
 Firstname:<br>
<input type="text" name="firstname">
<br>
Lastname:<br>
<input type="text" name="lastname">
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
$sql = "UPDATE owners SET AFM='$AFM' WHERE AFM=$AFM;";}
if(isset($_GET['firstname'])and($_GET['firstname']!="")){$firstname=($_GET['firstname']);
$sql .= "UPDATE owners SET Addr_streetname='$firstname' WHERE AFM=$AFM;";}
if(isset($_GET['lastname'])and($_GET['lastname']!="")){$lastname=($_GET['lastname']);
$sql .= "UPDATE owners SET Addr_streetno='$lastname' WHERE AFM=$AFM;";}
if($AFM!=0){
$sql1 = "SELECT AFM FROM owners WHERE AFM=$AFM";
$result =$conn->query($sql1);
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
