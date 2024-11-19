<?php
include "connection.php";
session_start();

if (empty($_POST['lan'])) {
    $error = "<center><h4><font color='#FF0000'>Please select a language to vote!</font></h4></center>";
    include "voter.php";
    exit();
}

$lan = $_POST['lan'];
$sess = $_SESSION['SESS_NAME'];
$lan = addslashes($_POST['lan']);
$lan = mysqli_real_escape_string($con, $lan);

$sql = mysqli_query($con, 'SELECT * FROM voters WHERE username="' . $_SESSION['SESS_NAME'] . '" AND status="VOTED"');

if (mysqli_num_rows($sql) > 0) {
    $msg = "<center><h4><font color='#FF0000'>You have already voted. No need to vote again.</font></h4></center>";
    include 'voter.php';
    exit();
} else {
    $sql1 = mysqli_query($con, 'UPDATE languages SET votecount = votecount + 1 WHERE fullname = "' . sha1($_POST['lan']) . '"');
    $sql2 = mysqli_query($con, 'UPDATE voters SET status="VOTED" WHERE username="' . $_SESSION['SESS_NAME'] . '"');
    $sql3 = mysqli_query($con, 'UPDATE voters SET voted= "' . sha1($_POST['lan']) . '" WHERE username="' . $_SESSION['SESS_NAME'] . '"');

    if (!$sql1 || !$sql2 || !$sql3) {
        die("Error on MySQL query: " . mysqli_error($con));
    } else {
        $msg = "<center><h4><font color='#008000'>Congratulations, you have made your vote.</font></h4></center>";
        #include 'voter.php';
		echo '<center><font size="6">Successfully voted</font></center>'.$msg ;
		echo '<center><font size="4"><a href="logout.php">Logout</a></font></center>';
        exit();
    }
}
?>
