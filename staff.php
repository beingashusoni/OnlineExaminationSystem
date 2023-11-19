<?php
include_once 'dbConnection.php';
ob_start();
$name = $_POST['name'];
$name= ucwords(strtolower($name));
$email = $_POST['email'];
$gender = $_POST['gender'];
$mobile = $_POST['mobile'];
$branch = $_POST['branch'];
$password = $_POST['password'];
$name = stripslashes($name);
$name = addslashes($name);
$name = ucwords(strtolower($name));
$email = stripslashes($email);
$email = addslashes($email);
$gender = stripslashes($gender);
$gender = addslashes($gender);
$mobile = stripslashes($mobile);
$mobile = addslashes($mobile);
$branch = stripslashes($branch);
$branch = addslashes($branch);
$password = stripslashes($password);
$password = addslashes($password);
$password = md5($password);

$s=mysqli_query($con,"INSERT INTO staff VALUES  ('$name' , '$email' , '$gender'  , '$mobile' ,'$branch', '$password')");
if($s)
{
session_start();
$_SESSION["email"] = $email;
$_SESSION["name"] = $name;

header("location:dash.php?q=8");
}
else
{
header("location:dash.php?q0=Already Registered!!!");
}
ob_end_flush();
?>