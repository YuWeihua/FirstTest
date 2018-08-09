<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <title>微信后台处理</title>
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
<form method="POST" action="chuli.php">
<table class="footable">
 <thead>
	<tr>
	<th>
	微信后台处理系统
    </th>
     </tr>
	 </thead>
	 </table>

<table class="footable">
<tbody>
<tr>
<td><input name="username" placeholder="用户名" value="" id="courseplace" type="text" class="input" /></td>
</tr>
<tr>
<td><input name="userpwd" placeholder="密码" value="" id="courseplace" type="text" class="input" /></td>
</tr>
<tr>
<td><input type="submit" value="登录" id="courseplace" class="input" /></td> 
</tr>

</tbody>
</table>
</form>
</body>
</html>