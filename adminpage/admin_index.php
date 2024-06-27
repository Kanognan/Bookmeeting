<?php 
@include("admin_session.php"); ?>
<!DOCTYPE html>
<html lang="en">

</html>

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
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
      font-family: 'Kanit', sans-serif;
    }

    body {
      font-family: 'Kanit', sans-serif;
      padding-top: 6em;
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
      background-color: #e5e9ee;
      font-size: 1.5em;
      color: #004c6d;
      /* width: 4em !important; */
      border-radius: 50% !important;
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
  </style>
</head>

<body>
  <?php 
  include("../connect.php");
  ?>
  <?php include("admin-menu.php"); ?>
  <?php include("admin-imgslide.php"); ?>


  <div>
    <div class="recommend">
      <div class="container">
        <h2>รายการห้องประชุม</h2>
      </div>
    </div>

    <div class="container recom">
      <div class="mt-5 d-flex justify-content-center text-center row d-grid gap-4">
        <?php
        $hide = "no";
        $query = mysqli_query($conn, "select * from room  WHERE hide_status = '$hide' ORDER BY room_name");
        while ($row = mysqli_fetch_array($query)) {
          $check_del = $row['deleted_At'];
          if (empty($check_del)) {
        ?>
            <div class="card col-6 col-md-4 col-lg-4 col-xl-4 p-2 bg-light border roomimg">
              <img src="../room_img/<?php echo $row['room_img']; ?>" class="card-img-top" alt="room">
              <div class="card-body">
                <h5 class="card-title"><?php echo $row['room_name']; ?></h5>
                <p class="card-text">ที่นั่ง &nbsp;: &nbsp;<?php echo $row['seat_qty']; ?> <br>สถานที่ &nbsp;: &nbsp; <?php echo $row['location']; ?></p>
                <a href="edit_room.php?id=<?php echo $row['room_id']; ?>" class="btn btn-more" data-bs-toggle="tooltip" data-bs-placement="bottom" title="แก้ไข"><i class="bi bi-pencil-square"></i></a>
                <a href="delete_room.php?id=<?php echo $row['room_id']; ?>" onclick="return confirm('ต้องการลบห้องหรือไม่')" class="btn btn-more" data-bs-toggle="tooltip" data-bs-placement="bottom" title="ลบ"><i class="bi bi-trash-fill"></i></a>
                <a href="hideroom_model.php?id=<?php echo $row['room_id']; ?>" onclick="return confirm('ต้องการซ่อนห้องหรือไม่')" class="btn btn-more" data-bs-toggle="tooltip" data-bs-placement="bottom" title="ซ่อน"><i class="bi bi-eye-slash-fill"></i></a>
              </div>
            </div>
        <?php
          }
        }
        ?>
      </div>
    </div>
  </div>
  <!-- ----------------------------- -->
  <?php include("admin-footer.php"); ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</body>

</html>