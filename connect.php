<?php
$conn = mysqli_connect("localhost:3306","root","root","mysite");
if(empty($conn))  {
	die("mysqli_connect failed: ".mysqli_connect_error());
	}
mysqli_query($conn,"set names gb2312");


?>