<?php
session_start();
require('../connection.php');
//Jeśli Twoja sesja jest nieważna, powraca do ekranu logowania w celu ochrony
if(empty($_SESSION['admin_id'])){
 header("location:access-denied.php");
} 
//pobierz kandydatów z tabeli tbcandidates
$result=mysqli_query($con,"SELECT * FROM tbcandidates");
if (mysqli_num_rows($result)<1){
    $result = null;
}
?>
<?php

$positions_retrieved=mysqli_query($con, "SELECT * FROM tbpositions");

?>
<?php
if (isset($_POST['submit']))
{

$newCandidateName = addslashes( $_POST['name'] );
$newCandidatePosition = addslashes( $_POST['position'] ); 

$sql = mysqli_query($con, "INSERT INTO tbcandidates (candidate_name, candidate_position) VALUES ('$newCandidateName','$newCandidatePosition')" );

// Przekierowanie z powrotem do kandydatów
 header("Location: candidates.php");
}
?>
<?php
 if (isset($_GET['id']))
 {
 $id = $_GET['id'];
 
 $result = mysqli_query($con, "DELETE FROM tbcandidates WHERE candidate_id='$id'");
 
 header("Location: candidates.php");
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
<b><font color = "brown" size="6">Zarządzaj kandydaturami</font></b><br>
  <a href="admin.php">Strona główna</a> | <a href="positions.php">Zarządzaj pozycjami</a> | <a href="candidates.php">Zarządzaj kandydaturami</a> | <a href="refresh.php">Wyniki ankiet</a> | <a href="manage-admins.php">Zarządzaj kontem</a> | <a href="change-pass.php">Zmień hasło</a>  | <a href="logout.php">Wyloguj się</a>
</div>
<div id="container">
<table width="380" align="center">
<form name="fmCandidates" id="fmCandidates" action="candidates.php" method="post" onsubmit="return candidateValidate(this)">
<tr>
    <br><td>Kandydant</td>
    <td><input class="form-control" type="text" name="name" /></td>
</tr>
<tr>
    <td>Pozycja kandydata</td>
    <!--<td><input type="combobox" name="position" value="<?php echo $positions; ?>"/></td>-->
    <td><SELECT class="form-control" NAME="position" id="position">select
    <OPTION VALUE="select">wybierz
    <?php
    while ($row=mysqli_fetch_array($positions_retrieved)){
    echo "<OPTION VALUE=$row[position_name]>$row[position_name]";
    }
    ?>
    </SELECT>
    </td>
</tr>
<tr>
    <td>&nbsp;</td>
    <td><input type="submit" class="btn btn-success" name="submit" value="Dodaj" /></td>
</tr>
</table>
<hr>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID kandydata</th>
      <th scope="col">Kandydant</th>
      <th scope="col">Pozycja kandydata</th>
      <th scope="col">Usuń kandydata</th>
    </tr>


<?php
$inc=1;
while ($row=mysqli_fetch_array($result)){
    
echo "<tr>";
echo "<td>" . $inc."</td>";
echo "<td>" . $row['candidate_name']."</td>";
echo "<td>" . $row['candidate_position']."</td>";
echo '<td><a href="candidates.php?id=' . $row['candidate_id'] . '">Usuń kandydata z listy</a></td>';
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