<html><head>
<link href="css/user_styles.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="js/user.js">
</script>
</head>
<body bgcolor="#e6e6e6";>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<center><b><font class="display-3" color = "brown" size="6">System tworzenia ankiet</font></b></center><br>
<div id="page">
<div id="header">
<b><font color = "brown" size="6">Ekran logowania Usera</font></b><br>
</div>
<div id="container">
<table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<form name="form1" method="post" action="checklogin.php" onSubmit="return loginValidate(this)">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="tan">
<tr>
<td width="78">Email</td>
<td width="6">:</td>
<td width="294"><input name="myusername" class="form-control" type="text" id="myusername"></td>
</tr>
<tr>
<td>Haslo</td>
<td>:</td>
<td><input name="mypassword" class="form-control" type="password" id="mypassword"></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><input type="submit" class="btn btn-success" name="Submit" value="Login"></td>
</tr>
</table>
</td>
</form>
</tr>
</table>
<center>
<br>Jeszcze nie zarejestrowany? <a href="registeracc.php"><b>Stwórz konto tutaj</b></a>
</center>
</div>
<div id="footer">
<div class="bottom_addr"></div>
</div>
</div>
</body></html>