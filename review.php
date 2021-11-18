<?php
    session_start();
    $prevPage = $_SERVER['HTTP_REFERER'];

    $mysqli = mysqli_connect("localhost","team22","team22","team22");
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n",mysqli_connect_error());
        exit();
    }
    else {

        

        $star_ev=$_POST["star"]/2.0;
        $sql = "select * from personal_info where user_id= '".$_SESSION["userid"]."'";
        $res1 = mysqli_query($mysqli, $sql);
        if ($res1) {
            while ($nickname = mysqli_fetch_array($res1, MYSQLI_ASSOC)) {
                $sql = "INSERT INTO review (user_id, stadium_id, date, content, star_num, user_nickName) 
                    VALUES('".$_SESSION["userid"]."', '".$_REQUEST["id"]."', '".date("Y-m-d H:i")."', '".$_POST["rv"]."', '".$star_ev."', '".$nickname['name']."')";
            }
        }
        $res = mysqli_query($mysqli, $sql);
        if ($res === TRUE) {
        } 
        else {
            printf("Could not insert record: %s\n",mysqli_error($mysqli));
        }
        mysqli_close($mysqli);

        exit('<script>alert("review registered");
        location.replace("stadium.php");
        </script>');
    }
?>