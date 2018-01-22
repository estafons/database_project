<!DOCTYPE html>
<html>
<body>
 <form action="insertemployee.php" method="get">
AFM:<br>
<input type="text" name="AFM"required>
<br>
Employee Number:<br>
<input type="text" name="EmployeeNo"required>
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
Salary:<br>
<input type="text" name="Salary"required>
<br>
Work Phonenumber:<br>
<input type="text" name="WorkphoneNumber"required>
<br>
Mobile Phonenumber:<br>
<input type="text" name="MobilePhonenumber"required>
<br>
Supervisor AFM:<br>
<input type="text" name="SupervisorAFM"required>
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
$AFM=0;
$SupervisorAFM=0;
if(isset($_GET['AFM'])){$AFM=intval($_GET['AFM']);}
if(isset($_GET['EmployeeNo'])and ($_GET['EmployeeNo']!=0)){$employeeNo=intval($_GET['EmployeeNo']);}
if(isset($_GET['firstname'])and ($_GET['firstname']!="")){$firstname=($_GET['firstname']);}
if(isset($_GET['lastname'])and ($_GET['lastname']!="")){$lastname=$_GET['lastname'];}
if(isset($_GET['Addr_StreetName'])and ($_GET['Addr_StreetName']!="")){$Addr_StreetName=$_GET['Addr_StreetName'];}
if(isset($_GET['Addr_StreetNo'])and ($_GET['Addr_StreetNo']!=0)){$Addr_StreetNo=intval($_GET['Addr_StreetNo']);}
if(isset($_GET['Addr_Postalcode'])and ($_GET['Addr_Postalcode']!=0)){$Addr_Postalcode=intval($_GET['Addr_Postalcode']);}
if(isset($_GET['Salary'])and ($_GET['Salary']!=0)){$Salary=intval($_GET['Salary']);}
if(isset($_GET['WorkphoneNumber'])and ($_GET['WorkphoneNumber']!=0)){$WorkphoneNumber=intval($_GET['WorkphoneNumber']);}
if(isset($_GET['MobilePhonenumber'])and ($_GET['MobilePhonenumber']!=0)){$MobilePhonenumber=intval($_GET['MobilePhonenumber']);}
if(isset($_GET['SupervisorAFM'])){$SupervisorAFM=intval($_GET['SupervisorAFM']);

$sql = "SELECT AFM FROM employees WHERE AFM=$SupervisorAFM";
$result =$conn->query($sql);
if ($result->num_rows<=0)
	echo "there is no such employee who supervises in our company";
else{
if($AFM!=0){
$sql = "INSERT INTO employees(AFM,employeeNo,firstname, lastname, addr_streetname,addr_streetno,addr_postalcode,salary,workphonenumber,mobilephonenumber, SupervisorAFM)
VALUES ('$AFM','$employeeNo','$firstname','$lastname','$Addr_StreetName','$Addr_StreetNo','$Addr_Postalcode','$Salary','$WorkphoneNumber','$MobilePhonenumber', '$SupervisorAFM')";
if ($conn->query($sql) === TRUE) {
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