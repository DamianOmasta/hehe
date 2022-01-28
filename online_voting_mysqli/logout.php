<?php
session_start();
?>
<html><head>
<link href="css/user_styles.css" rel="stylesheet" type="text/css" />
</head><body bgcolor="tan">  
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">=
<center><font class="display-3" color = "brown" size="6">System tworzenia ankiet</font></center>
<div id="page">
<div id="header">
<br><b><font color = "brown" size="6">Wylogowano pomyślnie</font></b>
<p align="center">&nbsp;</p>
</div>
<?php
session_destroy();
?>
<center>Zostałeś pomyślnie wylogowany z panelu.<br><br></center>
<center>Powróć do <a href="index.html">ekranu logowania</a></center>
<div id="footer">
<div class="bottom_addr"></div>
</div>
</div>
</body></html>