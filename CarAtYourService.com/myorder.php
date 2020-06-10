<!DOCTYPE html>
<?php
	include "checksession.php";



$sql = "select name from registerhere where uname='$usercheck'";
$link = mysqli_connect("localhost","root","","UserInformation");
$r = mysqli_query($link,$sql);
$rs = mysqli_fetch_array($r);

	?>
<html>
<head>
<!--<link rel="stylesheet" href="carrental.css">-->
<title>訂單</title>
<meta charset="UTF-8">

<script src="bootstrap/js/jquery-1.11.2.min.js"></script>

<script src="bootstrap/js/bootstrap.min.js"></script>

<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

</head>
<body><!--
<div class="navbar">
<a href="usercarrental.php">首頁</a>
<a href="usercontact.php">聯絡我們</a>

<a href="#" class="right">

  <?php
     echo "Hello! ".$rs['name'];
	?>
</a>
  <a href="myorder.php" class="right">我的訂單</a>

</div>

<div class="bg-image1"></div>

<div class="bg-text">

<div class="header">
-->


	<h2 style="margin-left: 550px; margin-top: 100px;">我的訂單</h2>

<table class="table table-bordered" style="max-width: 800px; margin-left: 250px;">

<thead>

<tr>

<th>代號</th>

<th>名稱</th>

<th>價格</th>

<th>產地</th>

<th>購買數量</th>

<th>操作</th>

</tr>

</thead>

<tbody>

<?php

//require_once "./DBDA.class.php";

//$db = new DBDA();

if(!empty($_SESSION["gwd"])){

$arr = $_SESSION["gwd"];

$sum = 0;

$numbers = count($arr);

foreach($arr as $k=>$v){

//$v[0];$v[1];

$sql = "select * from request where ids='{$v[0]}'";

$a = $db->query($sql,0);

//var_dump($v[1]);

echo "<tr>

<td>{$v[0]}</td>

<td>{$a[0][1]}</td>

<td>{$a[0][2]}</td>

<td>{$a[0][3]}</td>

<td>{$v[1]}</td>

<td><a href='goodsdel.php?zj={$k}'>刪除</a></td>

</tr>";

$dj = $a[0][2];

$sum = $sum+$dj*$v[1];

}

}

//echo "<div style='margin-left: 250px;'>購物車中商品總數為{$numbers}個,商品總價為:{$sum}元</div>";

?>

</tbody>

</table>



 <?php

$sql = "select * from request where uname='$usercheck'";
$link = mysqli_connect("localhost","root","","userinformation");
$r = mysqli_query($link,$sql);
$rs = mysqli_fetch_array($r,MYSQLI_ASSOC);
echo "編號 : ".$rs['ordno']."<br>";
echo "Starting date : ".$rs['doi']."<br>";
echo "Ending point : ".$rs['dor']."<br>";

?>
</div>





  </div>
</div>



</body>
</html>
