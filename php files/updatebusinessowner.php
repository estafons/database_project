<!DOCTYPE html>
<html>
<body>
 <form action="updatebusinessowner.php" method="get">
AFM:<br>
<input type="text" name="AFM"required>
<br>
 Business Name:<br>
<input type="text" name="BusinessName">
<br>
Business Type:<br>
<input type="text" name="BusinessType">
<br><br>
Contact First Name:<br>
<input type="text" name="ContactFirstName">
<br>
Contact Last Name:<br>
<input type="text" name="ContactLastName">
<br>
<input type="submit" value="Ok">
</form> 
<?php
$servername = "localhost";
$username = "root";
$password = "s122885";
$dbname = "ideal_house";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$AFM=0;
if(isset($_GET['AFM'])and($_GET['AFM']!=0)){$AFM=intval($_GET['AFM']);
$sql = "UPDATE businessowners SET AFM='$AFM' WHERE AFM=$AFM;";}
if(isset($_GET['BusinessName'])and($_GET['BusinessName']!="")){$BusinessName=($_GET['BusinessName']);
$sql .= "UPDATE businessowners SET BusinessName='$BusinessName' WHERE AFM=$AFM;";}
if(isset($_GET['BusinessType'])and($_GET['BusinessType']!="")){$BusinessType=($_GET['BusinessType']);
$sql .= "UPDATE businessowners SET BusinessType='$BusinessType' WHERE AFM=$AFM;";}
if(isset($_GET['ContactFirstName'])and($_GET['ContactFirstName']!="")){$ContactFirstName=$_GET['ContactFirstName'];
$sql .= "UPDATE businessowners SET ContactFirstName='$ContactFirstName' WHERE AFM=$AFM;";}
if(isset($_GET['ContactLastName'])and($_GET['ContactLastName']!="")){$ContactLastName=$_GET['ContactLastName'];
$sql .= "UPDATE businessowners SET ContactLastName='$ContactLastName' WHERE AFM=$AFM;";}
$sql1 = "SELECT AFM FROM owners WHERE AFM=$AFM";
if($AFM!=0){
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
