<?php 
	include("../db.php");
	$id=isset($_GET['id'])?$_GET['id']:""; 
	$posts =$_POST;

foreach ($posts as $k => $v){
	$posts[$k] = trim($v);
}

   // $id = $_POST['id'];
	
	echo $id;
$Name = $posts["name"];
echo $Name;
//$Name = iconv('gb2312', 'utf-8', $posts["name"]);
$Mobile_Number = $posts["mobile_number"];
$Order_Number=$posts["order_number"];

$happy="update client_table(Name,Mobile_Number,Order_Number) VALUES('$Name','$Mobile_Number','$Order_Number' where id=$id)";

		if($m=mysql_query($happy)){
		echo "<script>alert('修改文章成功');</script>";
	}else{
		echo "<script>alert('修改文章失败');</script>";
	}
	header("location:main.php?key=gl");
	/*
	$id = $_POST['id'];
	$title = $_POST['title'];
	$author = $_POST['author'];
	$description = $_POST['description'];
	$content = $_POST['content'];
	$dateline =  time();
	$updatesql = "update article set title='$title',author='$author',description='$description',content='$content',dateline=$dateline where id=$id";
	if(mysql_query($updatesql)){
		echo "<script>alert('修改文章成功');window.location.href='article.manage.php';</script>";
	}else{
		echo "<script>alert('修改文章失败');window.location.href='article.manage.php';</script>";
	}
	*/
?>