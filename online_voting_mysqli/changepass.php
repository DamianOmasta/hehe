<?php
session_start();
require('connection.php');

if(empty($_SESSION['member_id'])){
 header("location:access-denied.php");
} 
//pobierz dane usera z tbmembers
$result=mysqli_query($con, "SELECT * FROM tbmembers WHERE member_id = '$_SESSION[member_id]'");
if (mysqli_num_rows($result)<1){
    $result = null;
}
$row = mysqli_fetch_array($result);
if($row)
 {
 // bier dane z bazy
 $stdId = $row['member_id']; 
  $encpass= $row['password'];
}
?>
<?php

if (isset($_POST['changepass'])){
$myId =  $_REQUEST['id'];
$oldpass = ($_POST['oldpass']);
$newpass = $_POST['newpass'];
$conpass = $_POST['conpass'];
if($encpass == $oldpass)
{
  if($newpass == $conpass)
  {
    $newpassword = ($newpass);
    $sql = mysqli_query($con,"UPDATE tbmembers SET password='$newpassword' WHERE member_id = '$myId'" );
    echo "<script>alert('Password Change')</script>";
  }
  else
  {
    echo "<script>alert('New and Confirm Password Not Match')</script>";
  }

}
else
{
    echo "<script>alert('Old password not match')</script>";
}

}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>System ankiet</title>
<link href="css/user_styles.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="js/user.js">
</script>
</head>
<body bgcolor="tan">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<center><b><font class="display-3" color = "brown" size="6">System tworzenia ankiet</font></b></center><br>
<div id="page">
<div id="header">
<b><font color = "brown" size="6">Zarządzaj hasłem</font></b><br>
  <a href="student.php">Strona główna</a> | <a href="vote.php">Obecne ankiety</a> | <a href="manage-profile.php">Zarządzaj profilem</a> | <a href="changepass.php">Zmień hasło</a>| <a href="logout.php">Wyloguj się</a>
</div>
<div id="container">
<table border="0" width="620" align="center">
<br><center><font class="lead" color = "brown" >Zmień hasło</font></center><br>
<form action="changepass.php?id=<?php echo $_SESSION['member_id']; ?>" method="post">
<table align="center">
<tr><td>Stare hasło:</td><td><input type="password" class="form-control" name="oldpass" maxlength="15" value=""></td></tr>
<tr><td>Nowe hasło:</td><td><input type="password" class="form-control" name="newpass" maxlength="15" value=""></td></tr>
<tr><td>Powtórz hasło:</td><td><input type="password" class="form-control" name="conpass" maxlength="15" value=""></td></tr>
<tr><td>&nbsp;</td></td><td><input type="submit" class="btn btn-success" name="changepass" value="Zaaktualizuj hasło"></td></tr>
</table>
</form>
<hr>
</div>
<div id="footer"> 
  <div class="bottom_addr"></div>
</div>
</div>
</body>
</html>