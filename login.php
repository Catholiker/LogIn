<?php
session_start();
if(isset($_POST['email'])){
include_once 'dbconnect.php';
$email=$_POST['email'];
$pass=$_POST['pass'];

$sql="select * from `register` where `email`='$email' AND `status`='1'";
$record=mysql_query($sql);
$counts=mysql_num_rows($record);
while($row = mysql_fetch_assoc($record)){
   $hash=$row['hash'];
   $name=$row['name'];
}
$password=$hash.$pass;
$password=md5($password);

$sql1="select * from `register` where `email`='$email' AND `password`='$password' AND `status`='1'";
$record1=mysql_query($sql1);
$count=mysql_num_rows($record1);

if($count >= 1){
   $_SESSION['UNameEmail']=$email;
   $_SESSION['UNameName']=$name;
   header("location:home.php");
}else{
if($counts >= 1){
   $_SESSION['WrongPassword']="Wrong Password.";
   header("location:index.php");
   }else{
   $_SESSION['NotRegister']="Not Register.";
   header("location:register.php");
   }
}
}
?>