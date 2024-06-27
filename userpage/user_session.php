<?php session_start();
    if($_SESSION["user"]==""){
        echo "<script>alert('กรุณาเข้าสู่ระบบก่อน')</script>";
        echo "<script>window.open('../login.php','_self')</script>";
    } 
?>
