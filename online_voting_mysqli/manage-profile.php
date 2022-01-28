<?php
session_start();
require('connection.php');
if(empty($_SESSION['member_id'])){
 header("location:access-denied.php");
} 
//pobierz dane z tabeli tbmembers
$result=mysqli_query($con, "SELECT * FROM tbmembers WHERE member_id = '$_SESSION[member_id]'");
if (mysqli_num_rows($result)<1){
    $result = null;
}
$row = mysqli_fetch_array($result);
if($row)
 {
 $stdId = $row['member_id'];
 $firstName = $row['first_name'];
 $lastName = $row['last_name'];
 $email = $row['email'];
 }
?>
<?php
if (isset($_POST['update'])){
$myId = addslashes( $_GET[id]);
$myFirstName = addslashes( $_POST['firstname'] );
$myLastName = addslashes( $_POST['lastname'] );
$myEmail = $_POST['email'];

$sql = mysqli_query($con,"UPDATE tbmembers SET first_name='$myFirstName', last_name='$myLastName', email='$myEmail' WHERE member_id = '$myId'" );

 header("Location: manage-profile.php");
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
<b><font color = "brown" size="6">Zarządzaj danymi konta</font></b><br>
  <a href="student.php">Strona główna</a> | <a href="vote.php">Obecne ankiety</a> | <a href="manage-profile.php">Zarządzaj profilem</a> | <a href="changepass.php">Zmień hasło</a>| <a href="logout.php">Wyloguj się</a>
</div>
<div id="container">
<table border="0" width="620" align="center">
<br><center><font class="lead" color = "brown" >Zaaktualizuj profil</font></center><br>
<form action="manage-profile.php?id=<?php echo $_SESSION['member_id']; ?>" method="post" onsubmit="return updateProfile(this)">
<table align="center">
<tr><td>Imię:</td><td><input type="text" class="form-control" name="firstname" maxlength="15" value="<?php echo $firstName; ?>"></td></tr>
<tr><td>Nazwisko:</td><td><input type="text" class="form-control" name="lastname" maxlength="15" value="<?php echo $lastName; ?>"></td></tr>
<tr><td>Email:</td><td><input type="text" class="form-control" name="email" maxlength="100" value="<?php echo $email; ?>"></td></tr>
<tr><td>&nbsp;</td></td><td><input type="submit"class="btn btn-success" name="update" value="Zaaktualizuj dane"></td></tr>
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