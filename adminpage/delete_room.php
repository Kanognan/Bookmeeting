<?php 
@include("admin_session.php"); 
include("../connect.php");

date_default_timezone_set('Asia/Bangkok');
$time = date('Y-m-d H:i:s', time());

$sql = "UPDATE room SET deleted_At='$time' WHERE room_id='".$_GET['id']."'";
        $query = mysqli_query($conn,$sql);
        if ($query) {
            echo 
            "<script>
                    alert('ลบข้อมูลสำเร็จ');
                    window.location.href='admin_index.php';
            </script>";
        } else {
            echo 
            "<script>
                    alert('ไม่สามารถลบข้อมูลได้');
                    window.location.href='admin_index.php';
            </script>";
        }
?> 