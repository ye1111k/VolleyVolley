<?php
    session_start();

    //open connection
    $mysqli = mysqli_connect("localhost","team22","team22","team22");
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n",mysqli_connect_error());
        exit();
    }
    else {
        //turn autocommit off
        mysqli_autocommit($mysqli, FALSE);
        //delete query
        $sql1 = "delete from personal_info where user_id= '".$_SESSION["userid"]."'";
        $sql2 = "delete from review where user_id= '".$_SESSION["userid"]."'";
        mysqli_query($mysqli, $sql1);
        mysqli_query($mysqli, $sql2);

        //commit transaction
        mysqli_commit($mysqli);

        //rollback transaction
        mysqli_rollback($mysqli);
        //close connection
        mysqli_close($mysqli);
    }
    session_destroy();
    exit('<script>alert("withdraw success");
    location.replace("login.php");
    </script>');
?>