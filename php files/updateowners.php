<!DOCTYPE html>
<html>
<body>
<script src="jump.js"></script>
 <form action="updateowners.php" method="get">
AFM:<br>
<input type="text" name="AFM" required>
<br>
 Address Street Name:<br>
<input type="text" name="Addr_Street_Name">
<br>
Address Street Number:<br>
<input type="text" name="Addr_Street_No">
<br><br>
Address Postal Code:<br>
<input type="text" name="Addr_Postal_Code">
<br>
Owners Phone number:<br>
<input type="text" name="PhoneNumber">
<br>
<input type="submit" value="Ok">
</form> 
<form>
<h2> Specify the kind of owner.</h2>
<input type="radio" name="querytype" value="updateprivateowners">Private
<br>
<input type="radio" name="querytype" value="updatebusinessowners">Business
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
$sql=null;
$AFM=0;
if(isset($_GET['AFM'])and($_GET['AFM']!=0)){$AFM=intval($_GET['AFM']);
$sql = "UPDATE owners SET AFM='$AFM' WHERE AFM=$AFM;";}
if(isset($_GET['Addr_Street_Name'])and($_GET['Addr_Street_Name']!="")){$Addr_Street_Name=($_GET['Addr_Street_Name']);
$sql .= "UPDATE owners SET Addr_streetname='$Addr_Street_Name' WHERE AFM=$AFM;";}
if(isset($_GET['Addr_Street_No'])and($_GET['Addr_Street_No']!=0)){$Addr_Street_No=intval($_GET['Addr_Street_No']);
$sql .= "UPDATE owners SET Addr_streetno='$Addr_Street_No' WHERE AFM=$AFM;";}
if(isset($_GET['Addr_Postal_Code'])and($_GET['Addr_Postal_Code']!=0)){$Addr_Postal_Code=intval($_GET['Addr_Postal_Code']);
$sql .= "UPDATE owners SET Addr_postalcode='$Addr_Postal_Code' WHERE AFM=$AFM;";}
if(isset($_GET['PhoneNumber'])and($_GET['PhoneNumber']!=0)){$PhoneNumber=intval($_GET['PhoneNumber']);
$sql .= "UPDATE ownersphones SET PhoneNumber='$PhoneNumber' WHERE AFM=$AFM;";}
if (($sql!=null)and($AFM!=0)){
if ($conn->multi_query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
}
$conn->close();
?> 
</body>
</html>
