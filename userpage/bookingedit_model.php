<?php 
@include("user_session.php"); 
include("../connect.php");

date_default_timezone_set('Asia/Bangkok');
$updateAt = date('Y-m-d H:i:s', time());

    $room_id1 = $_POST['room_id'];
    $purpose = $_POST['purpose'];
    $start= $_POST['start'];
    $end = $_POST['end'];
    $detail = $_POST['detail'];
    $id =  $_SESSION['id'];

    function DateTimeDiff($strDateTime1, $strDateTime2) {
        return (strtotime($strDateTime2) - strtotime($strDateTime1)) /  (60 * 60); // 1 Hour =  60*60
    }

    

    $sql = "SELECT * FROM booking WHERE room_id = '$room_id1' AND ((start BETWEEN ' $start ' AND ' $end ') OR (end BETWEEN ' $start ' AND ' $end')
        OR ('$start' BETWEEN start AND end) OR ('$end' BETWEEN  start  AND end ))";
    
    $sql1 = "UPDATE booking SET room_id='$room_id1',purpose='$purpose',start='$start',end='$end',detail='$detail',updated_At='$updateAt' WHERE bk_id= $id";
    $result = mysqli_query($conn, $sql);
    $start1 =strtotime($start);
    // $query = mysqli_query($conn,$sql1);
    if ($row = mysqli_fetch_array($result)) {
        $self = $row['bk_id']; //ถ้าตรงของตัวเอง
        if($self==$id){
            echo
            // "<script>
            //                 alert('ตรงของตัวเอง');
            //         </script>";
                    $limit_time = DateTimeDiff($start, $end);
                echo $limit_time ;
                if($start1 < time()){
                    echo "<script>
                                    alert('ไม่สามารถแก้ไขได้ เนื่องจากช่วงเวลาไม่ถูกต้อง1');
                                    window.location.href='booking_history.php';
                            </script>";
                }else if($limit_time <= 3 &&  $limit_time >=0.5 ){
                    echo "เวลาที่จอง = " . DateTimeDiff($start, $end) . "<br>";
                    $query = mysqli_query($conn,$sql1);
        
                    if ($query) {
                        echo
                        "<script>
                                    alert('แก้ไขการจองสำเร็จ');
                                    window.location.href='booking_history.php';
                            </script>";
                    } else {
                        echo
                        "<script>
                                    alert('ไม่สามารถแก้ไขการจองได้');
                                    window.location.href='booking_history.php';
                            </script>";
                    }
                }else if($limit_time < 0.5){
                    echo "<script>
                                    alert('เวลาการจองขั้นต่ำ30นาทีต่อการจอง 1 ครั้ง');
                                    window.location.href='booking_history.php';
                            </script>";
                }else if($limit_time >3) {
                    echo "<script>
                                    alert('จำกัดการจองได้ 3 ชั่วโมงต่อการจอง 1 ครั้งเท่านั้น');
                                    window.location.href='booking_history.php';
                            </script>";
                }
        }
        echo
        "<script>
                    alert('ช่วงวันและเวลาดังกล่าวถูกจองแล้ว ผู้ใช้สามารถเช็คตารางการจองเพื่อหาช่วงวันเวลาที่ว่างได้');
                    window.location.href='booking_history.php';
            </script>";
    }else{
        echo
        // "<script> alert('ไม่ตรงใคร '); </script>";
                $limit_time = DateTimeDiff($start, $end);
                echo $limit_time ;
                if($start1 < time()){
                    echo "<script>
                                    alert('ไม่สามารถแก้ไขได้ เนื่องจากช่วงเวลาไม่ถูกต้อง2');
                                    window.location.href='booking_history.php';
                            </script>";
                }else if($limit_time <= 3 &&  $limit_time >=0.5 ){
                    echo "เวลาที่จอง = " . DateTimeDiff($start, $end) . "<br>";
                    $query = mysqli_query($conn,$sql1);
        
                    if ($query) {
                        echo
                        "<script>
                                    alert('แก้ไขการจองสำเร็จ');
                                    window.location.href='booking_history.php';
                            </script>";
                    } else {
                        echo
                        "<script>
                                    alert('ไม่สามารถแก้ไขการจองได้');
                                    window.location.href='booking_history.php';
                            </script>";
                    }
                }else if($limit_time < 0.5){
                    echo "<script>
                                    alert('เวลาการจองขั้นต่ำ30นาทีต่อการจอง 1 ครั้ง');
                                    window.location.href='booking_history.php';
                            </script>";
                }else if($limit_time >3) {
                    echo "<script>
                                    alert('จำกัดการจองได้ 3 ชั่วโมงต่อการจอง 1 ครั้งเท่านั้น');
                                    window.location.href='booking_history.php';
                            </script>";
                }
            
        }
?> 