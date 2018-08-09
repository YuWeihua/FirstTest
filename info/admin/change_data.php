<?php
	include("../db.php");
	$id=isset($_GET['id'])?$_GET['id']:""; 
	//读取旧信息
	//$id = $_GET['id'];
	$query = mysql_query("select * from client_table where id=$id");
	$data = mysql_fetch_assoc($query);
	if($_POST)
	{
		$posts =$_POST;

		foreach ($posts as $k => $v){
		$posts[$k] = trim($v);
}

   // $id = $_POST['id'];
	
		//echo $id;
		$Name = $posts["Name"];
		//echo $Name;
//$Name = iconv('gb2312', 'utf-8', $posts["name"]);
	$Mobile_Number = $posts["Mobile_Number"];
		$Order_Number=$posts["Order_Number"];

		$happy="update client_table set Name='$Name',Mobile_Number='$Mobile_Number',Order_Number='$Order_Number' where id=$id";
		
	//$happy="update client_table set Name='$Name'  where id=$id";
		
		
		
		if(mysql_query($happy)){
		echo "<script>alert('修改成功');</script>";
		header("location:main.php?key=gl");
	}
	else{
		echo "<script>alert('修改失败');</script>";
	}
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <title>微信后台单独增加数据</title>
	<link rel="stylesheet" href="style.css" />
    <style type="text/css">
	body{
		padding:0px;
		margin:0px;
	}
	.footable{
		width:100%;
    }
	.footable > tbody > tr > td,.footable > thead > tr > th{
		width:9%;
		font-weight:bold;
	}
	.footable > thead > tr > th{
		font-size:12px;
	}
	.footable > tbody > tr > td{
		padding:1px;
		line-height:16px;
		height:30px;
		font-size:10px;	
	}
	.allwd{
	width:100%;
	font-weight:bold;
	
	}
</style>
</head>
<body>
<form method="POST" action="">
<table class="footable">
 <thead>
	<tr>
	<th>
	单条信息修改系统
    </th>
     </tr>
	 </thead>
	 </table>

<table class="footable">
<tbody>
<tr>
<td><input name="Name"  value="<?php echo $data['Name']?>" id="Name" type="text" class="input" /></td>
</tr>
<tr>
<td><input name="Mobile_Number"  value="<?php echo $data['Mobile_Number']?>" id="Mobile_Number" type="text" class="input" /></td>
</tr>
<tr>
<td><input name="Order_Number"  value="<?php echo $data['Order_Number']?>" id="Order_Number" type="text" class="input" /></td>
</tr>
<tr>

<td><input type="submit" value="保存修改" id="<?php echo $id?>" class="input" /></td> 
</tr>

</tbody>
</table>
</form>
</body>
</html>