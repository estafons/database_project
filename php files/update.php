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
<h1>Which table do you want to update?</h1>
<form>
<input type="radio" name="querytype" value="updateemployees">Employees
<br>
<input type="radio" name="querytype" value="updatebusinessowners">Business Owners
<br>
<input type="radio" name="querytype" value="updateclients">Clients
<br>
<input type="radio" name="querytype" value="updateclientphones">Client Phones
<br>
<input type="radio" name="querytype" value="updateowners">Owners
<br>
<input type="radio" name="querytype" value="updatecontracts">Contracts
<br>
<input type="radio" name="querytype" value="updateprivateowners">Private Owners
<br>
<input type="radio" name="querytype" value="updateproperties">Properties
<br>
<!--<input type="radio" name="querytype" value="updatepropertytypes">Propertie types
<br>-->
<input type="radio" name="querytype" value="updatenewspapers">Newspapers
<br>
<input type="radio" name="querytype" value="updateownersphones">Owner Phones
<br>
<input type="button" onclick="jump()" value="Ok">
</form>
</body>
</html>