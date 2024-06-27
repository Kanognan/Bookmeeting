<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .hnav {
            padding: 0.7em 0em !important;
            
        }

        nav {
            background-color: #004c6d;
        }

        .hnav img{
            width: 10em;
        }

        .hnav li a,
        .hnav a {
            color: white;
            /* width: 9em; */
            /* text-align: center; */
            border-radius: 20px;
        }

        .hnav li a:hover,
        .hnav a:hover {
            color: white;
            background-color: #64839b;
        }

        .dropdown .btn{
            background-color: #64839b;
            color : white;
            width: 9em;
            border-radius: 20px !important;
        }

        .dropdown .btn:hover,
        .dropdown .btn:focus {
            background: #b1bfcc;
        }
        .dropa a{
            color: black !important;
        }
        .dropa a:hover{
            color: white !important;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg p-3 fixed-top ">
        <div class="container hnav">
            <!-- <a class="navbar-brand" href="#">Navbar</a> -->
            <img src="../room_img/cp_logo.png" alt="logo">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse align-self-center navdrop" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto ">
                    <li class="nav-item">
                        <a class="nav-link mx-2" aria-current="page" href="admin_index.php">หน้าหลัก</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2" href="add_room.php">เพิ่มห้องประชุม</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2" href="hidden_room.php">ห้องที่ถูกซ่อน</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2" href="complaint_check.php">ปัญหาผู้ใช้งาน</a>
                    </li>
                    <li class="nav-item dropdown">
                        <button type="button" class="btn" onclick="document.location='../logout.php'">ออกจากระบบ</button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</body>

</html>