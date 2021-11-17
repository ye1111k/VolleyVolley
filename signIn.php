<?php
    $userid=$_POST['uid']; //id 받아올 변수
    $userpw=$_POST['pwd']; //비밀번호 받아올 변수
    $userpw=md5($userpw);

    $conn=mysqli_connect('localhost', 'team22', 'team22', 'team22'); //db 연결

    $sql="SELECT * FROM personal_info WHERE user_id='$userid'"; //쿼리문 작성

    $result=mysqli_fetch_array(mysqli_query($conn, $sql));

    if($result==TRUE) {
        $pwd = $result['password']; //db에 저장되어있는 비밀번호
        if($pwd==$userpw) {
            session_start();
            $_SESSION['userid'] = $userid;
            $_SESSION['username'] = $result['name'];
            
            exit('<script>location.replace("index.php");</script>');
        }
        else{
            exit('<script>alert("Wrong password. Try again!");
                location.replace("login.php");
                </script>');
        }
    }
?>