<?php
    session_start(); 
    include("connect.php");

    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password1 = md5($_POST['password']);
        $sql_user = "select * from user WHERE user_name='$username' AND user_password='$password1'";
        $sql_admin = "select * from admin WHERE admin_name='$username' AND admin_password = '$password1'";
        //  $result = $conn->query($check_user);
        $result_user = mysqli_query($conn, $sql_user);
        $result_admin = mysqli_query($conn, $sql_admin);
        $rs_user = mysqli_fetch_assoc($result_user);
        $rs_admin = mysqli_fetch_assoc($result_admin);

        $countuser = mysqli_num_rows($result_user);
        $countadmin = mysqli_num_rows($result_admin);
         
        // if($countuser >0 ){
        //     echo "<script>alert('ผู้ใช้')</script>";
        //     echo "<script>window.open('userpage/user_index.php','_self')</script>";
        // }else if($countadmin >0 ){
        //     echo "<script>alert('แอดมิน')</script>";
        //     echo "<script>window.open('login.php','_self')</script>";
        // }
        // else{
        //     echo "<script>alert('ผิด$password1')</script>";
        //     echo "<script>window.open('login.php','_self')</script>";
        // }
        
        if ($rs_user > 0) {
            $_SESSION['user'] = $username;
            $_SESSION['user_id'] = $rs_user["user_id"];
            $_SESSION['user_fullname'] = $rs_user["user_fullname"];
          
            // echo "<script>alert('คุณเป็นผู้ใช้ท่านหนึ่ง จร้า')</script>";
            echo "<script>window.open('userpage/user_index.php','_self')</script>";
        } else if ($rs_admin > 0) {
            $_SESSION["admin"] = $username;
            $_SESSION["admin_id"] = $rs_admin["admin_id"];
            $_SESSION['admin_fullname'] = $rs_admin["admin_fullname"];
            // echo "<script>alert('คุณเป็นแอดมิน')</script>";
            echo "<script>window.open('adminpage/admin_index.php','_self')</script>";
        } else {
            echo "<script>alert('ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง!')</script>";
            echo "<script>window.open('login.php','_self')</script>";
        }
    }
    ?>