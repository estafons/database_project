<!DOCTYPE html>
<html>
<body>
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
?>
<script src="jump.js"></script>
<h1>Which table to delete from?</h1>
<form>
<input type="radio" name="querytype" value="deleteemployees">Employees
<br>
<input type="radio" name="querytype" value="deletebusinessowners">Business Owners
<br>
<input type="radio" name="querytype" value="deleteclients">Clients
<br>
<input type="radio" name="querytype" value="deleteclientphones">Client Phones
<br>
<input type="radio" name="querytype" value="deleteowners">Owners
<br>
<input type="radio" name="querytype" value="deletecontracts">Contracts
<br>
<input type="radio" name="querytype" value="deleteprivateowners">Private Owners
<br>
<input type="radio" name="querytype" value="deleteownersphones">Owners Phones
<br>
<input type="radio" name="querytype" value="deleteproperties">Properties
<br>
<!--<input type="radio" name="querytype" value="deletepropertytypes">Propertie types
<br>-->
<input type="radio" name="querytype" value="deletenewspapers">Newspapers
<br>
<input type="button" onclick="jump()" value="Ok">
</form>
</body>
</html>