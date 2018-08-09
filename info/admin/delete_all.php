<?php
//header("Content-type: text/html; charset=utf-8");
include("../db.php");
//$pwd=isset($_GET['name'])?$_GET['name']:""; 
$posts =$_POST;
//echo $id;
foreach ($posts as $k => $v){
	$posts[$k] = trim($v);
}
$pwd = $posts["userpwd"];
//$username = $posts["username"];
//echo $pwd;
$sql="SELECT * FROM  `admin` WHERE  `pwd` =  '$pwd'";
$query=mysql_query($sql);
$userinfo=mysql_fetch_row($query);

if(!empty($userinfo)){
	session_start();
	$_SESSION['admin'] = true;
	$query1="DELETE FROM client_table WHERE id>0";
   $k2=mysql_query($query1);
	 header("location:main.php?key=gl"); 
/*	$str=<<<eot
<script language="javascript" type="text/javascript">  
setTimeout("javascript:location.href='main.php'", 1);  
</script> 
eot;
*/
//echo "$str"	;
} else {
 echo "密码错误";
 //header("location:main.php?key=bb");

 echo '<a href="go_bb.php">点击这里返回</a>';
 	$str=<<<eot
<script language="javascript" type="text/javascript">  
setTimeout("javascript:location.href='go_bb.php'", 3000);  
</script> 
eot;
echo "$str"	;

 }
 ?>