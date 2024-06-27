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
    <title>calendar</title>
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

        .search form {
            background-color: white !important;
            padding: 3em 10em;
        }

        .formcol {
            background-color: #f6f6f6;
            border-radius: 30px;
            padding: 2em;
            margin: 0;
            box-shadow: 0px 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        .nomargin {
            margin: 0 !important;
        }

        .nomargin .btn-more {
            background-color: #64839b;
            color: white;
            width: 10em;
            border-radius: 20px !important;
        }

        .nomargin .btn-more:hover {
            background-color: #b1bfcc !important;
            font-weight: bold;
        }

        .nomargin label {
            font-weight: bold;
        }

        iframe {
            width: 70%;
            display: block;
            margin: 0 auto;
            background-color: #f6f6f6;
            padding: 2em;
            border-radius: 20px !important;
        }

        .con {
            margin: 1em 6em 5em;
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

    <?php include("user-menu.php"); ?>
    <div class="imghead">
        <div class="container" style="color:white !important;">
            <div class="z-3 position-absolute p-5 rounded-3"
                style="padding: 0 !important; margin-top:1em; color:white !important;">
                <nav aria-label="breadcrumb"
                    style="background-color: transparent; color:white !important;  text-shadow: -1px 4px 10px rgba(0,0,0,0.3);">
                    <ol class="breadcrumb" style="margin:0 !important; color:white !important;">
                        <li class="breadcrumb-item"><a href="user-index.php"
                                style="color: white !important; font-size: 1em;">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active" aria-current="page"
                            style="color: white !important; font-size: 1em;">ตารางการจองห้องประชุม</li>
                    </ol>
                </nav>
            </div>
        </div>
        <img src="../room_img/two.jpg" alt="room" class="img">
        <h1>
            ตารางการจองห้องประชุม
        </h1>
    </div>
    <div class="container con">
        <div class="bgsearch">
            <div class="search">
                <form action="" class="">
                    <div class="formcol row g-3">
                        <div class="col nomargin"></div>
                        <div class="col-8 nomargin row ">
                            <label for="inputPassword" class="col-sm-4 col-form-label"><i
                                    class="bi bi-calendar-minus-fill"></i>&nbsp;
                                &nbsp;เลือกห้องที่ต้องการ</label>
                            <div class="col-sm-8">
                                <select class="form-select" aria-label="Default select example" name="room_id">
                                    <?php
                                    include('../connect.php');
                                    $query = mysqli_query($conn, "select * from room WHERE hide_status = 'no'");
                                    while ($row = mysqli_fetch_array($query)) {
                                        $check_del = $row['deleted_At'];
                                        if (empty($check_del)) {
                                            ?>
                                            <option value="<?php echo $row['room_id']; ?>"><?php echo $row['room_name']; ?>
                                            </option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col nomargin"></div>
                        <div class="col-2 nomargin ">
                            <button type="submit" class="btn btn-more"><i class="bi bi-search"></i>&nbsp;
                                &nbsp;แสดงข้อมูล</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <iframe
            src="https://calendar.google.com/calendar/embed?height=550&wkst=1&bgcolor=%23ffffff&ctz=Asia%2FBangkok&title=%E0%B8%9B%E0%B8%8F%E0%B8%B4%E0%B8%97%E0%B8%B4%E0%B8%99%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%88%E0%B8%AD%E0%B8%87&hl=th&src=a2Fub2duYW4ucEBra3VtYWlsLmNvbQ&src=YWRkcmVzc2Jvb2sjY29udGFjdHNAZ3JvdXAudi5jYWxlbmRhci5nb29nbGUuY29t&src=Y19jbGFzc3Jvb205ODg2NWE0OUBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&src=Y19jbGFzc3Jvb203NmQ4MGQ3YUBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&color=%23039BE5&color=%2333B679&color=%230047a8&color=%23137333"
            style="border:solid 1px #777" width="1000" height="650" frameborder="0" scrolling="no"></iframe>
    </div>

    <?php include("user-footer.php"); ?>


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