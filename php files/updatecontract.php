<!DOCTYPE html>
<html>
<body>
<h1>Specify the ContractNo of the contract you want to Update and the new attributes</h1>
 <form action="updatecontract.php" method="GET">
ContractNo:<br>
<input type="text" name="ContractNo">
<br>
PaymentType:<br>
<input type="text" name="PaymentType">
<br>
Rent:<br>
<input type="text" name="Rent">
<br>
RentStart:<br>
<input type="text" name="RentStart">
<br><br>
RentFinish<br>
<input type="text" name="RentFinish">
<br>
ClientRegistrationNo:<br>
<input type="text" name="ClientRegistrationNo">
<br>
PropertyRegistrationNo:<br>
<input type="text" name="PropertyRegistrationNo">
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
if(isset($_GET['ContractNo'])){$ContractNo1=intval($_GET['ContractNo']);
$sql = "UPDATE contracts SET ContractNo='$ContractNo1' WHERE ContractNo=$ContractNo1;";}
if(isset($_GET['PaymentType'])and ($_GET['PaymentType']!=0)){$PaymentType=intval($_GET['PaymentType']);
$sql .= "UPDATE contracts SET PaymentType='$PaymentType' WHERE ContractNo=$ContractNo1;";}
if(isset($_GET['Rent'])and ($_GET['Rent']!="")){$Rent=($_GET['Rent']);
$sql .= "UPDATE contracts SET Rent='$Rent' WHERE ContractNo=$ContractNo1;";}
if(isset($_GET['RentStart'])and ($_GET['RentStart']!="")){$lastname=$_GET['RentStart'];//buggarei??
$sql .= "UPDATE contracts SET RentStart='$RentStart' WHERE ContractNo=$ContractNo1;";}
if(isset($_GET['RentFinish'])and ($_GET['RentFinish']!="")){$RentFinish=$_GET['RentFinish'];
$sql .= "UPDATE contracts SET RentFinish='$RentFinish' WHERE ContractNo=$ContractNo1;";}
if(isset($_GET['ClientRegistrationNo'])and ($_GET['ClientRegistrationNo']!=0)){
	$ClientRegistrationNo=intval($_GET['ClientRegistrationNo']);
	$sql1 = "SELECT ClientRegistrationNo FROM clients WHERE ClientRegistrationNo= $ClientRegistrationNo";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows<=0)
	   echo "There is no such client in our company";
	else {
		$sql .= "UPDATE contracts SET ClientRegistrationNo='$ClientRegistrationNo' WHERE ContractNo=$ContractNo1;";}
		
	if(isset($_GET['PropertyRegistrationNo'])){
		$PropertyRegistrationNo=intval($_GET['PropertyRegistrationNo']);
		$sql2 = "SELECT PropertyRegistrationNo FROM properties WHERE PropertyRegistrationNo= $PropertyRegistrationNo";
		$result2 = $conn->query($sql2);
		if ($result2->num_rows<=0)
			echo "There is not such PropertyRegistrationNo for the existing properties"; 
		else {
				$sql .= "UPDATE contracts SET PropertyRegistrationNoe='$PropertyRegistrationNo' WHERE ContractNo=$ContractNo1;";
			}
	}
			
			
	   
}
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