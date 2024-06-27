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
    <link rel="stylesheet" type="text/css" href="css/register.css">

    <title>Register</title>
    <!-- <style>
        body {
            color: #fff;
            background: #67899b;
            font-family: 'Kanit', sans-serif;
        }
    </style> -->
</head>

<body>
    <div class="signup-form">
        <form action="register-model.php" method="post">
            <h2>ลงทะเบียน</h2>
            <p>กรุณากรอกแบบฟอร์มนี้เพื่อสร้างบัญชี</p>
            <hr>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="bi bi-person-circle"></i>
                        </span>
                    </div>
                    <input type="text" class="form-control" name="username" placeholder="ชื่อผู้ใช้งาน" required="required">
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="bi bi-people-fill"></i>
                        </span>
                    </div>
                    <input type="text" class="form-control" name="fullname" placeholder="ชื่อ-นามสกุล" required="required">
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="bi bi-envelope-at-fill"></i>
                        </span>
                    </div>
                    <input type="email" class="form-control" name="email" placeholder="อีเมล" required="required">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="bi bi-person-fill-lock"></i>
                        </span>
                    </div>
                    <input type="password" class="form-control" name="password1" placeholder="รหัสผ่าน" required="required">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="bi bi-person-fill-lock"></i>
                        </span>
                    </div>
                    <input type="password" class="form-control" name="password2" placeholder="ยืนยันรหัสผ่าน" required="required">
                </div>
            </div>
            <div class="form-group d-flex justify-content-center">
                <button type="submit" class="btn btn-primary btn-lg btn-block register" name="register">ลงทะเบียน</button>
            </div>
        </form>
        <div class="text-center">มีบัญชีอยู่แล้ว <a href="login.php">เข้าสู่ระบบที่นี่</a></div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</body>

</html>