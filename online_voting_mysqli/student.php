<?php
require('connection.php');

session_start();
if(empty($_SESSION['member_id'])){
 header("location:access-denied.php");
}
?>
<html><head>
<link href="css/user_styles.css" rel="stylesheet" type="text/css" />
</head><body bgcolor="tan">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<center><b><font class="display-3" color = "brown" size="6">System tworzenia ankiet</font></b></center><br>
<div id="page">
<div id="header">
<b><font color = "brown" size="6">Strona główna</font></b><br>
<a href="student.php">Strona główna</a> | <a href="vote.php">Obecne ankiety</a> | <a href="manage-profile.php">Zarządzaj profilem</a> | <a href="changepass.php">Zmień hasło</a>| <a href="logout.php">Wyloguj się</a>
</div>
<div id="container">
<center><b><font class="lead" color = "brown" size="2">Wybierz spośród dostępnych powyższych opcji.</font></b></center>

</div>
<div id="footer">
<div class="bottom_addr"></div>
</div>
</div>
</body></html>