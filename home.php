<?php
session_start();
if(isset($_SESSION['UNameEmail']) && ($_SESSION['UNameName'])){
include_once 'dbconnect.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome - <?php echo $_SESSION['UNameName']; ?></title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
<div id="header">
	<div id="left">
    <label>Coding Cage</label>
    </div>
    <div id="right">
    	<div id="content">
        	hi' <?php echo $_SESSION['UNameName']; ?>&nbsp;<a href="logout.php">Sign Out</a>
        </div>
    </div>
</div>

<div id="body">
	<a href=""> Program</a><br /><br />
    <p>Velkommen</p>
</div>

</body>
</html>
<?php }else{
header("location:register.php");
}
?>