<?php 

@include("admin_session.php"); 
include("../connect.php");


$sql = "UPDATE room SET hide_status='no' WHERE room_id='".$_GET['id']."'";
        $query = mysqli_query($conn,$sql);
        if ($query) {
            echo 
            "<script>
                   
                    window.location.href='hidden_room.php';
            </script>";
        } else {
            echo 
            "<script>
                    alert('ไม่สามารถยกเลิกซ่อนได้');
                    window.location.href='hidden_room.php';
            </script>";
        }
?> 