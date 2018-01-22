<!DOCTYPE html>
<html>
<body>
 <form action="insertclient.php" method="get">
ClientRegistrationNo:<br>
<input type="text" name="ClientRegistrationNo"required>
<br>
First name:<br>
<input type="text" name="firstname"required>
<br>
Last name:<br>
<input type="text" name="lastname"required>
<br><br>
Address Street Name:<br>
<input type="text" name="Addr_StreetName"required>
<br>
Address Street Number:<br>
<input type="text" name="Addr_StreetNo"required>
<br>
Address Postal Code:<br>
<input type="text" name="Addr_Postalcode"required>
<br>
MaxRent:<br>
<input type="text" name="MaxRent"required>
<br>
RegistrationDate:<br>
<input type="text" name="RegistrationDate"required>
<br>
PropertyTypeID:<br>
<input type="text" name="PropertyTypeID">
<br>
RegisteredBy(Employee AFM):<br>
<input type="text" name="RegisteredBy(Employee AFM)">
<br>
Client Phone number:<br>
<input type="text" name="PhoneNumber" >
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
$ClientRegistrationNo=0;
if(isset($_GET['ClientRegistrationNo'])){$ClientRegistrationNo=intval($_GET['ClientRegistrationNo']);}
if(isset($_GET['Firstname'])){$Firstname=($_GET['Firstname']);}
if(isset($_GET['Lastname'])){$Lastname=$_GET['Lastname'];}
if(isset($_GET['Addr_StreetName'])){$Addr_StreetName=$_GET['Addr_StreetName'];}
if(isset($_GET['Addr_StreetNo'])){$Addr_StreetNo=intval($_GET['Addr_StreetNo']);}
if(isset($_GET['Addr_Postalcode'])){$Addr_Postalcode=intval($_GET['Addr_Postalcode']);}
if(isset($_GET['MaxRent'])){$MaxRent=intval($_GET['MaxRent']);}
if(isset($_GET['RegistrationDate'])){$RegistrationDate=intval($_GET['RegistrationDate']);}
if(isset($_GET['PropertyTypeID'])){$PropertyTypeID=intval($_GET['PropertyTypeID']);}
if(isset($_GET['RegisteredBy'])){$RegisteredBy=intval($_GET['RegisteredBy']);}
if(isset($_GET['PhoneNumber'])){$PhoneNumber=intval($_GET['PhoneNumber']);}


if($ClientRegistrationNo!=0){

$sql1 = "SELECT AFM FROM employees WHERE RegisteredBy= $RegisteredBy";
$result1 = $conn->query($sql1);
if ($result1->num_rows<=0)
	   echo "There is no such employee in our company";
else {
		
		$sql2 = "SELECT PropertyTypeID FROM propertytypes WHERE PropertyTypeID= $PropertyTypeID";
		$result2 = $conn->query($sql2);
		if ($result2->num_rows<=0)
			echo "There is not such PropertyTypeID for the existing properties"; 
		else {

			$sql = "INSERT INTO clients(ClientRegistrationNo,Firstname, Lastname, addr_streetname,addr_streetno,addr_postalcode,MaxRent,RegistrationDate,PropertyTypeID,RegisteredBy)
			VALUES ('$ClientRegistrationNo','$Firstname','$Lastname','$Addr_StreetName','$Addr_StreetNo','$Addr_Postalcode','$MaxRent','$RegistrationDate','$PropertyTypeID','$RegisteredBy');";
			$sql .= "INSERT INTO Clientphones(ClientRegistrationNo,PhoneNumber)
			VALUES ('$ClientRegistrationNo','$PhoneNumber');";
			if ($conn->multi_query($sql) === TRUE) {
				echo "New record created successfully";
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
		}
}
}
$conn->close();
?>
</body>
</html>