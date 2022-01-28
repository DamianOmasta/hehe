<?php
session_start();
require('../connection.php');
//Jeśli Twoja sesja jest nieważna, powraca do ekranu logowania w celu ochrony
if(empty($_SESSION['admin_id'])){
 header("location:access-denied.php");
}
?>
<html><head>
<link href="css/admin_styles.css" rel="stylesheet" type="text/css" />
</head><body bgcolor="tan">
<center><b><font class="display-3" color = "brown" size="6">System tworzenia ankiet</font></b></center><br>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<div id="page">
<div id="header">
<b><font color = "brown" size="6">Panel kontrolny administratora</font></b><br>
<a href="admin.php">Strona główna </font></a> | <a href="positions.php">Zarządzaj pozycjami</a> | <a href="candidates.php">Zarządzaj kandydaturami</a> | <a href="refresh.php">Wyniki ankiet</a> | <a href="manage-admins.php">Zarządzaj kontem</a> | <a href="change-pass.php">Zmień hasło</a>  | <a href="logout.php">Wyloguj się</a>
</div>
<p align="center">&nbsp;</p>
<div id="container">
<center><b><font class="lead" color = "brown" size="2">Kliknij dowlony powyższy link, aby wykonać wybraną operację administracyjną</font></b></center>



</div>
<div id="footer">
<div class="bottom_addr"></div>
</div>
</div>
</body></html>