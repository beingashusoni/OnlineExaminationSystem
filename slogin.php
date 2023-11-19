<?php
session_start();
if(isset($_SESSION["email"])){
session_destroy();
}
include_once 'dbConnection.php';
$re=@$_GET['s'];
$email = $_POST['email'];
$password = $_POST['password'];

$email = stripslashes($email);
$email = addslashes($email);
$password = stripslashes($password); 
$password = addslashes($password);
$password=md5($password); 
$resul = mysqli_query($con,"SELECT name FROM staff WHERE email = '$email' and password = '$password'") or die('Error');
$count=mysqli_num_rows($resul);
if($count==1){
while($row = mysqli_fetch_array($resul)) {
	$name = $row['name'];
}
$_SESSION["name"] = $name;
$_SESSION["email"] = $email;
header("location:staffaccount.php?q=0");
}
else
header("location:index.php?w=Wrong Username or Password");
?>