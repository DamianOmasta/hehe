<?php
require('connection.php');

session_start();

if(empty($_SESSION['member_id'])){
 header("location:access-denied.php");
}

?>
<?php
$positions=mysqli_query($con, "SELECT * FROM tbpositions");
?> 
<?php
  
 if (isset($_POST['Submit']))
 {

 $position = addslashes( $_POST['position'] ); 
 

 $result = mysqli_query($con,"SELECT * FROM tbcandidates WHERE candidate_position='$position'");

 }
 else
  
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Glosowanie</title>
<link href="css/user_styles.css" rel="stylesheet" type="text/css" />   
<script language="JavaScript" src="js/user.js">
</script>
<script type="text/javascript">
function getVote(int)
{
if (window.XMLHttpRequest)
  {
  xmlhttp=new XMLHttpRequest();
  }
else
  {
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }

	if(confirm("Your vote is for "+int))
	{
  var pos=document.getElementById("str").value;
  var id=document.getElementById("hidden").value;
  xmlhttp.open("GET","save.php?vote="+int+"&user_id="+id+"&position="+pos,true);
  xmlhttp.send();

  xmlhttp.onreadystatechange =function()
{
	if(xmlhttp.readyState ==4 && xmlhttp.status==200)
	{
	document.getElementById("error").innerHTML=xmlhttp.responseText;
	}
}

  }
	else
	{
	alert("Wybierz innego kandydata ");
	}
	
}

function getPosition(String)
{
if (window.XMLHttpRequest)
  {
  xmlhttp=new XMLHttpRequest();
  }
else
  {
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }

xmlhttp.open("GET","vote.php?position="+String,true);
xmlhttp.send();
}
</script>
<script type="text/javascript">
$(document).ready(function(){
   var j = jQuery.noConflict();
    j(document).ready(function()
    {
        j(".refresh").everyTime(1000,function(i){
            j.ajax({
              url: "admin/refresh.php",
              cache: false,
              success: function(html){
                j(".refresh").html(html);
              }
            })
        })
        
    });
   j('.refresh').css({color:"green"});
});
</script>
</head>
<body bgcolor="tan">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<center>
<center><b><font class="display-3" color = "brown" size="6">System tworzenia ankiet</font></b></center><br>
<body>
<div id="page">
<div id="header">
<b><font color = "brown" size="6">Obecne głosowanie</font></b><br>
  <a href="student.php">Strona główna</a> | <a href="vote.php">Obecne ankiety</a> | <a href="manage-profile.php">Zarządzaj profilem</a> | <a href="changepass.php">Zmień hasło</a>| <a href="logout.php">Wyloguj się</a>
</div>
<div class="refresh">
</div>
<div id="container">
<table width="420" align="center">
<form name="fmNames" id="fmNames" method="post" action="vote.php" onSubmit="return positionValidate(this)">
<tr>
<br><center><font class="lead" color = "brown" >Wybierz pozycję</font></center><br>
    <td><SELECT NAME="position" id="position" onclick="getPosition(this.value)">
    <OPTION VALUE="select">wybierz
    <?php 
    while ($row=mysqli_fetch_array($positions)){
    echo "<OPTION VALUE=$row[position_name]>$row[position_name]"; 
  
    }
    ?>
    </SELECT></td>
    <td><input type="hidden"  class="form-control" id="hidden" value="<?php echo $_SESSION['member_id']; ?>" /></td>
    <td><input type="hidden"  class="form-control" id="str" value="<?php echo $_REQUEST['position']; ?>" /></td>
    <td><input type="submit" class="btn btn-success" name="Submit" value="Zobacz kandydatów" /></td>
</tr>
<tr>
    <td>&nbsp;</td> 
    <td>&nbsp;</td>
</tr>
</form> 
</table>
<table width="270" align="center">
<form>
<tr>
    <th>Kandydaci:</th>
</tr>


<?php

  if (isset($_POST['Submit']))
  {
while ($row=mysqli_fetch_array($result)){
echo "<tr>";
echo "<td>" . $row['candidate_name']."</td>";
echo "<td><input type='radio' name='vote' value='$row[candidate_name]' onclick='getVote(this.value)' /></td>";
echo "</tr>";
}
mysqli_free_result($result);
mysqli_close($con);
//}
  }
else
// do nothing
?>
<tr>
    <br><center><font class="lead" color = "brown" >Kliknij kółko pod odpowiednim kandydatem, aby oddać głos. Nie możesz głosować więcej niż raz na daną pozycję</font></center><br>

    <td>&nbsp;</td>
</tr>
</form>
</table>
<center><span id="error"></span></center>
</div>
<div id="footer"> 
  <div class="bottom_addr"></div>
</div>
</div>
</body>
</html>