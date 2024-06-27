<?php 
    include('connect.php');

    date_default_timezone_set('asia/bangkok');
    $create_At = date('Y-m-d H:i:s', time());
   

    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email']; 
    $passwordfirst = $_POST['password1'];
    $passwordsecond = $_POST['password2'];
    
    if($passwordfirst == $passwordsecond){
        $password3 = md5($passwordsecond);
        mysqli_query($conn, "insert into user (user_name, user_fullname ,user_email,user_password,Created_At) values ('$username', '$fullname','$email','$password3','$create_At')");
        echo "<script>alert('ลงทะเบียนเรียบร้อย')</script>";
    header('location:login.php'); 
    }else{
        echo "<script>alert('รหัสผ่านไม่ตรงกัน')</script>";
        echo "<script>window.location='register.php';</script>";
    }
    



    

    




    
    // echo "วันปัจจุบัน".date("Y-m-d H:i:s", $now);
?>