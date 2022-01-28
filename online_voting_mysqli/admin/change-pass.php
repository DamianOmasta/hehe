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
<b><font color = "brown" size="6">Zarządzaj hasłem</font></b><br>
<a href="admin.php">Strona główna</a> | <a href="positions.php">Zarządzaj pozycjami</a> | <a href="candidates.php">Zarządzaj kandydaturami</a> | <a href="refresh.php">Results</a> | <a href="manage-admins.php">Zarządzaj kontem</a> | <a href="change-pass.php">Zmień hasło</a>  | <a href="logout.php">Wyloguj się</a>
</div>
<div id="container">
<?php
if(empty($_SESSION['admin_id'])){
 header("location:access-denied.php");
}

// pobierz dane do pliku aktualizacji
$result=mysqli_query($con, "SELECT * FROM tbadministrators WHERE admin_id = '$_SESSION[admin_id]'");
if (mysqli_num_rows($result)<1){
    $result = null;
}
$row = mysqli_fetch_array($result);
if($row)
 {
 // pobierz dane z bazy
 $encPass = $row['password'];
 }

if (isset($_GET['id']) && isset($_POST['update']))
{
    $myId = addslashes( $_GET['id']);
    $mypassword = md5($_POST['oldpass']);
    $newpass= $_POST['newpass'];
    $confpass= $_POST['confpass'];
    if($encPass==$mypassword)
    {
        if($newpass==$confpass)
        {
        $sql = mysqli_query($con, "UPDATE tbadministrators SET password='$newpass' WHERE admin_id = '$myId'" );
        echo "<script>alert('Twoje hasło zostało zaktualizowane');</script>";
        }
        else
        {
            echo "<script>alert('Twoje nowe hasło i potwierdzenie hasła nie pasują');</script>";
        }    
    }
    else
    {
        echo "<script>alert('Podaj prawidłowe stare hasło');</script>";
    }
    
}
?>
<table align="center">
<tr>
<td>
<form action="change-pass.php?id=<?php echo $_SESSION['admin_id']; ?>" method="post" onSubmit="return updateProfile(this)">
<table align="center">
<br><tr><td>Stare hasło:</td><td><input type="password" class="form-control"  name="oldpass" maxlength="15" value=""></td></tr>
<tr><td>Nowe hasło:</td><td><input type="password" class="form-control"  name="newpass" maxlength="15" value=""></td></tr>
<tr><td>Powtórz hasło:</td><td><input type="password" class="form-control"  name="confpass" maxlength="15" value=""></td></tr>
<tr><td>&nbsp;</td><td><input type="submit" class="btn btn-success" name="update" value="Zaaktualizuj hasło"></td></tr>
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