<?php
session_start();
echo "<script>parent.document.form.reset()</script>";
$game_id=$_POST['game_id']; //id 받아올 변수

$conn=mysqli_connect('localhost', 'team22', 'team22', 'team22'); //db 연결

mysqli_autocommit($conn, FALSE);

$sql1="update game set winner = ".$_POST['winner']." WHERE id=".$game_id;
$sql2="UPDATE club set win_game = win_game+1 where club_id=".$_POST['winner'];
$sql3="UPDATE club set game = game+1 where club_id=".$_POST['club1'];
$sql4="UPDATE club set game = game+1 where club_id=".$_POST['club2'];

$result=mysqli_query($conn, $sql1);
$result=mysqli_query($conn, $sql2);
$result=mysqli_query($conn, $sql3);
$result=mysqli_query($conn, $sql4);

mysqli_commit($conn);
mysqli_rollback($conn);
if ($result==TRUE){
    exit('<script>alert("UPDATED!")
    location.replace("index.php")</script>');
}

mysqli_close($conn);

?>