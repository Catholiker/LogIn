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
   echo"<script type='text/javascript'>alert('Wrong Password. Please Enter Valid Password...')</script>";
   }
}
}
?>
<!DOCTYPE >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Coding Cage - Login and Registration System</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>

<!--<center>-->

<div id="login-form">

    <form method="post">

        <table align="center" width="30%" border="0">
              <tr>
			  <td>
			  <?php
if(isset($_SESSION['UNameEmail']) && $_SESSION['UNameEmail']=="Register Successfully." ){ ?>
<h2>Registration Successfully ! Please Login. </h2>
<?php } $_SESSION['UNameEmail']=""; ?>



 </td>
</tr>
            <tr>
            <td><input type="text" name="email" placeholder="Your Email" required /></td>
            </tr>
            <tr>
            <td><input type="password" name="pass" placeholder="Your Password" required /></td>
            </tr>
            <tr>
            <td><button type="submit" name="btn-login">Sign In</button></td>
            </tr>
            <tr>
            <td><a href="register.php">Sign Up Here</a></td>
            </tr>
        </table>
    </form>
</div>

<!--<center>-->

</body>
</html>
