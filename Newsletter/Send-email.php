<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Email</title>
</head>
<body>
<form action="Send-email.php" method="post"> 
    <label>Subject of email:</label><br>
    <input type="text" name="subject" id="subject"/><br> 
    <label>Body of email:</label><br>
    <textarea cols="35" rows="10" name="Comments"><br>
    <input type="submit" name=submit value="Submit"/> 
</form> 

<?php 
 
$user = "user_name";  
$password = "password";  
$host = "host_name";  
$dbase = "database_name";  
$table = "table_name";  
 
$from= 'email_to_be_sent_from';//specify here the address that you want email to be sent from 
 
$subject= $_POST['subject']; 
$body= $_POST['body']; 
 
// Connection to DBase  
$dbc= mysqli_connect($host,$user,$password, $dbase)  
or die("Unable to select database"); 
 
$query= "SELECT * FROM $table"; 
$result= mysqli_query ($dbc, $query)  
or die ('Error querying database.'); 
 
while ($row = mysqli_fetch_array($result)) { 
$first_name= $row['first_name']; 
$last_name= $row['last_name']; 
$email= $row['email']; 
 
$msg= "Dear $first_name $last_name,\n$body"; 
mail($email, $subject, $msg, 'From:' . $from); 
echo 'Email sent to: ' . $email. '<br>'; 
} 
 
mysqli_close($dbc); 
?> 
</body>
</html>