<?php
    session_start();
    $prevPage = $_SERVER['HTTP_REFERER'];

    $mysqli = mysqli_connect("localhost","team22","team22","team22");
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n",mysqli_connect_error());
        exit();
    }
    else {
        $review_id=$_REQUEST['id'];
        $star_ev=$_POST["star"]/2.0;
        $sql = "update review set star_num=".$star_ev.", content='".$_POST["rv"]."' where review_id= ".$review_id;
        $res = mysqli_query($mysqli, $sql);
        $res = mysqli_query($mysqli, $sql);
        if ($res === TRUE) {
        } 
        else {
            printf("Could not insert record: %s\n",mysqli_error($mysqli));
        }
        mysqli_close($mysqli);

        exit('<script>alert("review updated");
        location.replace("stadium.php");
        </script>');
    }
?>