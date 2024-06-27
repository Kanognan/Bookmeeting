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
    <title>Booking</title>
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

        label.form-label {
            margin: 0;
        }

        .card-body .btn-more {
            background-color: #64839b;
            margin: 0em 1em;
            color: white;
            width: 8em;
            border-radius: 20px !important;
        }

        .card-body .btn-more:hover {
            background-color: #b1bfcc !important;
            font-weight: bold;
        }

        .card-body .btn-cancel {
            background-color: #df8a85;
            color: white;
            width: 8em;
            border-radius: 20px !important;
            margin: 0.5em;
        }

        .card-body .btn-cancel:hover {
            background-color: #f3c4c0 !important;
            font-weight: bold;
        }

        .card-edit {
            margin: 5em;
        }

        .card-img {
            padding: 0 !important;
        }

        .card-body-form form {
            padding: 2em;
        }

        .card-edit h3 {
            padding: 1em 1em;
            font-weight: bold;
        }

        .card-body-form {
            background-color: #f8f8f8;
        }

        .card-header {
            background-color: #64839b !important;
            color: white !important;
        }

        .card {
            margin: 4em !important;
        }

        input,
        textarea,
        select {
            margin-top: 0.7em !important;
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
    </style>

</head>

<body>
    <?php include "user-menu.php"; ?>
    <div class="imghead">
        <div class="container" style="color:white !important;">
            <div class="z-3 position-absolute p-5 rounded-3"
                style="padding: 0 !important; margin-top:1em; color:white !important;">
                <nav aria-label="breadcrumb"
                    style="background-color: transparent; color:white !important;  text-shadow: -1px 4px 10px rgba(0,0,0,0.3);">
                    <ol class="breadcrumb" style="margin:0 !important; color:white !important;">
                        <li class="breadcrumb-item"><a href="user_index.php" style="color: white !important; font-size: 1em;">หน้าหลัก</a>
                        </li>
                        <li class="breadcrumb-item"><a href="room_detail.php" style="color: white !important; font-size: 1em;">รายละเอียดเพิ่มเติม</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page" style="color: white !important; font-size: 1em;">
                            จองห้องประชุม</li>
                    </ol>
                </nav>
            </div>
        </div>
        <img src="../room_img/two.jpg" alt="room" class="img">
        <h1>
            จองห้องประชุม
        </h1>
    </div>
    <div class="container">
        <div class="card card-edit row">
            <h3 class="card-header">จองห้องประชุม</h3>
            <!-- <div class="row content"> -->
            <div class="col-sm-12 col-12 card-body card-body-form">
                <form action="booking_model.php" class="row g-3" method="POST">
                    <div class="col-md-6">
                        <label for="roomID" class="form-label">ห้องที่ต้องการจอง</label>
                        <select id="inputState" class="form-select" name="room_id" required>
                            <option value="" disabled selected hidden>กดเพื่อเลือกห้อง</option>
                            <?php
                            include('../connect.php');
                            $query = mysqli_query($conn, "select * from room  WHERE hide_status = 'no' ORDER BY room_name");
                            while ($row = mysqli_fetch_array($query)) {
                                $check_del = $row['deleted_At'];
                                if (empty($check_del)) {
                                    ?>
                                    <option value="<?php echo $row['room_id']; ?>"><?php echo $row['room_name']; ?></option>
                                <?php }
                            } ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="purpose" class="form-label"></label>เหตุผลการใช้ห้อง</label>
                        <input type="text" class="form-control" name="purpose" required>
                    </div>
                    <div class="col-md-6">
                        <label for="start" class="form-label"></label>วันเวลาที่ใช้จอง</label>
                        <input type="datetime-local" class="form-control" name="start" id="start" required>
                        <div class="form-text">จองอย่างน้อย 30 นาที และจองได้สูงสุด 3 ชั่วโมง <a href="../check_room.php">เช็คเวลาจอง</a></div>
                        
                    </div>
                    <div class="col-md-6">
                        <label for="end" class="form-label">วันเวลาที่สิ้นสุด</label>
                        <input type="datetime-local" class="form-control" name="end" id="end" required>
                    </div>

                    <div class="col-md-12">
                        <label for="detail" class="form-label">รายละเอียด / หมายเหตุ</label>
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="รายละเอียด" id="" style="height: 10em"
                                name="detail"></textarea>
                        </div>
                    </div>
                    <div class="col-12 text-center">
                        <button type="reset" class="btn btn-cancel">ลบข้อมูล</button>
                        <button type="submit" class="btn btn-more">จองห้อง</button>
                    </div>
                </form>
            </div>
            <!-- </div> -->
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