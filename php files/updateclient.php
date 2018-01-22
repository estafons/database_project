<!DOCTYPE html>
<html>
<body>
<h1>Specify the ClientRegistrationNo of the client you want to Update and the new attributes</h1>
 <form action="updateclient.php" method="GET">
ClientRegistrationNo:<br>
<input type="text" name="ClientRegistrationNo"required>
<br>
New First name:<br>
<input type="text" name="Firstname">
<br>
New Last name:<br>
<input type="text" name="Lastname">
<br><br>
New Address Street Name:<br>
<input type="text" name="Addr_StreetName">
<br>
New Address Street Number:<br>
<input type="text" name="Addr_StreetNo">
<br>
New Address Postal Code:<br>
<input type="text" name="Addr_Postalcode">
<br>
New MaxRent:<br>
<input type="text" name="MaxRent">
<br>
New RegistrationDate:<br>
<input type="text" name="RegistrationDate">
<br>
New PropertyTypeID:<br>
<input type="text" name="PropertyTypeID">
<br>
New RegisteredBy(Employee AFM):<br>
<input type="text" name="RegisteredBy(Employee AFM)">
<br>
<input type="submit" value="Ok">
New Client Phone number:<br>
<input type="text" name="New PhoneNumber" >
<br>
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
if(isset($_GET['ClientRegistrationNo'])){$ClientRegistrationNo1=intval($_GET['ClientRegistrationNo']);
$sql = "UPDATE clients SET ClientRegistrationNo='$ClientRegistrationNo1' WHERE ClientRegistrationNo=$ClientRegistrationNo1;";}
if(isset($_GET['Firstname'])and ($_GET['Firstname']!="")){$Firstname=($_GET['Firstname']);
$sql .= "UPDATE clients SET firstname='$firstname' WHERE ClientRegistrationNo=$ClientRegistrationNo1;";}
if(isset($_GET['lastname'])and ($_GET['lastname']!="")){$lastname=$_GET['lastname'];//buggarei??
$sql .= "UPDATE clients SET lastname='$lastname' WHERE ClientRegistrationNo=$ClientRegistrationNo1;";}
if(isset($_GET['Addr_StreetName'])and ($_GET['Addr_StreetName']!="")){$Addr_StreetName=$_GET['Addr_StreetName'];
$sql .= "UPDATE clients SET addr_streetname='$Addr_StreetName' WHERE ClientRegistrationNo=$ClientRegistrationNo1;";}
if(isset($_GET['Addr_StreetNo'])and ($_GET['Addr_StreetNo']!=0)){$Addr_StreetNo=intval($_GET['Addr_StreetNo']);
$sql .= "UPDATE clients SET addr_streetno='$Addr_StreetNo' WHERE ClientRegistrationNo=$ClientRegistrationNo1;";}
if(isset($_GET['Addr_Postalcode'])and ($_GET['Addr_Postalcode']!=0)){$Addr_Postalcode=intval($_GET['Addr_Postalcode']);
$sql .= "UPDATE clients SET addr_postalcode='$Addr_Postalcode' WHERE ClientRegistrationNo=$ClientRegistrationNo1;";}
if(isset($_GET['MaxRent'])and ($_GET['MaxRent']!=0)){$MaxRent=intval($_GET['MaxRent']);
$sql .= "UPDATE clients SET MaxRent='$MaxRent' WHERE ClientRegistrationNo=$ClientRegistrationNo1;";}
if(isset($_GET['RegistrationDate'])and ($_GET['RegistrationDate']!=0)){$RegistrationDate=intval($_GET['RegistrationDate']);
$sql .= "UPDATE clients SET RegistrationDate='$RegistrationDate' WHERE ClientRegistrationNo=$ClientRegistrationNo1;";}

if(isset($_GET['PropertyTypeID'])){
	$PropertyTypeID=intval($_GET['PropertyTypeID']);
	$sql2 = "SELECT PropertyTypeID FROM propertytypes WHERE PropertyTypeID= $PropertyTypeID";
	$result2 = $conn->query($sql2);
	if ($result2->num_rows<=0)
		echo "There is not such PropertyTypeID for the existing properties"; 
	else {
		$sql .= "UPDATE clients SET PropertyTypeID='$PropertyTypeID' WHERE ClientRegistrationNo=$ClientRegistrationNo1;";}
}

if(isset($_GET['RegisteredBy'])){
	$RegisteredBy=intval($_GET['RegisteredBy']);
	$sql1 = "SELECT AFM FROM employees WHERE RegisteredBy= $RegisteredBy";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows<=0)
		echo "There is no such employee in our company";
	else {
		$sql .= "UPDATE clients SET RegisteredBy='$RegisteredBy' WHERE ClientRegistrationNo=$ClientRegistrationNo1;";}
}

if(isset($_GET['PhoneNumber'])and ($_GET['PhoneNumber']!=0)){$PhoneNumber=intval($_GET['PhoneNumber']);
$sql .= "UPDATE clientphones SET PhoneNumber='$PhoneNumber' WHERE ClientRegistrationNo=$ClientRegistrationNo1;";}

if ($sql!=null){
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