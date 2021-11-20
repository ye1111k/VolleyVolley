<?php
    session_start();
    $uNickName=$_POST['uNickName'];

    $mysqli = mysqli_connect("localhost","team22","team22","team22");
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n",mysqli_connect_error());
        exit();
    }
    else {

        //turn autocommit off
        mysqli_autocommit($mysqli, FALSE);
        //delete query
        $sql1 = "UPDATE personal_info SET name='".$uNickName."' WHERE user_id='".$_SESSION['userid']."';";
        $sql2 = "UPDATE review SET user_nickName='".$uNickName."' WHERE user_id='".$_SESSION["userid"]."';";
        mysqli_query($mysqli, $sql1);
        mysqli_query($mysqli, $sql2);
        
        //commit transaction
        mysqli_commit($mysqli);
        
        //rollback transaction
        mysqli_rollback($mysqli);
        //close connection
        mysqli_close($mysqli);

        $_SESSION['username'] = $uNickName;

        exit('<script>alert("Congratulation! Your NickName successfully changed!");
        location.replace("index.php");
        </script>');
    }

    mysqli_free_result($result);
    mysqli_close($conn);
?>