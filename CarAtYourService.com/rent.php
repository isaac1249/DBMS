<?php
	include "checksession.php";



$sql = "select name from registerhere where uname='$usercheck'";
$link = mysqli_connect("localhost","root","","userInformation");
$r = mysqli_query($link,$sql);
$rs = mysqli_fetch_array($r);

	?>
<html>
<head>
<link rel="stylesheet" href="carrental.css">
<title>租車</title>
</head>
<body>
<div class="navbar">
  <a href="usercarrental.php">首頁</a>
  <a href="usercontact.php">聯絡我們</a>

  <a href="logout.php" class="right">登出</a>
  <a class="right">
  <?php
     echo "Hello! ".$rs['name'];

	?>
	</a>
  <a href="myorder.php" class="right">我的訂單

	</a>

</div>
<?php

function build_order_no()
{
return date('Ymd').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);
}
//include 'dbcreation.php';

$cphone = $cdoi = $cdor = $ccarid ="";

//if(isset($_POST['sub'])){


if (empty($_POST["phone"])) {
$cphone="<font color=red>手機號碼不能為空</font>";
}else {
$phone = $_POST['phone'];
}

if (empty($_POST["doi"])) {
$cdoi="<font color=red>請選擇開始日期</font>";
}else {
$doi = $_POST['doi'];
}

if (empty($_POST["dor"])) {
$cdor="<font color=red>請選擇結束日期</font>";
}else {
$dor = $_POST['dor'];
}

if (empty($_POST["carid"])) {
$ccarid="<font color=red>請選擇車型</font>";
}else {
$carid = $_POST['carid'];
}

$ordno=build_order_no();


$username=$usercheck;
if(!empty($phone) && !empty($doi) && !empty($dor) && !empty($carid)  ){
  mysqli_select_db($link,"userinformation");
	$sql = "INSERT INTO request(uname,ordno,phone,doi,dor,carid) values('$username','$ordno','$phone','$doi','$dor','$carid')";
	mysqli_query($link,$sql);
	header("location:myorder.php");
}
//}

?>


<div class="bg-image2"></div>


<div class="bg-text">





    <form method="post">
    手機號碼 : <input type="number" name="phone" value="" size="10" /><span class = "error">*<?php echo $cphone;?></span>  <br><br>
    租車日期 : <input type="date" name="doi"><span class = "error">*<?php echo $cdoi;?></span> <br><br>
    還車日期 : <input type="date" name="dor"><span class = "error">*<?php echo $cdor;?></span> <br><br>
    <label>車型 : </label>
             <select name="carid"><span class = "error">*<?php echo $ccarid;?></span>
               <option value = "1">TOYOTA AURIS NT$2800</option>
               <option value = "2">TOYOTA New ALTIS NT$2500</option>
               <option value = "3">Toyota New Yaris NT$1800</option>
               <option value = "4">MAZDA MAZDA3 4D NT$2800</option>
               <option value = "5">MAZDA MAZDA3 5D NT$2800</option>
               <option value = "6">Toyota Corolla Altis NT$2200</option>
               <option value = "7">Nissan LIVINA NT$1800</option>
               <option value = "8">HONDA FIT S NT$2000</option>
               <option value = "9">Honda City</option>
               <option value = "10">Dzire</option>
               <option value = "11">WagonR</option>
               <option value = "12">Kwid</option>
               <option value = "13">Ciaz</option>
               <option value = "14">Verna</option>
               <option value = "15">Tiago</option>
               <option value = "16">Kwid</option>
               <option value = "17">Brezza</option>
             </select>*<br><br>
    備註 : <textarea name="sprq" rows="4" cols="20">
    </textarea><br><br>

    <input type="submit" value="提交" name="sub"/>
</form>
 </div>
</div>



</body>
</html>
