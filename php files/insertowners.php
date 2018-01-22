<!DOCTYPE html>
<html>
<body>
<script src="jump.js"></script>
 <form action="insertowners.php" method="get">
AFM:<br>
<input type="text" name="AFM" required>
<br>
 Address Street Name:<br>
<input type="text" name="Addr_Street_Name" required>
<br>
Address Street Number:<br>
<input type="text" name="Addr_Street_No" required>
<br><br>
Address Postal Code:<br>
<input type="text" name="Addr_Postal_Code" required>
<br>
Owners Phone number:<br>
<input type="text" name="PhoneNumber" >
<br>
<input type="submit" value="Ok">
</form> 
<form>
<h2> Specify the kind of owner.</h2>
<input type="radio" name="querytype" value="insertbusinessowners">Business
<br>
<input type="radio" name="querytype" value="insertprivateowners">Private
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
if(isset($_GET['Addr_Street_Name'])){$Addr_Street_Name=$_GET['Addr_Street_Name'];}
if(isset($_GET['Addr_Street_No'])){$Addr_Street_No=intval($_GET['Addr_Street_No']);}
if(isset($_GET['Addr_Postal_Code'])){$Addr_Postal_Code=intval($_GET['Addr_Postal_Code']);}
if(isset($_GET['PhoneNumber'])){$PhoneNumber=intval($_GET['PhoneNumber']);}
if ($AFM!=0){
$sql = "INSERT INTO owners(AFM,Addr_streetname,Addr_streetno, Addr_postalcode)
VALUES ('$AFM','$Addr_Street_Name','$Addr_Street_No','$Addr_Postal_Code');";
$sql .= "INSERT INTO ownersphones(AFM,PhoneNumber)
VALUES ('$AFM','$PhoneNumber');";
if ($conn->multi_query($sql) === TRUE) {
    echo "New record created successfully specify business or private to procede";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
$conn->close();
?>
</body>
</html>