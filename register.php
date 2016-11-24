<?php
session_start();
if(isset($_POST['uname'])){
include_once 'dbconnect.php';
$uname=$_POST['uname'];
$email=$_POST['email'];
$pass=$_POST['pass'];
$date=date("Y-m-d");
$re=rand(10e16, 10e20);
$hash=base_convert($re, 10, 36);
$newpass=$hash.$pass;
$newpass=md5($newpass);

$sql="insert into `register`(`id`,`name`,`email`,`password`,`hash`,`date`,`status`) VALUES('0','$uname','$email','$newpass','$hash','$date','1')";
mysql_query($sql);
$_SESSION['UNameEmail']="Register Successfully.";
header("location:index.php");
}
?>
<!DOCTYPE html">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> Login & Registration System</title>
<link rel="stylesheet" href="style.css" type="text/css" />

</head>
<body>
<center>
<div id="login-form">
<form method="post">
<table align="center" width="30%" border="0">
<tr>
<td><input type="text" name="uname" placeholder="User Name" required /></td>
</tr>
<tr>
<td><input type="email" name="email" placeholder="Your Email" required /></td>
</tr>
<tr>
<td><input type="password" name="pass" placeholder="Your Password" required /></td>
</tr>
<tr>
<td><button type="submit" name="btn-signup">Sign Me Up</button></td>
</tr>
<tr>
<td><a href="index.php">Sign In Here</a></td>
</tr>
</table>
</form>
</div>
</center>
</body>
</html>