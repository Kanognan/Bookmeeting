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
  <title>Add Room</title>
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

    .card-body .btn-more {
      background-color: #64839b;
      margin: 0em 1em;
      color: white;
      width: 8em;
      border-radius: 20px !important;
    }

    .card-body .btn-more:hover {
      background-color: #b1bfcc !important;
    }

    .card-edit {
      margin: 5em;
    }

    .card-img {
      padding: 0 !important;
    }

    .card-body-form form {
      padding: 2em 4em;
    }

    #hr {
      margin: 3em 0em;
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
  </style>
</head>

<body>
  <?php
  include("../connect.php");
  ?>
  <?php include("admin-menu.php"); ?>
  <div class="container" style="color:white !important;">
    <div class="z-3 position-absolute p-5 rounded-3"
      style="padding: 0 !important; margin-top:1em; color:white !important;">
      <nav aria-label="breadcrumb"
        style="background-color: transparent; color:white !important;  text-shadow: -1px 4px 10px rgba(0,0,0,0.3);">
        <ol class="breadcrumb" style="margin:0 !important; color:gray !important;">
          <li class="breadcrumb-item"><a href="admin_index.php"
              style="color: gray !important; font-size: 1em;">หน้าหลัก</a>
          </li>
          <li class="breadcrumb-item active" aria-current="page" style="color: gray !important; font-size: 1em;">
            เพิ่มห้องประชุม</li>
        </ol>
      </nav>
    </div>
  </div>
  <div class="container">
    <div class="card card-edit">
      <h3 class="card-header">เพิ่มห้องประชุม</h3>
      <div class="card-body card-body-form">
        <form action="addroom_model.php" method="post" enctype="multipart/form-data">

          <!-- ---------------->
          <div class="mb-3 row">
            <label for="room_name" class="col-md-2 col-form-label">ชื่อห้องประชุม : </label>
            <div class="col-md-10">
              <input type="text" class="form-control" id="room_name" name="room_name" required>
            </div>
          </div>
          <!-- ---------------->
          <div class="mb-3 row">
            <label for="seat_qty" class="col-md-2 col-form-label">จำนวนที่นั่ง : </label>
            <div class="col-md-10">
              <input type="text" class="form-control" id="seat_qty" name="seat_qty" required>
            </div>
          </div>
          <!-- ---------------->
          <div class="mb-3 row">
            <label for="location" class="col-md-2 col-form-label">อาคาร : </label>
            <div class="col-md-10">
              <input type="text" class="form-control" id="location" name="location" required>
            </div>
          </div>
          <!-- ---------------->
          <div class="mb-3 row">
            <label for="gadget" class="col-md-2 col-form-label">อุปกรณ์ : </label>
            <div class="col-md-10">
              <input type="text" class="form-control" id="gadget" name="gadget" required>
            </div>
          </div>
          <!-- ---------------->
          <div class="mb-3 row">
            <label for="room_img" class="col-md-2 col-form-label">เพิ่มรูปห้องประชุม : : </label>
            <div class="col-md-10">
              <input type="file" class="form-control" id="room_img" name="room_img" required>
            </div>
          </div>

          <!-- ---------------->
          <hr id="hr">

          <div class="button d-flex justify-content-center">
            <button type="reset" class="btn btn-more">ยกเลิก</button>
            <button type="submit" class="btn btn-more">เพิ่มห้อง</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- ----------------------------- -->
  <?php include("admin-footer.php"); ?>


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