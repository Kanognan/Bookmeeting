<?php
 

$conn = mysqli_connect("localhost","root","","Bookmeeting");
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
 
?>