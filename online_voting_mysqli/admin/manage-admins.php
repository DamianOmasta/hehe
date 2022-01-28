<?php
session_start();
require('../connection.php');
?>
<html><head>
<link href="css/admin_styles.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="js/admin.js">
</script>
</head><body bgcolor="tan">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<center><b><font class="display-3" color = "brown" size="6">System tworzenia ankiet</font></b></center><br>
<div id="page">
<div id="header">
<b><font color = "brown" size="6">Zarządzaj danymi konta</font></b><br>
<a href="admin.php">Strona główna</a> | <a href="positions.php">Zarządzaj pozycjami</a> | <a href="candidates.php">Zarządzaj kandydaturami</a> | <a href="refresh.php">Wyniki ankiet</a> | <a href="manage-admins.php">Zarządzaj kontem</a> | <a href="change-pass.php">Zmień hasło</a>  | <a href="logout.php">Wyloguj się</a>
</div>

<div id="container">
<?php
if(empty($_SESSION['admin_id'])){
 header("location:access-denied.php");
}

$result=mysqli_query($con, "SELECT * FROM tbadministrators WHERE admin_id = '$_SESSION[admin_id]'");
if (mysqli_num_rows($result)<1){
    $result = null;
}
$row = mysqli_fetch_array($result);
if($row)
 {
 $adminId = $row['admin_id'];
 $firstName = $row['first_name'];
 $lastName = $row['last_name'];
 $email = $row['email'];
 }

if (isset($_GET['id']) && isset($_POST['update']))
{
$myId = addslashes( $_GET['id']);
$myFirstName = addslashes( $_POST['firstname'] );
$myLastName = addslashes( $_POST['lastname'] ); 
$myEmail = $_POST['email'];

$sql = mysqli_query($con, "UPDATE tbadministrators SET first_name='$myFirstName', last_name='$myLastName', email='$myEmail' WHERE admin_id = '$myId'" );
}
?>
<table align="center">
<tr>
<td>
<form action="manage-admins.php?id=<?php echo $_SESSION['admin_id']; ?>" method="post" onSubmit="return updateProfile(this)">
<table align="center">
<br><tr><td>Pierwsze imię:</td><td><input type="text" class="form-control" name="firstname" maxlength="15" value="<?php echo $firstName ?>"></td></tr>
<tr><td>Nazwisko:</td><td><input type="text" class="form-control" name="lastname" maxlength="15" value="<?php echo $lastName ?>"></td></tr>
<tr><td>Adres email:</td><td><input type="text" class="form-control" name="email" maxlength="100" value="<?php echo $email?>"></td></tr>
<tr><td>&nbsp;</td><td><input type="submit" class="btn btn-success" name="update" value="Zaaktualizuj dane"></td></tr>
</table>
</form>
</td>
</tr>
</table>
</div>
<div id="footer">
<div class="bottom_addr"></div>
</div>
</div>
</body></html>