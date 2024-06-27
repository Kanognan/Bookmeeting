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
	<title>CheckRoom</title>
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

		.recom {
			margin-bottom: 5em;
		}

		.recom img {
			width: 270px;
			height: 200px;
		}

		.footrow {
			padding: 2em 0em 3em;
		}

		.col-centered {
			float: none;
			margin: 0 auto;
		}



		h4 {
			text-align: center;
		}

		.content {
			margin-top: 3em;
			margin-bottom: 10em !important;
		}
		.button .btn-more {
            background-color: #64839b;
            color: white;
            width: 8em;
            border-radius: 20px !important;
        }

        .button .btn-more:hover {
            background-color: #b1bfcc !important;
            font-weight: bold;
        }
		h4{
			margin-bottom: 2em !important;
			font-weight: bolder !important;
			background-color: #64839b;
			padding: 1em;
			margin: 0em 8em;
			color: white !important;
			border-radius: 20px !important;
		}
	</style>
</head>

<body>
	<?php include "index-menu.php"; ?>
	<div class="container content">
		<h4>กรุณาเลือกห้องและวันที่ ที่ต้องการเช็คการจอง</h4>
		<div class="row">
			<div class="col"></div>
			<div class="col-sm-8 col-12 button">
				<form class="d-flex" action="check_room.php" method="POST">
					<select class="form-select" aria-label="Default select example" name="room_id" required>
						<?php
						require_once('thaidate.php');
						include('connect.php');
						$query = mysqli_query($conn, "select * from room WHERE hide_status = 'no' ");
						while ($row = mysqli_fetch_array($query)) {
							$check_del = $row['deleted_At'];
							if (empty($check_del)) {
								?>
								<option value="<?php echo $row['room_id']; ?>"><?php echo $row['room_name']; ?></option>
								<?php
							}
						}
						?>
					</select>
					<input class="form-control me-2" name="date" type="date" placeholder="Search" aria-label="Search"
						required>
					<button class="btn btn-more" type="submit" name="submit">ค้นหา</button>
				</form>

				<?php if (isset($_POST['submit'])) {

					$room_id = $_POST['room_id'];
					$date = $_POST['date'];
					$query = mysqli_query($conn, "select * from booking where room_id=$room_id ORDER BY start ASC");
					$x = 1;
					$y = 1;
					$g = 1;
					echo "<table class='table text-center table-bordered content table-striped table-hover'>";
					while ($row = mysqli_fetch_array($query)) {
						$dater = $row['start'];
						$newdate = date("Y-m-d", strtotime($dater)); //วันที่
				
						if ($newdate == $date) {
							$time1 = $row['start'];
							$time2 = $row['end'];
							$starttime = date("H:i", strtotime($time1)); //เวลา
							$endtime = date("H:i", strtotime($time2)); //เวลา
				
							if ($x == 1) {
								echo "<thead >
								<tr>
									<th colspan='4' class='table-primary'>วันที่" . thai_date_fullmonth(strtotime($newdate)) . "</th>
								</tr>
								<tr>
									<th>ลำดับ</th>
									<th>เริ่ม</th>
									<th>สิ้นสุด</th>
									<th>กิจกรรม</th>
								</tr>
							</thead>";
								$x--;
								$y = $y + 1;
							}
							echo "<tbody ><tr>
									<td>" . $g++ . "</td>
									<td>" . $starttime . "</td>
									<td>" . $endtime . "</td>
									<td>" . $row['purpose'] . "</td>
								</tr></tbody>";
						}
					}
					if ($y == 1) {
						echo "<br> ห้องยังไม่ถูกจองในวันนี้ :) ";
					}
					echo "</table>";
					//
				}
				?>
			</div>
			<div class="col"></div>
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