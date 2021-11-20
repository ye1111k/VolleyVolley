<?php
    session_start();
    $conn=mysqli_connect('localhost', 'team22', 'team22', 'team22'); //db 연결

    $club1=$_POST['club1'];
    $club2=$_POST['club2'];
    $stadium=$_POST['stadium'];
    
    $schedule=$_POST['schedule_date']." ".$_POST['schedule_time'];
    $date = $today=date("Y-m-d");

    if($date>$schedule){
        exit('<script>alert("Please enter the game that will be played after today.");
                location.replace("addMatch.php");
                </script>');
    }

    $sql="INSERT INTO game (club1, club2, stadium_id, schedule)  VALUES (".$club1.",".$club2.",".$stadium.",'".$schedule."');";
    $result=mysqli_query($conn, $sql);
    
    if ($result == false) {
        echo "<script>alert('You have a problem. Please contact with manager.')</script>";
        echo mysqli_error($conn);
    }
    else {
        exit('<script>alert("Congratulation! Added successfully!");
        location.replace("index.php");
        </script>');
    }

    mysqli_free_result($result);
    mysqli_close($conn);
?>