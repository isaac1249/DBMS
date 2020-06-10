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

$name = $dob = $phone = $ssin = $uname = $pwd = $pass2 = "";


if (isset($_POST["name"])) {
  $name = $_POST["name"];
}
if (isset($_POST["dob"])) {
  $dob = $_POST["dob"];
}
if (isset($_POST["phone"])) {
  $phone = $_POST["phone"];
}
if (isset($_POST["ssin"])) {
  $ssin = $_POST["ssin"];
}
if (isset($_POST["uname"])) {
  $uname = $_POST["uname"];
}
if (isset($_POST["pwd"])) {
  $pwd = $_POST["pwd"];
}
if (isset($_POST["pass2"])) {
  $pass2 = $_POST["pass2"];
}

if($name!=""&& $ssin!=""&& $uname!=""&& $pwd!=""&& $pass2!="")
{
  $link=mysqli_connect("localhost","root","","userinformation");
  mysqli_select_db($link,"userinformation");

  $sql_str = "select * from registerhere where uname = '".$uname."'";
  $result = mysqli_query($link,$sql_str);

  if(mysqli_fetch_row($result)==false)
  {
    if($pwd==$pass2)
    {
      $insert_str = "insert into registerhere(name,phone,dob,ssin,uname,pwd) Values('$name','$phone','$dob','$ssin','$uname','$pwd')";
      mysqli_query($link,$insert_str);

      header("Location:rent.php");
    }
    else {
        echo "<font color=red>密碼與確認密碼不符</font>";
    }
  }
  else {
        echo "<font color=red>此帳號已存在<p></font>";
  }
}

?>


<div class="bg-image"></div>

<div class="bg-text">
<center>
<pre>
<h3> 註冊</h3>
<hr>
<form method="post" action="new.php">
  <p>
姓名 :    <input type ="text" name="name">*<br>

身分證 :  <input type ="text" name="ssin">*<br>

帳號 :    <input type ="text" name="uname">*<br>

密碼 :    <input type ="password" name="pwd">*<br>

確認密碼 :  <input type ="password" name="pass2">*<br>

生日 :    <input type = "text" name = "dob" placeholder = "yyyy-mm-dd"><br>

手機號碼 : <input type ="text" name="phone"><br>

<input type ="submit" name="submit" value="送出"><input type ="reset" name="submit2" value="重設">
</form>
</pre>
</center>

  </div>
</div>


</body>
</html>
