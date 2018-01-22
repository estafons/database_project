<!DOCTYPE html>
<html>
<body>
 <form action="insertproperty.php" method="get">
PropertyRegistrationNo:<br>
<input type="text" name="PropertyRegistrationNo"required>
<br>
Address Street Name:<br>
<input type="text" name="Addr_StreetName"required>
<br>
Address Street Number:<br>
<input type="text" name="Addr_StreetNo"required>
<br>
Address Postal Code:<br>
<input type="text" name="Addr_Postalcode"required>
<br>
Floor<br>
<input type="text" name="Floor"required>
<br>
Size:<br>
<input type="text" name="Size"required>
<br>
Rent:<br>
<input type="text" name="Rent"required>
<br>
TypeID(1 to 5):<br>
<input type="text" name="PropertyTypeID"required>
<br>
ownersAFM:<br>
<input type="text" name="ownersAFM"required>
<br>
Manager AFM:<br>
<input type="text" name="ManagerAFM"required>
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
$PropertyRegistrationNo=0;
if(isset($_GET['PropertyRegistrationNo'])){$PropertyRegistrationNo=intval($_GET['PropertyRegistrationNo']);}
if(isset($_GET['Addr_StreetName'])and ($_GET['Addr_StreetName']!="")){$Addr_StreetName=$_GET['Addr_StreetName'];}
if(isset($_GET['Addr_StreetNo'])and ($_GET['Addr_StreetNo']!=0)){$Addr_StreetNo=intval($_GET['Addr_StreetNo']);}
if(isset($_GET['Addr_Postalcode'])and ($_GET['Addr_Postalcode']!=0)){$Addr_Postalcode=intval($_GET['Addr_Postalcode']);}
if(isset($_GET['Floor'])){$Floor=$_GET['Floor'];}
if(isset($_GET['Size'])){$Size=$_GET['Size'];}
if(isset($_GET['Rent'])){$Rent=$_GET['Rent'];}
if(isset($_GET['PropertyTypeID'])){
	$PropertyTypeID=$_GET['PropertyTypeID'];
	
}
if(isset($_GET['ownersAFM'])) {
	$ownersAFM=$_GET['ownersAFM'];
	$sql1 = "SELECT AFM FROM owners WHERE AFM= $ownersAFM";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows<=0)
	   echo "There is no such owner";
	else {
		 if(isset($_GET['ManagerAFM'])){ 
			$ManagerAFM=$_GET['ManagerAFM'];
			$sql2 = "SELECT AFM FROM employees WHERE AFM= $ManagerAFM";
			$result2 = $conn->query($sql2);
			if ($result2->num_rows<=0)
				echo "There is no such owner";
			else {
				$sql = "INSERT INTO properties(PropertyRegistrationNo, addr_streetname,addr_streetno,addr_postalcode,PropertyTypeID,floor,size,Rent,ownersAFM,ManagerAFM)
				VALUES ('$PropertyRegistrationNo','$Addr_StreetName','$Addr_StreetNo','$Addr_Postalcode','$PropertyTypeID','$Floor','$Size','$Rent','$ownersAFM','$ManagerAFM')";
				if ($conn->query($sql) === TRUE) {
					echo "New record created successfully";
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
<</body>
<</html>