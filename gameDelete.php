<?php
session_start();

echo "<script>parent.document.form.reset()</script>";
$game_id=$_POST['game_id']; //id 받아올 변수

$conn=mysqli_connect('localhost', 'team22', 'team22', 'team22'); //db 연결

$sql="DELETE FROM game WHERE id=".$game_id;
$result=mysqli_query($conn, $sql);
if ($result==TRUE){
    exit('<script>alert("DELETED!")
    location.replace("index.php")</script>');
}
mysqli_close($conn);

?>