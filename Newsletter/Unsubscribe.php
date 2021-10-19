<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unsubscribe</title>
</head>
<body>
    <p>Please enter the email for which you want to unsubscribe:<br><br></p>
    <form action="Unsubscribe.php" method="POST">
        <label>Enter Your Email:</label>
        <input type="text"id="emailentered" name="emailentered" value=""/><br>
        <input type="submit" name=submit value="Submit"/> 
    </form> 

<?php 
 
$user = "user_name";  
$password = "password";  
$host = "host_name";  
$dbase = "database_name";  
$table = "table_name";  
 
 
$email_entered= $_POST['emailentered']; 

 
$from= 'support@learningaboutelectronics.com'; 
 
$subject= $_POST['subject']; 
$body= $_POST['body']; 
 
// Connection to DBase  
$dbc= mysqli_connect($host,$user,$password, $dbase)  
or die("Unable to select database"); 
 
 
$query="DELETE FROM email_list WHERE email='$email_entered'"; 
$result= mysqli_query ($dbc, $query);
echo("<p>You have successfully unsubscribed from this newsletter.</p>") 
or die ('Error querying database.'); 
 
 
mysqli_close($dbc); 
?> 
</body>
</html>