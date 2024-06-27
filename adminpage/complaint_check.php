<?php
@include("admin_session.php"); ?>
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
    <title>Problem</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Kanit', sans-serif;
        }

        body {
            font-family: 'Kanit', sans-serif;
            padding-top: 6em;
        }

        .imghead {
            height: 20rem;
            position: relative;
            overflow: hidden;
        }

        .imghead img {
            height: 20rem;
            width: 100%;
            object-fit: cover;
            filter: blur(3px);
        }

        .imghead h1 {
            position: absolute;
            color: white;
            top: 45%;
            text-align: center;
            font-weight: bold;
            width: 100%;
            text-shadow: -1px 1px 6px rgba(0, 0, 0, 0.79);
        }

        .recom {
            margin: 5em;
        }

        tbody .btn-cancel {
            background-color: #df8a85;
            color: white;
            width: 4em;
            border-radius: 20px !important;
        }

        tbody .btn-cancel:hover {
            background-color: #f3c4c0 !important;
            font-weight: bold;
        }

        table,
        th,
        td,
        tr {
            border: 1px solid #b1bfcc !important;
        }

        thead th {
            background-color: #64839b !important;
            padding: 1em !important;
            font-size: 1.1em;
            font-weight: 200;
            color: white !important;
        }
    </style>
</head>

<body>

    <?php include("admin-menu.php");
    include('../connect.php');

    $sql = "SELECT * FROM room INNER JOIN complaint ON room.room_id=complaint.room_id  INNER JOIN user ON complaint.user_id=user.user_id ORDER BY complaint.created_At ASC"; //ใช้ where deleteAt = '' ไม่ได้ 
    $query = mysqli_query($conn, $sql);
    ?>
    <div class="imghead">
        <div class="container" style="color:white !important;">
            <div class="z-3 position-absolute p-5 rounded-3"
                style="padding: 0 !important; margin-top:1em; color:white !important;">
                <nav aria-label="breadcrumb"
                    style="background-color: transparent; color:white !important;  text-shadow: -1px 4px 10px rgba(0,0,0,0.3);">
                    <ol class="breadcrumb" style="margin:0 !important; color:white !important;">
                        <li class="breadcrumb-item"><a href="admin_index.php"
                                style="color: white !important; font-size: 1em;">หน้าหลัก</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page"
                            style="color: white !important; font-size: 1em;">
                            ปัญหาผู้ใช้งาน</li>
                    </ol>
                </nav>
            </div>
        </div>
        <img src="../room_img/one.jpg" alt="room" class="img">
        <h1>
            ปัญหาผู้ใช้งาน
        </h1>
    </div>
    <div class="container recom">
        <!-- <h2 class="recommend">ปัญหาผู้ใช้งาน</h2> -->
        <div class="problem text-center">
            <table class="table table-striped ">
                <thead class="table">
                    <tr>
                        <th class="table-active" scope="col">ห้อง</th>
                        <th class="table-active" scope="col">ปัญหา</th>
                        <th class="table-active" scope="col">ชื่อผู้ใช้</th>
                        <th class="table-active" scope="col">วัน/เวลาที่รายงาน</th>
                        <th class="table-active" scope="col">จัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count = 0;
                    while ($row = mysqli_fetch_array($query)) {
                        $check_del = $row['deleted_At'];
                        if (empty($check_del)) {
                            $count++;
                            $dater = $row['created_At'];
                            $newdate = date("d-m-y / H:i", strtotime($dater));
                            ?>
                            <tr>
                                <td width="25%">
                                    <?php echo $row['room_name']; ?>
                                </td>
                                <td width="25%">
                                    <?php echo $row['detail']; ?>
                                </td>
                                <td width="10%">
                                    <?php echo $row['user_name']; ?>
                                </td>
                                <td width="20%">
                                    <?php echo $newdate; ?>
                                </td>
                                <td width="10%">
                                    <a href="complaint_delete.php?id=<?php echo $row['complaint_id']; ?>"
                                        onclick="return confirm('ต้องการลบหรือไม่')" class="btn btn-cancel btn-sm">ลบ</a>
                                </td>
                            </tr>
                        <?php }
                    }
                    if ($count == 0) {
                        echo "ยังไม่มีการแจ้งปัญหา";
                    } ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php include "admin-footer.php"; ?>


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