<!DOCTYPE html>
<html>
<body>
<h1>Specify the AFM of the employee you want to Update and the new attributes</h1>
 <form action="updateemployee.php" method="GET">
AFM:<br>
<input type="text" name="AFM"required>
<br>
New Employee Number:<br>
<input type="text" name="EmployeeNo">
<br>
 New First name:<br>
<input type="text" name="firstname">
<br>
New Last name:<br>
<input type="text" name="lastname">
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
New Salary:<br>
<input type="text" name="Salary">
<br>
New Work Phonenumber:<br>
<input type="text" name="WorkphoneNumber">
<br>
New Mobile Phonenumber:<br>
<input type="text" name="MobilePhonenumber">
<br>
New Supervisor AFM:<br>
<input type="text" name="SupervisorAFM">
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
if(isset($_GET['AFM'])){$AFM1=intval($_GET['AFM']);
$sql = "UPDATE employees SET AFM='$AFM1' WHERE AFM=$AFM1;";}
if(isset($_GET['EmployeeNo'])and ($_GET['EmployeeNo']!=0)){$employeeNo=intval($_GET['EmployeeNo']);
$sql .= "UPDATE employees SET employeeNo='$employeeNo' WHERE AFM=$AFM1;";}
if(isset($_GET['firstname'])and ($_GET['firstname']!="")){$firstname=($_GET['firstname']);
$sql .= "UPDATE employees SET firstname='$firstname' WHERE AFM=$AFM1;";}
if(isset($_GET['lastname'])and ($_GET['lastname']!="")){$lastname=$_GET['lastname'];
$sql .= "UPDATE employees SET lastname='$lastname' WHERE AFM=$AFM1;";}
if(isset($_GET['Addr_StreetName'])and ($_GET['Addr_StreetName']!="")){$Addr_StreetName=$_GET['Addr_StreetName'];
$sql .= "UPDATE employees SET addr_streetname='$Addr_StreetName' WHERE AFM=$AFM1;";}
if(isset($_GET['Addr_StreetNo'])and ($_GET['Addr_StreetNo']!=0)){$Addr_StreetNo=intval($_GET['Addr_StreetNo']);
$sql .= "UPDATE employees SET addr_streetno='$Addr_StreetNo' WHERE AFM=$AFM1;";}
if(isset($_GET['Addr_Postalcode'])and ($_GET['Addr_Postalcode']!=0)){$Addr_Postalcode=intval($_GET['Addr_Postalcode']);
$sql .= "UPDATE employees SET addr_postalcode='$Addr_Postalcode' WHERE AFM=$AFM1;";}
if(isset($_GET['Salary'])and ($_GET['Salary']!=0)){$Salary=intval($_GET['Salary']);
$sql .= "UPDATE employees SET salary='$Salary' WHERE AFM=$AFM1;";}
if(isset($_GET['WorkphoneNumber'])and ($_GET['WorkphoneNumber']!=0)){$WorkphoneNumber=intval($_GET['WorkphoneNumber']);
$sql .= "UPDATE employees SET workphonenumber='$WorkphoneNumber' WHERE AFM=$AFM1;";}
if(isset($_GET['MobilePhonenumber'])and ($_GET['MobilePhonenumber']!=0)){$MobilePhonenumber=intval($_GET['MobilePhonenumber']);
$sql .= "UPDATE employees SET mobilephonenumber='$MobilePhonenumber' WHERE AFM=$AFM1;";}
if(isset($_GET['SupervisorAFM'])and(intval($_GET['SupervisorAFM'!=""]))){$SupervisorAFM=intval($_GET['SupervisorAFM']);
$sql1 = "SELECT AFM FROM employees WHERE AFM=$SupervisorAFM";
$result =$conn->query($sql1);
if ($result->num_rows<=0)
	echo "there is no such employee who supervises in our company";
else{
$sql .="UPDATE employees SET SupervisorAFM='$supervisorAFM' WHERE AFM=$AFM1;";
if ($sql!=null){
if ($conn->multi_query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
}
}
}
$conn->close();
?> 
</body>
</html>