<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);
require('connection.php');
 $vote = $_REQUEST['vote'];
  $user_id=$_REQUEST['user_id'];
   $position=$_REQUEST['position'];

$sql=mysqli_query($con, "SELECT position,voter_id FROM tblvotes where position='$position' and voter_id='$user_id'");

if(mysqli_num_rows($sql))
{
    echo "<h3>Już oddałeś swój głos</h3>";
}
else
{
    //wstaw dane i sprawdź pozycję
    $ins=mysqli_query($con,"INSERT INTO tblvotes (voter_id, position, candidateName) VALUES ('$user_id', '$position', '$vote')");
    mysqli_query($con, "UPDATE tbcandidates SET candidate_cvotes=candidate_cvotes+1 WHERE candidate_name='$vote'");
    mysqli_close($con);
 
echo "<h3 style='color:blue'>Gratulacje, oddałeś swój głos na - ".$vote."</h3>";

}

?> 