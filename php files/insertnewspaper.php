<!DOCTYPE html>
<html>
<body>
 <form action="insertnewspaper.php" method="get">
NewspaperID:<br>
<input type="text" name="NewspaperID"required>
<br>
NewspaperName:<br>
<select>
  <option value="xrusieukairia">xrusieukairia</option>
  <option value="tanea)">tanea</option>
  <option value="ekoikiastis">enoikiastis</option>
  <option value="tovima">tovima</option>
  <option value="kathimerini">kathimerini</option>
  <option value="eleutherotypia">eleutherotypia</option>
</select>
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
$NewspaperID=0;
if(isset($_GET['NewspaperID'])){$NewspaperID=intval($_GET['NewspaperID']);}
if(isset($_GET['NewsPaperName'])){$NewsPaperName=intval($_GET['NewsPaperName']);}
if(isset($_GET['PropertyRegistrationNo'])){
	$PropertyRegistrationNo=intval($_GET['PropertyRegistrationNo']);
	$sql1 = "SELECT PropertyRegistrationNo FROM properties WHERE PropertyRegistrationNo= $PropertyRegistrationNo";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows<=0)
	   echo "There is no such property";
	else {
				$sql = "INSERT INTO newspapers(NewspaperID,NewsPaperName,PropertyRegistrationNo)
				VALUES ('$NewspaperID','$NewsPaperName','$PropertyRegistrationNo')";
				if ($conn->query($sql) === TRUE) {
					echo "New record created successfully";
				} 
				else {
					echo "Error: " . $sql . "<br>" . $conn->error;
				}
			}
}
	

$conn->close();
?>
</body>
</html>