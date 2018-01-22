<!DOCTYPE html>
<html>
<body>
<h1>Specify the NewspaperID of the newspaper you want to Update and the new attributes</h1>
 <form action="updatenewspaper.php" method="get">
New NewspaperID:<br>
<input type="text" name="NewspaperID"required>
<br>
New NewspaperName:<br>
<select>
  <option value="xrusieukairia">xrusieukairia</option>
  <option value="tanea)">tanea</option>
  <option value="ekoikiastis">enoikiastis</option>
  <option value="tovima">tovima</option>
  <option value="kathimerini">kathimerini</option>
  <option value="eleutherotypia">eleutherotypia</option>
</select>
<br>
New PropertyRegistrationNo:<br>
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

$sql=null;
if(isset($_GET['NewsPaperName'])and ($_GET['NewsPaperName']!=0)){$NewsPaperName=intval($_GET['NewsPaperName']);
$sql .= "UPDATE properties SET NewspaperID='$NewspaperID' WHERE NewspaperID=$NewspaperID1;";}
if(isset($_GET['PropertyRegistrationNo'])){
	$PropertyRegistrationNo=intval($_GET['PropertyRegistrationNo']);
	$sql1 = "SELECT PropertyRegistrationNo FROM properties WHERE PropertyRegistrationNo= $PropertyRegistrationNo";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows<=0)
	   echo "There is no such property";
	else {
		$sql = "UPDATE newspaper SET PropertyRegistrationNo='$PropertyRegistrationNo1' WHERE PropertyRegistrationNo=$PropertyRegistrationNo1;";
		if ($conn->query($sql) === TRUE) {
					echo "record updated successfully";
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