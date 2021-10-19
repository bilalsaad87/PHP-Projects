<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NewsLetter</title>
</head>
<body>
<fieldset> 
<legend>Sign up for Newsletter</legend> 
<form action="Newsletter-signup.php" method="post"> 
    <label>First Name:</label> 
    <input type="text" name="firstname" id="firstname"/><br><br> 
    <label>Last Name:</label> 
    <input type="text" name="lastname" id="lastname"/><br><br> 
    <label>Email:</label> 
    <input type="text" name="email" id="email"/><br> 
    <input type="submit" name=submit value="Submit"/> 
</form> 
</fieldset> 
<?php 
//Here Sign Up to DBase
$user = "user_name";  
$password = "password";  
$host = "host_name";  
$dbase = "database_name";  
$table = "table_name";  
 
$first_name= $_POST['firstname']; 
$last_name= $_POST['lastname']; 
$email= $_POST['email']; 
  
  
// Connection to DBase  
$dbc= mysqli_connect($host,$user,$password, $dbase)  
or die("Unable to select database"); 
 
 
$query= "INSERT INTO $table  ". "VALUES ('$first_name', '$last_name', '$email')"; 
 
mysqli_query ($dbc, $query) 
or die ("Error querying database"); 
 
echo 'You have been successfully added.' . '<br>'; 
 
mysqli_close($dbc); 
 
?>    
</body>
</html>