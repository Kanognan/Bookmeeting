<?php 

@include("admin_session.php"); 
    
    include('../connect.php');
    date_default_timezone_set('Asia/Bangkok');
    $createAt = date('Y-m-d H:i:s', time());
    
    $room_name = $_POST['room_name'];
    $seat_qty= $_POST['seat_qty'];
    $location = $_POST['location'];
    $admin_id = $_SESSION['admin_id'];  
    $gadget = $_POST['gadget'];
 
    $date = date("Ymd");
    $numrand = (mt_rand());
    $upload = $_FILES['room_img'];
    if($upload != ''){
        $path = "../room_img/";
        $type = strrchr($_FILES['room_img']["name"],".");
        $newname = $date.$numrand.$type;
        $file_img = $path .$newname;
        if(move_uploaded_file($_FILES["room_img"]["tmp_name"],$file_img )){
            echo "ไฟล์ภาพชื่อ". $newname."อัพโหลดแล้ว";
        }else{
            echo "เกิดข้อผิดพลาด" ;
        }
        echo  $file_img;
    }

    $query  =mysqli_query($conn, "insert into room (room_name, seat_qty ,location,admin_id,gadget,room_img,created_At) 
    values ('$room_name', '$seat_qty','$location','$admin_id','$gadget','$newname','$createAt')");
    if ($query) {  
        echo
        "<script>
                    alert('เพิ่มห้องสำเร็จ');
                    window.location.href='admin_index.php';
            </script>";
    } else {
        echo
        "<script>
                    alert('ไม่สามารถเพิ่มห้องได้');
                    window.location.href='admin_index.php';
            </script>";
    }
    
?> 