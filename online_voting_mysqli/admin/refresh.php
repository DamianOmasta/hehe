<?php
require('../connection.php');
// pobieranie wyników kandydatów na podstawie stanowiska
if (isset($_POST['Submit'])){   

  $position = addslashes( $_POST['position'] );
  
    $results = mysqli_query($con, "SELECT * FROM tbcandidates where candidate_position='$position'");

    $row1 = mysqli_fetch_array($results); // dla pierwszego kandydata
    $row2 = mysqli_fetch_array($results); // dla drugiego kandydata
      if ($row1){
      $candidate_name_1=$row1['candidate_name']; // imię pierwszego kandydata
      $candidate_1=$row1['candidate_cvotes']; // głosy pierwszego kandydata
      }

      if ($row2){
      $candidate_name_2=$row2['candidate_name']; // imię drugiego kandydata
      $candidate_2=$row2['candidate_cvotes']; // głosy drugiego kandydata
      }
}
    else
?> 
<?php
$positions=mysqli_query($con, "SELECT * FROM tbpositions");
?>
<?php
session_start();
if(empty($_SESSION['admin_id'])){
 header("location:access-denied.php");
}
?>

<?php if(isset($_POST['Submit'])){$totalvotes=$candidate_1+$candidate_2;} ?>

<html><head>
  
<link href="css/admin_styles.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="js/admin.js">
</script>
</head><body bgcolor="tan">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<center><b><font class="display-3" color = "brown" size="6">System tworzenia ankiet</font></b></center><br>
<div id="page">
<div id="header">
<b><font color = "brown" size="6">Wyniki ankiet</font></b><br>
<a href="admin.php">Strona główna</a> | <a href="positions.php">Zarządzaj pozycjami</a> | <a href="candidates.php">Zarządzaj kandydaturami</a> | <a href="refresh.php">Wyniki ankiet</a> | <a href="manage-admins.php">Zarządzaj kontem</a> | <a href="change-pass.php">Zmień hasło</a>  | <a href="logout.php">Wyloguj się</a>
</div>
<div id="container">
<table class="table">
<form name="fmNames" id="fmNames" method="post" action="refresh.php" onSubmit="return positionValidate(this)">
<tr>
    <td>Wybierz pozycję</td>
    <br><td><SELECT NAME="position" class="form-control" id="position">
    <OPTION VALUE="select">wybierz
    <?php 
    while ($row=mysqli_fetch_array($positions)){
    echo "<OPTION VALUE=$row[position_name]>$row[position_name]"; 
    }
    ?>
    </SELECT></td>
    <td><input type="Submit" class="btn btn-success" name="Submit" value="Wyświetl wyniki" /></td>
</tr>
<tr>
    <td>&nbsp;</td> 
    <td>&nbsp;</td>
</tr>
</form> 
</table>
<?php if(isset($_POST['Submit'])){echo $candidate_name_1;} ?>:<br>
<img src="images/candidate-1.gif"
width='<?php if(isset($_POST['Submit'])){ if ($candidate_2 || $candidate_1 != 0){echo(100*round($candidate_1/($candidate_2+$candidate_1),2));}} ?>'
height='20'>
<?php if(isset($_POST['Submit'])){ if ($candidate_2 || $candidate_1 != 0){echo(100*round($candidate_1/($candidate_2+$candidate_1),2));}} ?>% <?php if(isset($_POST['Submit'])){echo $totalvotes;} ?> wszystkich głosów
<br><?php if(isset($_POST['Submit'])){ echo $candidate_1;} ?>
<br>
<br>
<?php if(isset($_POST['Submit'])){ echo $candidate_name_2;} ?>:<br>
<img src="images/candidate-2.gif"
width='<?php if(isset($_POST['Submit'])){ if ($candidate_2 || $candidate_1 != 0){echo(100*round($candidate_2/($candidate_2+$candidate_1),2));}} ?>'
height='20'>
<?php if(isset($_POST['Submit'])){ if ($candidate_2 || $candidate_1 != 0){echo(100*round($candidate_2/($candidate_2+$candidate_1),2));}} ?>% <?php if(isset($_POST['Submit'])){echo $totalvotes;} ?> wszystkich głosów
<br> <?php if(isset($_POST['Submit'])){ echo $candidate_2;} ?>
</div>
<div id="footer">
<div class="bottom_addr"></div>
</div>
</div>
</body></html>