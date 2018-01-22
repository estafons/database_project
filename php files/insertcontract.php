<!DOCTYPE html>
<html>
<body>
 <form action="insertemployee.php" method="get">
ContractNo:<br>
<input type="text" name="ContractNo"required>
<br>
PaymentType:<br>
<input type="text" name="PaymentType"required>
<br>
Rent:<br>
<input type="text" name="Rent"required>
<br>
RentStart:<br>
<input type="text" name="RentStart"required>
<br><br>
RentFinish<br>
<input type="text" name="RentFinish"required>
<br>
ClientRegistrationNo:<br>
<input type="text" name="ClientRegistrationNo"required>
<br>
PropertyRegistrationNo:<br>
<input type="text" name="PropertyRegistrationNo"required>
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
$ContractNo=0;
if(isset($_GET['ContractNo'])){$ContractNo=intval($_GET['ContractNo']);}
if(isset($_GET['PaymentType'])){$PaymentType=intval($_GET['PaymentType']);}
if(isset($_GET['Rent'])){$Rent=($_GET['Rent']);}
if(isset($_GET['RentStart'])){$RentStart=$_GET['RentStart'];}
if(isset($_GET['RentFinish'])){$RentFinish=$_GET['RentFinish'];}
if(isset($_GET['ClientRegistrationNo'])){
	$ClientRegistrationNo=intval($_GET['ClientRegistrationNo']);
	$sql1 = "SELECT ClientRegistrationNo FROM clients WHERE ClientRegistrationNo= $ClientRegistrationNo";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows<=0)
	   echo "There is no such client in our company";
	else {
	   if(isset($_GET['PropertyRegistrationNo'])){
			$PropertyRegistrationNo=intval($_GET['PropertyRegistrationNo']);
		$sql2 = "SELECT PropertyRegistrationNo FROM properties WHERE PropertyRegistrationNo= $PropertyRegistrationNo";
		$result2 = $conn->query($sql2);
		if ($result2->num_rows<=0)
			echo "There is not such PropertyRegistrationNo for the existing properties"; 
		else {
				$sql = "INSERT INTO contracts(ContractNo,PaymentType,Rent, RentStart,RentFinish, ClientRegistrationNo,PropertyRegistrationNo)
				VALUES ('$ContractNo','$PaymentType','$Rent','$RentStart,'$RentFinish','$ClientRegistrationNo','$PropertyRegistrationNo')";
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
</body>
</html>