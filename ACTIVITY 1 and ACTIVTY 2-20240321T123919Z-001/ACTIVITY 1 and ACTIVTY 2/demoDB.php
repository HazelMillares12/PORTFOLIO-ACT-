<?php
//This variable stores the hostname of mysql server.
$serverName = "localhost";

//This variable stores the username used to connect to the MySQL database.
$user = "root";

//This variable stores the pass used to connect to the MySQL database.
$pass = "";

//This variable stores the name of the database yo want to connect to within the MySQL server.
$databaseName = "Activity3";

//Establishing the connection between php and your database
$conn = new mysqli($serverName, $user, $pass, $databaseName);

//Checking the connection if its successfully established or not
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);

}
//echo "Connection Established!";

?>

<?php 

//PASSING THE DATA FROM HTML TO PHP AND STORE IT IN VARIABLES

if (isset($_POST['submit'])) {

$first_name = $_POST['firstname'];

$last_name = $_POST['lastname'];

$age = $_POST['age'];

$address = $_POST['address'];

$contact = $_POST['contact'];

$birthday = $_POST['birthday'];

//INSERT DATA TO DATABASE
$sql = "INSERT INTO `masocolInfo`(`firstname`, `lastname`, `age`, `address`, `contact`, `birthday`) VALUES ('$first_name','$last_name','$age','$address','$contact','$birthday')";

$result = $conn->query($sql);

if ($result == TRUE) {

  echo "New record created successfully.";

}else{

  echo "Error:". $sql . "<br>". $conn->error;

} 

}
$sql = "SELECT * FROM masocolInfo";

$result = $conn->query($sql);
$conn->close(); 

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h2>Student Profile</h2>

<form action="" method="POST">

<fieldset>
    <legend>Student Information</legend>

    First Name:<br>
    <input type="text" name="firstname"><br>

    Last Name:<br>
    <input type="text" name="lastname"><br>

    Age:<br>
    <input type="text" name="age"><br>

    Address:<br>
    <input type="text" name="address"><br>

    Contact Number:<br>
    <input type="number" name="contact"><br>

    Birthdate:<br>
    <input type="date" name="birthday"><br>

    <input type="submit" name="submit" value="submit">
 
</fieldset>

</form>
    
</body>
</html>