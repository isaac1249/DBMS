<!DOCTYPE html>
<html lang="en">
<head>
<link rel=stylesheet type="text/css" href="carrental.css">
<title>首頁</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
    font-family: Arial, Helvetica, sans-serif;
}
</style>
</head>
<body>
<div class="navbar">
<a href="usercarrental.php">首頁</a>
<a href="usercontact.php">聯絡我們</a>

<a href="logout.php" class="right">登出</a>
<a class="right">
<?php
include "checksession.php";



$sql = "select name from registerhere where uname='$usercheck'";
$link = mysqli_connect("localhost","root","","userInformation");
$r = mysqli_query($link,$sql);
$rs = mysqli_fetch_array($r);
echo "Hello! ".$rs['name'];

?>
</a>
<a href="myorder.php" class="right">我的訂單

</a>
</div>
<div class="bg-image"></div>


<div class="bg-text">

<div class="header">
  <h1>歡迎老司機</h1>
  <p>隨時隨地都能租車!</p>
  <button class="button"><a href="rent.php"/><span>開始您的旅程</span></button>
</div>





  </div>
</div>



</body>
</html>

</div>
