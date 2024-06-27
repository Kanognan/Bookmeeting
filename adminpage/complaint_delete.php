<?php 
@include("admin_session.php");
include("../connect.php");

date_default_timezone_set('Asia/Bangkok');
$time = date('Y-m-d H:i:s', time());

$sql = "UPDATE complaint SET deleted_At='$time' WHERE complaint_id='".$_GET['id']."'";
echo $_GET['id'];
        $query = mysqli_query($conn,$sql);
        if ($query) {
            echo 
            "<script>
                    alert('ลบข้อมูลสำเร็จ');
                    window.location.href='complaint_check.php';
            </script>";
        } else {
            echo 
            "<script>
                    alert('ไม่สามารถลบข้อมูลได้');
                    window.location.href='complaint_check.php';
            </script>";
        }
?> 