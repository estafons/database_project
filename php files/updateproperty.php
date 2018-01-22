<!DOCTYPE html>
<html>
<body>
<h1>Specify the PropertyRegistrationNo of the property you want to Update and the new attributes</h1>
 <form action="updateproperty.php" method="get">
PropertyRegistrationNo:<br>
<input type="text" name="PropertyRegistrationNo"required>
<br>
New Address Street Name:<br>
<input type="text" name="Addr_StreetName">
<br>
New Address Street Number:<br>
<input type="text" name="Addr_StreetNo">
<br>
New Address Postal Code:<br>
<input type="text" name="Addr_Postalcode">
<br>
New Floor<br>
<input type="text" name="Floor">
<br>
New Size:<br>
<input type="text" name="Size">
<br>
New Rent:<br>
<input type="text" name="Rent">
<br>
New TypeID(1 to 5):<br>
<input type="text" name="PropertyTypeID"required>
<br>
New ownersAFM:<br>
<input type="text" name="ownersAFM">
<br>
New Manager AFM:<br>
<input type="text" name="ManagerAFM">
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
$sql=null;
if(isset($_GET['PropertyRegistrationNo'])){$PropertyRegistrationNo=intval($_GET['PropertyRegistrationNo']);
$sql = "UPDATE properties SET PropertyRegistrationNo='$PropertyRegistrationNo1' WHERE PropertyRegistrationNo=$PropertyRegistrationNo1;";}
if(isset($_GET['Addr_StreetName'])and ($_GET['Addr_StreetName']!="")){$Addr_StreetName=$_GET['Addr_StreetName'];
$sql .= "UPDATE properties SET addr_streetname='$Addr_StreetName' WHERE PropertyRegistrationNo=$PropertyRegistrationNo1;";}
if(isset($_GET['Addr_StreetNo'])and ($_GET['Addr_StreetNo']!=0)){$Addr_StreetNo=intval($_GET['Addr_StreetNo']);
$sql .= "UPDATE properties SET addr_streetno='$Addr_StreetNo' WHERE PropertyRegistrationNo=$PropertyRegistrationNo1;";}
if(isset($_GET['Addr_Postalcode'])and ($_GET['Addr_Postalcode']!=0)){$Addr_Postalcode=intval($_GET['Addr_Postalcode']);
$sql .= "UPDATE properties SET addr_postalcode='$Addr_Postalcode' WHERE PropertyRegistrationNo=$PropertyRegistrationNo1;";}
if(isset($_GET['Floor'])and ($_GET['Floor']!=0)){$Floor=intval($_GET['Floor']);
$sql .= "UPDATE properties SET Floor='$Floor' WHERE PropertyRegistrationNo=$PropertyRegistrationNo1;";}
if(isset($_GET['PropertyTypeID'])){$PropertyTypeID=$_GET['PropertyTypeID'];
	$sql .= "UPDATE properties SET PropertyTypeID='$PropertyTypeID' WHERE PropertyRegistrationNo=$PropertyRegistrationNo1;";
}

if(isset($_GET['ownersAFM'])) {
	$ownersAFM=$_GET['ownersAFM'];
	$sql1 = "SELECT AFM FROM owners WHERE AFM= $ownersAFM";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows<=0)
	   echo "There is no such owner";
	else {
		$sql .= "UPDATE properties SET ownersAFM='$ownersAFM' WHERE PropertyRegistrationNo=$PropertyRegistrationNo1;";
		 if(isset($_GET['ManagerAFM'])){ 
			$ManagerAFM=$_GET['ManagerAFM'];
			$sql2 = "SELECT AFM FROM employees WHERE AFM= $ManagerAFM";
			$result2 = $conn->query($sql2);
			if ($result2->num_rows<=0)
				echo "There is no such owner";
			else {
				$sql .= "UPDATE properties SET ManagerAFM='$ManagerAFM' WHERE PropertyRegistrationNo=$PropertyRegistrationNo1;";
				if ($conn->query($sql) === TRUE) {
					echo "record updated successfully";
				} 
				else {
					echo "Error: " . $sql . "<br>" . $conn->error;
				}
			}
		}
	}
}
$conn->close();
?>
</body>
</html>