<?php @include("user_session.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
    <title>Booking History</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Kanit', sans-serif;
        }

        body {
            font-family: 'Kanit', sans-serif;
            padding-top: 5em;
        }

        table {
            width: 100%;
        }

        .box {
            background-color: #f8f8f8;
        }

        .box h4 {
            background-color: #64839b;
            margin: 0;
            color: white;
            padding: 0.5em;
        }

        thead th {
            background-color: #b1bfcc !important;
        }

        .recommend {
            border: 8px solid;
            text-align: center;
            color: #004c6d;
            padding: 10px;
            width: 100%;
            background-color: #f8f8f8;
            border-image: repeating-linear-gradient(to bottom right, #004c6d, #64839b, #b1bfcc, #004c6d) 20;
            box-shadow: 0px 10px 15px -3px rgba(0, 0, 0, 0.1);
            margin-bottom: 1em;
        }

        .recom {
            padding: 5em !important;
        }

        .table .btn-edit {
            background-color: #eec549;
            color: white;
            width: 5em;
            border-radius: 20px !important;
        }

        .table .btn-edit:hover {
            background-color: #ebd8b1 !important;
            font-weight: bold;
        }

        .table .btn-cancel {
            background-color: #df8a85;
            color: white;
            width: 5em;
            border-radius: 20px !important;
        }

        .table .btn-cancel:hover {
            background-color: #f3c4c0 !important;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <?php
    include("../connect.php");
    $x = 1;
    $y = 1;

    ?>
    <?php
    include("user-menu.php");
    ?>
    <div class="container" style="color:white !important;">
        <div class="z-3 position-absolute p-5 rounded-3"
            style="padding: 0 !important; margin-top:2em; color:white !important;">
            <nav aria-label="breadcrumb"
                style="background-color: transparent; color:gray !important;  text-shadow: -1px 4px 10px rgba(0,0,0,0.3);">
                <ol class="breadcrumb" style="margin:0 !important; color:white !important;">
                    <li class="breadcrumb-item"><a href="user_index.php"
                            style="color: gray !important; font-size: 1em;">หน้าหลัก</a></li>
                    <li class="breadcrumb-item active" aria-current="page"
                        style="color: gray !important; font-size: 1em;">ประวัติการจองห้องประชุม</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="container recom">
        <h1 class="recommend">ประวัติการจองห้องประชุม</h1>
        <div class="box">
            <?php
            date_default_timezone_set('Asia/Bangkok');

            $user_id = $_SESSION['user_id'];
            $sql = "SELECT * from user INNER JOIN booking ON user.user_id=booking.user_id
                    INNER JOIN room ON booking.room_id=room.room_id WHERE  user.user_id = $user_id ORDER BY start";
            $query = mysqli_query($conn, $sql);
            $query2 = mysqli_query($conn, $sql);
            ?>
            <h4>ที่กำลังจะถึง</h4>
            <table class="table table-bordered text-center">

                <thead>
                    <tr>
                        <th scope="col">ลำดับ</th>
                        <th scope="col">วัน / เวลา (เริ่ม)</th>
                        <th scope="col">วัน / เวลา (สิ้นสุด)</th>
                        <th scope="col">ห้อง</th>
                        <th scope="col">จุดประสงค์</th>
                        <th scope="col">แก้ไข</th>
                        <th scope="col">ยกเลิก</th>
                        <th scope="col"> สถานะ</th>
                    </tr>
                </thead>

                <?php while ($row = mysqli_fetch_array($query)) {
                    $time = time();
                    $end = strtotime($row['end']);
                    if ($end > time()) {


                        $time1 = $row['start'];
                        $time2 = $row['end'];
                        $starttime = date("d/m/Y (H:i)", strtotime($time1)); //เวลา
                        $endtime = date("d/m/Y  (H:i)", strtotime($time2)); //เวลา
                        ?>
                        <tbody>
                            <tr>
                                <td>
                                    <?php echo $x ?>
                                </td>
                                <td>
                                    <?php echo $starttime; ?>
                                </td>
                                <td>
                                    <?php echo $endtime; ?>
                                </td>
                                <td>
                                    <?php echo $row['room_name']; ?>
                                </td>
                                <td>
                                    <?php echo $row['purpose']; ?>
                                </td>
                                <td>    <?php $check_del1 = $row['deleted_At'];
                                    $check_hide1 = $row['hide_status'];
                                    if (empty($check_del1) && $check_hide1 == "no") {
                                        ?><a href="booking_edit.php?id=<?php echo $row['bk_id']; ?>&roomid=<?php echo $row['room_id']; ?>&roomname=<?php echo $row['room_name']; ?>"
                                        class="btn btn-sm btn-edit"><i class="bi bi-pencil"></i>&nbsp;แก้ไข</a><?php
                                    } else {
                                        ?> 
                                        <a href="#" class="btn btn-sm btn-edit" onclick="return alert('ไม่สามารถแก้ไขได้')">
                                            <i class="bi bi-pencil"></i>&nbsp;แก้ไข
                                        </a><?php
                                    } ?>
                                   </td>

                                <td><a href="booking_delete.php?id=<?php echo $row['bk_id']; ?>"
                                        onclick="return confirm('ต้องการลบการจองห้องหรือไม่')" class="btn btn-sm btn-cancel"><i
                                            class="bi bi-trash3-fill"></i>&nbsp;ลบ</a></td>
                                <?php $x++; ?>
                                <td>
                                    <?php $check_del = $row['deleted_At'];
                                    $check_hide = $row['hide_status'];
                                    if (empty($check_del) && $check_hide == "no") {
                                        echo "ปกติ";
                                    } else {
                                       ?> <a href="#"  onclick="return alert('ห้องที่จองถูกลบหรือปิดการมองเห็นจากผู้ดูแล')">การจองถูกยกเลิก</a>
                                       <?php
                                    } ?>
                                </td>

                                <?php $x++; ?>
                            </tr>
                        </tbody>

                    <?php }
                } ?>

            </table>
        </div>

        <hr>

        <div class="box">
            <h4>ที่จบไปแล้ว</h4>
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th scope="col">ลำดับ</th>
                        <th scope="col">วัน / เวลา (เริ่ม)</th>
                        <th scope="col">วัน / เวลา (สิ้นสุด)</th>
                        <th scope="col">ห้อง</th>
                        <th scope="col">จุดประสงค์</th>
                    </tr>
                </thead>

                <?php while ($row1 = mysqli_fetch_array($query2)) {
                    $end1 = strtotime($row1['end']);
                    if ($end1 < time()) {
                        $time1 = $row1['start'];
                        $time2 = $row1['end'];
                        $starttime = date("d/m/Y (H:i)", strtotime($time1)); //เวลา
                        $endtime = date("d/m/Y  (H:i)", strtotime($time2)); //เวลา
                        ?>
                        <tbody>
                            <tr>
                                <td>
                                    <?php echo $y ?>
                                </td>
                                <td>
                                    <?php echo $starttime; ?>
                                </td>
                                <td>
                                    <?php echo $endtime; ?>
                                </td>
                                <td>
                                    <?php echo $row1['room_name']; ?>
                                </td>
                                <td>
                                    <?php echo $row1['purpose']; ?>
                                </td>
                                <?php $y++; ?>
                            </tr>
                        </tbody>
                    <?php }
                } ?>

            </table>
        </div>
    </div>

    <?php include "user-footer.php"; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
        integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD"
        crossorigin="anonymous"></script>
</body>

</html>