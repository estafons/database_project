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
<h1>Which table to insert to?</h1>
<form>
<input type="radio" name="querytype" value="insertemployees">Employees
<br>
<input type="radio" name="querytype" value="insertclients">Clients
<br>
<input type="radio" name="querytype" value="insertownersphones">Owner Phones
<br>
<input type="radio" name="querytype" value="insertbusinessowners">Business Owners
<br>
<input type="radio" name="querytype" value="insertclientphones">Client Phones
<br>
<input type="radio" name="querytype" value="insertowners">Owners
<br>
<input type="radio" name="querytype" value="insertcontracts">Contracts
<br>
<input type="radio" name="querytype" value="insertprivateowners">Private Owners
<br>
<input type="radio" name="querytype" value="insertproperties">Properties
<br>
<!--<input type="radio" name="querytype" value="insertpropertytypes">Propertie types
<br>-->
<input type="radio" name="querytype" value="insertnewspapers">Newspapers
<br>
<input type="button" onclick="jump()" value="Ok">
</form>
</body>
</html>