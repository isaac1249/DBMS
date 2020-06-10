<html>
<head>
<link rel="stylesheet" href="carrental.css">
<title>註冊</title>
<style>
.error {color: red;}
</style>
</head>
<body>
<div class="navbar">
  <a href="carrental.php">首頁</a>
  <a href="contact.php">聯絡我們</a>
  <a href="login.php" class="right">登入</a>
  <a href="registration.php" class="right">註冊</a>
</div>

<?php
include 'dbcreation.php';

$cname = $cdob = $cphone = $cssin = $cuname = $cpwd = "";

if(isset($_POST['register'])){


if (empty($_POST["name"])) {
$cname = "姓名不能為空";
}else {
$name = $_POST['name'];
}

if (empty($_POST["dob"])) {
$cdob = "生日不能為空";
}else {
$dob =  $_POST['dob'];
}

if (empty($_POST["phone"])) {
$cphone = "電話號碼不能為空";
}else {
$phone= $_POST['phone'];
}

if (empty($_POST["ssin"])) {
$cemail = "身分證不能為空";
}else {
$email= $_POST['ssin'];
}

if (empty($_POST["uname"])) {
$cuname = "帳號不能為空";
}else {
$uname= $_POST['uname'];
}

if (empty($_POST["pwd"])) {
$cpwd = "密碼不能為空";
}else {
$pwd = $_POST['pwd'];
}

function validate_phone_number($phone)
{
     // Allow +, - and . in phone number
     $filtered_phone_number = filter_var($phone, FILTER_SANITIZE_NUMBER_INT);
     // Remove "-" from number
     $phone_to_check = str_replace("-", "", $filtered_phone_number);
     // Check the lenght of number
     // This can be customized if you want phone number from a specific country
     if (strlen($phone_to_check) < 10 || strlen($phone_to_check) > 14) {
        return false;
     } else {
       return true;
     }
}


if(!empty($name) && !empty($dob) && !empty($phone)  && !empty($ssin) && !empty($pwd) && validate_phone_number($phone) == true){
mysqli_select_db($con,"userinformation");
$query="insert into registerhere values('$name,'$phone','$dob','$ssin','$uname','$pwd')";
if(mysqli_query($con,$query))
{
echo "data inserted successfully<br>";
}
else{
echo "data not inserted".mysqli_error($con);
}
}
}
?>


<div class="bg-image"></div>


<div class="bg-text">
<center>
<pre>
<h3> 註冊</h3>
<hr>
<form method="post">
姓名 :    <input type ="text" name="name" /><span class = "error">*<?php echo $cname;?></span>

生日 :    <input type = "text" name = "dob" placeholder = "yyyy-mm-dd" /><span class = "error">*<?php echo $cdob;?></span>

手機號碼 : <input type ="text" name="phone" /><span class = "error">*<?php echo $cphone;?></span>

身分證 :  <input type ="text" name="ssin" /><span class = "error">*<?php echo $cssin;?></span>

帳號 :    <input type ="text" name="uname" /><span class = "error">*<?php echo $cuname;?></span>

密碼 :    <input type ="password" name="pwd" /><span class = "error">*<?php echo $cpwd;?></span>


<input type ="submit" name="register" value="送出"/>
</form>
</pre>
</center>






  </div>
</div>


</body>
</html>
