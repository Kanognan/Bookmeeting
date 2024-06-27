<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- <link rel="stylesheet" href="css/index.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
    <title>BookMeeting</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Kanit", sans-serif;
            padding-top: 6em;
        }

        html {
            scroll-behavior: smooth;
        }

        .recommend {
            padding: 1em 0em;
            text-align: center;
            color: white;
            text-shadow: -1px 1px 6px rgba(0, 0, 0, 0.5);
            background: linear-gradient(-45deg, #004c6d, #517590, #8aa1b4, #c4cfd9);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
        }

        @keyframes gradient {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        .recom {
            margin-bottom: 5em;
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

        /* --------------------------------------------------------------- */

        .hero-banner {
            align-items: center;
            display: flex;
            /* height: 100vh; */
            width: 100%;
            position: relative;
            justify-content: center;
            z-index: -1;
        }

        .hero-banner__image {
            border-radius: 20px;
            position: fixed;
            transform: rotate(-15deg);
            width: 100%;
            filter: blur(3px) opacity(15%);
        }

        .search form {
            background-color: white !important;
            padding: 3em 10em;
        }

        .formcol {
            background-color: #f6f6f6;
            border-radius: 30px;
            padding: 2em;
            box-shadow: 0px 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        .nomargin {
            margin: 0 !important;
        }

        .nomargin .btn-more {
            background-color: #64839b;
            color: white;
            width: 8em;
            border-radius: 20px !important;
            margin: 0.5em;
        }

        .nomargin .btn-more:hover {
            background-color: #b1bfcc !important;
            font-weight: bold;
        }

        .nomargin label {
            font-weight: bold;
        }

        /* come in  */
        .come-in {
            transform: translateY(150px);
            animation: come-in 2s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
        }

        .already-visible {
            transform: translateY(0);
            animation: none;
        }

        @keyframes come-in {
            0% {
                transform: translateY(1000px);
                opacity: 0;
            }

            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }

        /* come in  */
        button.search {
            scroll-behavior: smooth;
        }
    </style>
</head>

<body>
    <?php include ("index-menu.php"); ?>
    <?php include ("imgslide.php"); ?>
    <div class="bgsearch">
        <div class="search">
            <form action="" class="">
                <div class="formcol row g-3">
                    <div class="col-md-4 nomargin">
                        <label for="datetime1" class="form-label"><i class="bi bi-calendar-plus-fill"></i>&nbsp;
                            &nbsp;เริ่มต้น</label>
                        <input type="datetime-local" class="form-control" id="datetime1">
                    </div>
                    <div class="col-md-4 nomargin">
                        <label for="datetime2" class="form-label"><i class="bi bi-calendar-minus-fill"></i>&nbsp;
                            &nbsp;สิ้นสุด</label>
                        <input type="datetime-local" class="form-control" id="datetime2">
                    </div>
                    <div class="col-md-2 nomargin">
                        <label for="number1" class="form-label"><i class="bi bi-people-fill"></i>&nbsp;
                            &nbsp;จำนวนคน</label>
                        <input type="number" class="form-control" id="number1">
                    </div>
                    <div class="col-md-2 nomargin d-flex align-items-center justify-content-center first">
                        <button type="button" class="btn btn-more search"
                            onclick="smoothScroll(document.getElementById('second'))"><i class="bi bi-search"></i>&nbsp;
                            &nbsp;ค้นหาห้อง</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="second" id="second">
        <div class="recommend main-content ">
            <div class="container">
                <h2>ห้องประชุมแนะนำ</h2>
            </div>
        </div>
        <div class="hero-banner">
            <img class="hero-banner__image"
                src="https://cache-igetweb-v2.mt108.info/uploads/images-cache/12283/filemanager/0fabcfe7878971e65d6f6299ab78376a_full.JPG" />
        </div>
        <div class="container recom">
            <div class="mt-5 d-flex justify-content-center text-center row d-grid gap-4">
                <?php
                include ('connect.php');
                $query = mysqli_query($conn, "select * from room");
                while ($row = mysqli_fetch_array($query)) {
                    $check_del = $row['deleted_At'];
                    if (empty($check_del)) {
                        ?>
                        <div class="card col-6 col-md-4 col-lg-4 col-xl-4 p-2 bg-light border roomimg pic">
                            <img src="room_img/<?php echo $row['room_img']; ?>" class="card-img-top img "
                                alt="ชื่อรูปที่ถูกดึงออกมา">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <?php echo $row['room_name']; ?>
                                </h5>
                                <p class="card-text">ที่นั่ง &nbsp;: &nbsp;
                                    <?php echo $row['seat_qty']; ?> <br>สถานที่ &nbsp;: &nbsp;
                                    <?php echo $row['location']; ?>
                                </p>
                                <a href="roomdetail_notLogin.php?id=<?php echo $row['room_id']; ?>"
                                    class="btn btn-more">รายละเอียด</a>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>

    <!--END Roominfo -->
    <div class="container-fluid">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15303.74641347202!2d102.81835719750248!3d16.4787474861273!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31228b8217d082cb%3A0xb58fd61bc8e85e11!2sCollege%20of%20Computing%20Khon%20Kaen%20University!5e0!3m2!1sen!2sth!4v1678964601217!5m2!1sen!2sth"
            width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <?php include ("footer.php"); ?>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
        integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD"
        crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="slide.js"></script>

</body>

</html>