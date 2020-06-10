<?php
include "checksession.php";
$link = mysqli_connect("localhost","root","","userinformation");

$username=$usercheck;
$ordno=$_POST['ordno'];
$phone=$_POST['phone'];
$doi=$_POST['doi'];
$dor=$_POST['dor'];
$carid=$_POST['carid'];
$sql = "INSERT INTO request(uname,ordno,phone,doi,dor,carid) values('$username','$ordno','$phone','$doi','$dor','$carid')";
mysqli_query($link,$sql);
header("location:rent.php");
?>
