<?php include "header.php";
session_start();
if (isset($_SESSION['SESS_NAME'])!="") {
	header("Location: voter.php");
}
?>
<?php global $msg; echo $msg;?>
<body style="background-image: url('Images/Vote.jpeg'); background-size: cover; background-repeat: no-repeat;">
<p><center><legend><font color='#008000' size='18'>
<p>In order to make a vote you have to register first and then login.</font></legend></center>

    <p>&nbsp;&nbsp;</p></body>
<?php include "footer.php";?>
