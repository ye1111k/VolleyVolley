<?php
    $conn=mysqli_connect('localhost', 'team22', 'team22', 'team22'); //db 연결

    $uid=$_POST['uid'];
    $pwd=$_POST['pwd'];
    $name=$_POST['name'];

    $pwd=md5($pwd);
        
    $sql="SELECT * FROM personal_info WHERE user_id='$uid'";
    $result=mysqli_fetch_array(mysqli_query($conn, $sql));
    
    if($result==TRUE){
        exit('<script>alert("This ID is already exist. Please enter new ID.");
        location.replace("signup.php");
        </script>');
    }
    
    $sql = "INSERT INTO personal_info (user_id, password, name) 
            VALUES('$uid', '$pwd', '$name')";
    $result = mysqli_query($conn, $sql);

    if ($result === false) {
        echo "<script>alert('You have a problem. Please contact with manager.')</script>";
        echo mysqli_error($conn);
    }
    else {
        exit('<script>alert("Welcome to volleyvolley! Please login and enjoy volleyvolley.");
        location.replace("login.php");
        </script>');
    }
?>