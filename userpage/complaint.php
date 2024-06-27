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
    <title>Complaint</title>
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

        .recommend {
            width: 50%;
            padding: 1em 0em;
            border-bottom: 1px solid black;
        }

        .recom {
            margin: 4em 0em;
        }

        .recom img {
            height: 15rem !important;
            width: 100% !important;
            object-fit: cover;
        }

        .roomimg {
            width: 18rem !important;
        }

        .card-body .btn-more {
            background-color: #64839b;
            color: white;
            width: 9em;
            border-radius: 20px !important;
        }

        .card-body .btn-more:hover {
            background-color: #b1bfcc !important;
        }

        .footrow {
            padding: 2em 0em 3em;
        }

        .user {
            text-align: center;
        }

        .card-body .btn-more {
            background-color: #64839b;
            color: white;
            width: 9em;
            border-radius: 20px !important;
        }

        .card-body .btn-more:hover {
            background-color: #b1bfcc !important;
        }

        .report {
            padding: 4em !important;
            background-color: #f6f6f6;
            border-radius: 20px !important;
        }

        .button .btn-more {
            background-color: #64839b;
            color: white;
            width: 7em;
            border-radius: 20px !important;
            margin: 0.5em;
        }

        .button .btn-more:hover {
            background-color: #b1bfcc !important;
            font-weight: bold;
        }

        .button .btn-cancel {
            background-color: #df8a85;
            color: white;
            width: 7em;
            border-radius: 20px !important;
            margin: 0.5em;
        }

        .button .btn-cancel:hover {
            background-color: #f3c4c0 !important;
            font-weight: bold;
        }

        .card-text {
            font-weight: bold;
        }

        .form-text {
            font-size: 0.9em !important;
        }
    </style>
</head>

<body>
    <?php
    include("user-menu.php");
    ?>
    <div class="imghead">
        <div class="container" style="color:white !important;">
            <div class="z-3 position-absolute p-5 rounded-3"
                style="padding: 0 !important; margin-top:1em; color:white !important;">
                <nav aria-label="breadcrumb"
                    style="background-color: transparent; color:white !important;  text-shadow: -1px 4px 10px rgba(0,0,0,0.3);">
                    <ol class="breadcrumb" style="margin:0 !important; color:white !important;">
                        <li class="breadcrumb-item"><a href="user_index.php"
                                style="color: white !important; font-size: 1em;">หน้าหลัก</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page"
                            style="color: white !important; font-size: 1em;">
                            แจ้งปัญหา</li>
                    </ol>
                </nav>
            </div>
        </div>
        <img src="../room_img/one.jpg" alt="room" class="img">
        <h1>
            แจ้งปัญหา
        </h1>
    </div>
    <div class="container recom">
        <!-- <h2 class="recommend">แจ้งปัญหา</h2><br> -->
        <div class="row">
            <div class="col"></div>
            <div class="col-sm-10 col-lg-6 col-12 report">
                <form action="complaint_model.php" method="post">
                    <h5 class="card-text">เลือกห้องที่ต้องการแจ้งปัญหา : </h5>
                    <select class="form-select form-select-sm" name="room_id" class="" required>
                        <?php
                        include('../connect.php');

                        $user_id = $_SESSION['user_id'];
                        $sql = "SELECT * FROM booking INNER JOIN room ON booking.room_id=room.room_id where user_id = '$user_id' group by booking.room_id ";
                        $query = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_array($query)) {
                            $check_del = $row['deleted_At'];
                            if (empty($check_del)) {



                                ?>
                                <option value="<?php echo $row['room_id']; ?>"><?php echo $row['room_name']; ?></option>
                                <?php $x = $row['room_id'];
                            }
                        } ?>
                    </select>
                    <div class="form-text">*สามารถแจ้งปัญหาได้เฉพาะห้องที่ผู้ใช้เคยจองเท่านั้น</div>
                    <br>
                    <h5 class="card-text">แจ้งปัญหาที่พบเจอ : </h5>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="detail"
                        required></textarea><br>
                    <div class="button d-flex justify-content-center">
                        <button type="reset" class="btn btn-cancel">ยกเลิก</button>
                        <button type="submit" class="btn btn-more">ส่งข้อมูล</button>
                    </div>
                </form>
            </div>
            <div class="col"></div>
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