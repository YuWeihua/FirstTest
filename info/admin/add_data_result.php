<?php
//header("Content-type: text/html; charset=utf-8");
include("../db.php");
$posts =$_POST;

foreach ($posts as $k => $v){
	$posts[$k] = trim($v);
}
$Name = $posts["Name"];
//$Name = iconv('gb2312', 'utf-8', $posts["name"]);
$Mobile_Number = $posts["Mobile_Number"];
$Order_Number=$posts["Order_Number"];

$happy="INSERT INTO client_table(Name,Mobile_Number,Order_Number) VALUES('$Name','$Mobile_Number','$Order_Number')";


		if(mysql_query($happy)){
		echo "<script>alert('添加成功');</script>";
		header("location:main.php?key=gl");
	}
	else{
		echo "<script>alert('添加失败');</script>";
	}
/*	
if($m=mysql_query($happy))
{
	echo "添加成功";
	echo "<br/>";
	echo $Name;
	echo "<br/>";
	echo $Mobile_Number;
	echo "<br/>";
	echo $Order_Number;
	echo "<br/>";
	header("location:main.php?key=gl");
}
else
{
	echo "添加失败";
}
*/

      

 ?>