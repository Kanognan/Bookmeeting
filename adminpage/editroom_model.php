<?php 

@include("admin_session.php"); 
include("../connect.php");

date_default_timezone_set('Asia/Bangkok');
$updateAt = date('Y-m-d H:i:s', time());

    $room_name = $_POST['room_name'];
    $seat_qty= $_POST['seat_qty'];
    $location = $_POST['location'];
    $gadget = $_POST['gadget'];
    $room_id =  $_SESSION['room_id'];
    
    


if(!file_exists($_FILES['room_img']['tmp_name']) || !is_uploaded_file($_FILES['room_img']['tmp_name'])) {
    echo 'No upload';
    
    $sql = "UPDATE room SET room_id='$room_id',room_name='$room_name',seat_qty='$seat_qty',location='$location',gadget='$gadget',updated_At='$updateAt' where room_id= $room_id";
   
    $query = mysqli_query($conn,$sql);
        if ($query) {
            echo  
            "<script>
                    alert('แก้ไขข้อมูลสำเร็จ');
                     window.location.href='admin_index.php';
                   
            </script>";
            unset ($_SESSION['room_id']);
        } else {
            echo 
            "<script>
                    alert('แก้ไข้ข้อมูลล้มเหลว');
                    window.location.href='admin_index.php';
               
            </script>";
       } 
}else{
    echo 'upload';
      $upload = $_FILES['room_img'];
       $date = date("Ymd");
    $numrand = (mt_rand());
  
    
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
    
        $sql = "UPDATE room SET room_id='$room_id',room_name='$room_name',seat_qty='$seat_qty',location='$location',gadget='$gadget',room_img='$newname',updated_At='$updateAt' where room_id= $room_id";
   
    $query = mysqli_query($conn,$sql);
        if ($query) {
            echo  
            "<script>
                    alert('แก้ไขข้อมูลสำเร็จ');
                     window.location.href='admin_index.php';
                   
            </script>";
            unset ($_SESSION['room_id']);
        } else {
            echo 
            "<script>
                    alert('แก้ไข้ข้อมูลล้มเหลว');
                    window.location.href='admin_index.php';
               
            </script>";
       } 
}
   
    

?> 