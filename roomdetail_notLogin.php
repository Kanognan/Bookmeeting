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
    <title>Room Detail</title>
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

        .roomimg img {
            width: 100%;
        }

        .table th {
            width: 15em;
        }

        .roomimg,
        .roomdetail {
            padding: 0em !important;
        }

        .roomdetail h3 {
            font-weight: bold;
        }

        .roomdetail {
            /* margin: 15em 0em !important; */
            background-color: #f6f6f6;
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

        .infor {
            padding: 2em
        }

        .content {
            padding: 5em 0em;
        }
    </style>
</head>

<body>
    <?php include("index-menu.php"); ?>
    <?php
    include("connect.php");
    $id = $_GET['id'];
    $query = mysqli_query($conn, "select * from room WHERE room_id = $id");
    while ($row = mysqli_fetch_array($query)) { ?>
        <div>
            <div class="container" style="color:white !important;">
                <div class="z-3 position-absolute p-5 rounded-3"
                    style="padding: 0 !important; margin-top:1em; color:white !important;">
                    <nav aria-label="breadcrumb"
                        style="background-color: transparent; color:white !important;  text-shadow: -1px 4px 10px rgba(0,0,0,0.3);">
                        <ol class="breadcrumb" style="margin:0 !important; color:white !important;">
                            <li class="breadcrumb-item"><a href="index.php"
                                    style="color: white !important; font-size: 1em;">หน้าหลัก</a></li>
                            <li class="breadcrumb-item active" aria-current="page"
                                style="color: white !important; font-size: 1em;">รายละเอียดเพิ่มเติม</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="imghead">
                <img src="room_img/<?php echo $row['room_img']; ?>" alt="room" class="img">
                <h1>
                    <?php echo $row['room_name']; ?>
                </h1>
            </div>
            <div class="container">
                <div class="row content">
                    <div class="col roomimg">
                        <img src="room_img/<?php echo $row['room_img']; ?>" alt="room">
                    </div>
                    <div class="col roomdetail">
                        <div class="infor">
                            <h3>รายละเอียด
                                <?php echo $row['room_name']; ?>
                            </h3>
                            <hr>
                            <table class="table table-striped">
                                <tr>
                                    <th scope="row">ชื่อห้อง </th>
                                    <td>
                                        <?php echo $row['room_name']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">อาคาร</th>
                                    <td>
                                        <?php echo $row['location']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">จำนวนคนต่อห้อง</th>
                                    <td>
                                        <?php echo $row['seat_qty']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">อุปกรณ์</th>
                                    <td>
                                        <?php echo $row['gadget']; ?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    <?php }
    ?>
                    <div class="button d-flex justify-content-center">
                        <a href="index.php" class="btn btn-cancel">ยกเลิก</a>
                        <a href="userpage/booking.php" class="btn btn-more">จองห้อง</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php include("footer.php"); ?>

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