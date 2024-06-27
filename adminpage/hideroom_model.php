<?php 
@include("admin_session.php"); 
include("../connect.php");



$sql = "UPDATE room SET hide_status='yes' WHERE room_id='".$_GET['id']."'";
        $query = mysqli_query($conn,$sql);
        if ($query) {
            echo 
            "<script>
                    window.location.href='admin_index.php';
            </script>";
        } else {
            echo 
            "<script>
                    alert('ไม่สามารถซ่อนได้');
                    window.location.href='admin_index.php';
            </script>";
        }
?> 