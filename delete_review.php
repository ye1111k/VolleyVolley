<?php
    session_start();
    $prevPage = $_SERVER['HTTP_REFERER'];
    $review_id = $_REQUEST['id'];

    $mysqli = mysqli_connect("localhost","team22","team22","team22");
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n",mysqli_connect_error());
        exit();
    }
    else {
        $sql = "delete from review where review_id= '".$review_id."'";
        $res = mysqli_query($mysqli, $sql);
        if ($res === TRUE) {
        } 
        else {
            printf("Could not delete record\n");
        }
        mysqli_close($mysqli);

        exit('<script>alert("review deleted");
        location.replace("stadium.php");
        </script>');
    }
?>