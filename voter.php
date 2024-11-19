<?php
if(!isset($_SESSION)) { 
session_start();
}
include "auth.php";
include "header_voter.php"; 
?>
<h4> Welcome to the Online Voting Portal</h4>
<h3>Make a Vote </h3>
<form action="submit_vote.php" name="vote" method="post" id="myform" >
<center><font size='6'> What is your favorite political party? <BR>
<input type="radio" name="lan" value="BJP">  Party 1<BR>
<input type="radio" name="lan" value="CONGRESS">Party 2<BR>
<input type="radio" name="lan" value="AAP">   Party 3<BR>
<input type="radio" name="lan" value="NOTA">  Party 4<BR>
<input type="radio" name="lan" value="NIRDLIY">  Party 5<BR>
</font></center><br>
<?php global $msg; echo $msg; ?>
<?php global $error; echo $error; ?>
<center><input type="submit" value="Submit Vote" name="submit" style="height:30px; width:100px" /></center>
</form>
