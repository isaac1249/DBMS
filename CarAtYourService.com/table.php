<?php
include "dbcreation.php";
mysqli_select_db($con,"userinformation");
$sq = "create table registerhere(name varchar(10),phone int(10),dob DATE,ssin varchar(10),uname varchar(10) primary key,pwd varchar(10));";
if(mysqli_query($con,$sq))
{
echo "table created successfully<br>";
}
else{
echo "table not created".mysqli_error($con);
}
