<?php @include("user_session.php"); ?>
<?php


include('../connect.php');
date_default_timezone_set('Asia/Bangkok');
$createAt = date('Y-m-d H:i:s', time());

$purpose = $_POST['purpose'];
$detail = $_POST['detail'];
$start = $_POST['start'];
$end = $_POST['end'];
$user_id = $_SESSION['user_id'];
$room_id = $_POST['room_id'];

function DateTimeDiff($strDateTime1, $strDateTime2)
{
    return (strtotime($strDateTime2) - strtotime($strDateTime1)) / (60 * 60); // 1 Hour =  60*60
}


$sql = "SELECT * FROM booking WHERE room_id = '$room_id' AND ((start BETWEEN ' $start ' AND ' $end ') OR (end BETWEEN ' $start ' AND ' $end')
        OR ('$start' BETWEEN start AND end) OR ('$end' BETWEEN  start  AND end ))";

$result = mysqli_query($conn, $sql);
$start1 = strtotime($start);

//เงื่อนไข เช็คว่าถ้ามีค่าซ้ำ ให้แสดงออกมา
if ($row = mysqli_fetch_array($result)) {
    echo
        "<script>
                            alert('ช่วงวันและเวลาดังกล่าวถูกจองแล้ว ผู้ใช้สามารถเช็คตารางการจองเพื่อหาช่วงวันเวลาที่ว่างได้');
                            window.location.href='booking.php';
                    </script>";
} else {
    $limit_time = DateTimeDiff($start, $end);
    echo $limit_time;
    if ($start1 < time()) {
        echo "<script>
                            alert('ไม่สามารถจองได้ เนื่องจากช่วงเวลาไม่ถูกต้อง');
                            window.location.href='booking.php';
                    </script>";
    } else if ($limit_time <= 3 && $limit_time >= 0.5) {
        echo "เวลาที่จอง = " . DateTimeDiff($start, $end) . "<br>";
        $query = mysqli_query($conn, "insert into booking (room_id,user_id,purpose,detail,start,end,created_At) 
            values ('$room_id','$user_id','$purpose','$detail', '$start','$end','$createAt')");

        if ($query) {
            echo
                "<script>
                            alert('จองห้องสำเร็จ');
                            window.location.href='booking_history.php';
                    </script>";
        } else {
            echo
                "<script>
                            alert('ไม่สามารถจองห้องได้');
                            window.location.href='booking.php';
                    </script>";
        }
    } else if ($limit_time < 0.5) {
        echo "<script>
                            alert('เวลาการจองขั้นต่ำ30นาทีต่อการจอง 1 ครั้ง');
                            window.location.href='booking.php';
                    </script>";
    } else if ($limit_time > 3) {
        echo "<script>
                            alert('จำกัดการจองได้ 3 ชั่วโมงต่อการจอง 1 ครั้งเท่านั้น');
                            window.location.href='booking.php';
                    </script>";
    }
}

?>