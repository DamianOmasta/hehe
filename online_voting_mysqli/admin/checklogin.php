<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Ankiety</title>
<link href="css/admin_styles.css" rel="stylesheet" type="text/css" />
</head>
<body bgcolor="tan">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<center><b><font class="display-3" color = "brown" size="6">System tworzenia ankiet</font></b></center><br>
<body>
<div id="page">
<div id="header">
<h1>Podano nieprawidłowe dane uwierzytelniające </h1>
<p align="center">&nbsp;</p>
</div>
<div id="container">
<?php
ini_set ("display_errors", "1");
error_reporting(E_ALL);

ob_start();
session_start();
require('../connection.php');

$tbl_name="tbadministrators";

$myusername=$_POST['myusername'];
$mypassword=$_POST['mypassword'];

$encrypted_mypassword=($mypassword);

$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);

$sql=mysqli_query($con, "SELECT * FROM tbadministrators WHERE email='$myusername' and password='$mypassword'");
$count = mysqli_num_rows($sql);

// Jeśli nazwa użytkownika i hasło pasują do siebie, bedzie 1
if($count)
{
// Jeśli wszystko się powiedzie, zostaniesz przekierowany do admin.php

  $user=mysqli_fetch_assoc($sql); 
  $_SESSION['admin_id'] = $user['admin_id'];
  header("location:admin.php");
}
else {
  echo "Zły login lub hasło<br><br>Wróc do <a href=\"login.html\">ekranu logowania</a>";
  }
  
ob_end_flush();
?> 
</div>
<div id="footer"> 
  <div class="bottom_addr"></div>
</div>
</div>
</body>
</html>