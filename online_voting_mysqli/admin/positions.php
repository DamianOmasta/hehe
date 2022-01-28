<?php
session_start();
require('../connection.php');
if(empty($_SESSION['admin_id'])){
 header("location:access-denied.php");
}
//pobierz pozycje z tabeli tbpositions
$result=mysqli_query($con, "SELECT * FROM tbpositions");
if (mysqli_num_rows($result)<1){
    $result = null;
}
?>
<?php
if (isset($_POST['Submit']))
{

$newPosition = addslashes( $_POST['position'] );

$sql = mysqli_query($con, "INSERT INTO tbpositions (position_name) VALUES ('$newPosition')");

 header("Location: positions.php");
}
?>
<?php
 if (isset($_GET['id']))
 {
 $id = $_GET['id'];
 $result = mysqli_query($con, "DELETE FROM tbpositions WHERE position_id='$id'");
 
 header("Location: positions.php");
 }
 else
    
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Panel Admina</title>
<link href="css/admin_styles.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="js/admin.js">
</script>
</head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<body bgcolor="tan">
<center><b><font class="display-3" color = "brown" size="6">System tworzenia ankiet</font></b></center><br>
<div id="page">
<div id="header">
<b><font color = "brown" size="6">Zarządzaj pozycjami</font></b><br>
  <a href="admin.php">Strona główna</a> | <a href="positions.php">Zarządzaj pozycjami</a> | <a href="candidates.php">Zarządzaj kandydaturami</a> | <a href="refresh.php">Wyniki ankiet</a> | <a href="manage-admins.php">Zarządzaj kontem</a> | <a href="change-pass.php">Zmień hasło</a>  | <a href="logout.php">Wyloguj się</a>
</div>
<div id="container">
<table width="380" align="center">
<form name="fmPositions" id="fmPositions" action="positions.php" method="post" onsubmit="return positionValidate(this)">
<tr>
<br><td>Nazwa pozycji</td>
    <td><input class="form-control" type="text" name="position" /></td>
    <td><input type="submit" class="btn btn-success" name="Submit" value="Dodaj" /></td>
</tr>
</table>
<hr>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID pozycji</th>
      <th scope="col">Nazwa pozycji</th>
      <th scope="col">Usuń kandydata</th>
    </tr>

<?php
$inc=1;
while ($row=mysqli_fetch_array($result)){
echo "<tr>";
echo "<td>" .$inc."</td>";
echo "<td>" . $row['position_name']."</td>";
echo '<td><a href="positions.php?id=' . $row['position_id'] . '">Usuń pozycję z listy</a></td>';
echo "</tr>";
$inc++;
}

mysqli_free_result($result);
mysqli_close($con);
?>
</table>
<hr>
</div>
<div id="footer"> 
  <div class="bottom_addr"></div>
</div>
</div>
</body>
</html>