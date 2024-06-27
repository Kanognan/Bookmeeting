<?php 
    include("user_session.php"); 
    include('../connect.php');

    date_default_timezone_set('asia/bangkok');	

    $createAt = date('Y-m-d H:i:s', time());
    $detail = $_POST['detail'];
    $room_id= $_POST['room_id'];
    $user_id = $_SESSION['user_id'];

    $query = mysqli_query($conn, "insert into complaint (detail, room_id ,user_id,created_At) 
    values ('$detail', '$room_id','$user_id','$createAt')");
    if ($query) {
        echo 
        "<script>
                alert('แจ้งปัญหาสำเร็จ');
                window.location.href='complaint.php';
        </script>";
    } else {
        echo 
        "<script>
                alert('แจ้งปัญหาไม่สำเร็จ!');
                window.location.href='complaint.php';
        </script>";
    }
  
?> 