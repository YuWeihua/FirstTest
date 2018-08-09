<?php
@header("Content-type: text/html; charset=utf-8");
$admin=false;
session_start();
if(isset($_SESSION['admin']) && $_SESSION['admin']=== true){
	//echo "你已经成功登陆";
} else {
$_SESSION['admin'] = false;
$str="你还没登陆，无权访问";
$str.='<a href="index.php">点击这里返回</a>';
 	$str.=<<<eot
<script language="javascript" type="text/javascript">  
setTimeout("javascript:location.href='index.php'", 3000);  
</script> 
eot;
die($str);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <title>微信后台管理系统</title>
	<link rel="stylesheet" href="style.css" />
	<script src="../js/jquery.js"></script>
    <style type="text/css">
	body{
		padding:0px;
		margin:0px;
		background-color:<? include("../db.php");
         $query = mysql_query("select * from color where id=1"); 
	     $row=mysql_fetch_array($query);
		 echo $row['color'];
	  ?>;
	  color:green;
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
<table class="footable">
 <thead>
	<tr>
	<th>
	微信后台管理系统
    </th>
     </tr>
	 </thead>
	 </table>
<table class="footable">
<tbody>
<tr>
    <td><a href="main.php?key=dr">信息导入</a></td>
    <td><a href="main.php?key=gl">信息管理</a></td>
	<td><a href="main.php?key=bb">数据报表</a></td>
	<td><a href="main.php?key=sz">基本设置</a></td>
</tr>
</tbody>
</table>
  <?php
   include("../db.php");
   $show="";
 
   $key=isset($_GET['key'])?$_GET['key']:"dr";

  if($key=="dr")
  {
      $show.="<form action='shezhi.php?key=sc' method='post' name='form' enctype='multipart/form-data'>";
      $show.="<table class='footable'>";
      $show.="<tbody>";
	  $show.="<tr>";
	  $show.="<td>批量导入";
	  $show.="</tr>";
	  
      $show.="<tr>";
      $show.="<td>";
      $show.="上传的文件应为csv格式，将excel另存为csv格式即可,首行不用标注";
      $show.="</td>";
      $show.="</tr>";
      
	   $show.="<tr>";
      $show.="<td>";
      $show.="三列数据分别为 名字 手机号 订单号";
      $show.="</td>";
      $show.="</tr>";
	  
      $show.="<tr>";
      $show.="<td>";
      $show.=" <input type='file' name='file'>";
      $show.="</td>";
      $show.="</tr>";
      
       $show.="<tr>";
      $show.="<td>";
      $show.="<input type='submit' name='sub' value='上传'>";
      $show.="</td>";
      $show.="</tr>";
	  
  
      $show.="<tbody>";
      $show.="</table>";
      $show.="</form>";

	  $show.="<form method='POST' action='add_data_result.php'>";
      $show.="<table class='footable'>";
      $show.="<tbody>";
	  $show.="<tr>";
	  $show.="</td>";
	  $show.="<td>单独导入";
	  $show.="</td>";
	  $show.="</tr>";
	  
	  $show.="<tr>";
      $show.="<td>";
      //$show.="<input type='text' name='name' placeholder='姓名' value=''>";
      $show.="<input name='Name' placeholder='姓名' value='' id='courseplace' type='text' class='input' / >";
	  $show.="</td>";
      $show.="</tr>";
	  
	  $show.="<tr>";
      $show.="<td>";
      $show.="<input name='Mobile_Number' placeholder='手机号' value='' id='courseplace' type='text' class='input' / >";
	  $show.="</td>";
      $show.="</tr>";
	  
	  $show.="<tr>";
      $show.="<td>";
      $show.="<input name='Order_Number' placeholder='订单号' value='' id='courseplace' type='text' class='input' / >";
	  $show.="</td>";
      $show.="</tr>";
	  
	  $show.="<tr>";
      $show.="<td>";
     // $show.="<input type='submit' value='添加' id='courseplace' class='input' />";
	 $show.="<input type='submit' value='添加' id='courseplace' >";
	  $show.="</td>";
      $show.="</tr>";
	  
      $show.="<tbody>";
      $show.="</table>";
      $show.="</form>";
  }
  elseif($key=="gl")
  {   
      $show="<table class='footable'>";
      $show.="<tbody>";
	  $show.="<tr>";
	  $show.="<td>";
	  $show.="<input name='ssk' placeholder='搜索框' value='' id='ssd' type='text' class='input' / >";
	  $show.="</td>";
	  $show.="<td><input name='stype' type='radio' value='1' checked='true'/>  姓名 <input name='stype' type='radio' value='2' />  手机号  <input name='stype' type='radio' value='3' />  订单号";
	  $show.="</td>";
	  $show.="<td><input type='image'  value='查询' onClick='messageData()'  src='http://gz.vhot119.com/Public/Theme/default/Home/Images/352.png'/>";
	  $show.="</td>";
	  $show.="</tr>";
	  $show.="<tbody>";
	  $show.="</table>";
	  
	  
	   $show.="<div id='showplace'>";
      $show.="<table class='footable'>";
      $show.="<tbody>";
	  $show.="<tr>";
	   //$show.="<td>兑换码";
	   $show.="<td>姓名";
	   $show.="</td>";
	  //  $show.="<td>使用状态";
	  $show.="<td>手机号";
	  $show.="</td>";
	  $show.="<td>订单号";
	  $show.="</td>";
	  $show.="<td>添加时间";
	  $show.="</td>";
	  $show.="<td>修改";
	  $show.="</td>";
	  $show.="<td>删除";
	  $show.="</td>";
	  $show.="</tr>";
	 
	   
	//  $query = mysql_query("select * from search order by id");
    // 修改数据表名字	
	  $query = mysql_query("select * from client_table order by id desc"); 
	  while($row=mysql_fetch_array($query)){
	//参数
	    $id=$row['id'];
		//修改
		$Name=$row['Name'];
		$Mobile_Number=$row['Mobile_Number'];
		$Order_Number=$row['Order_Number'];
		$time=$row['time'];
		
		$show.="<tr>";
	   $show.="<td>";
	  $show.="$Name";
      $show.="</td>";
	   $show.="<td>";
	  $show.="$Mobile_Number";
      $show.="</td>";
	  $show.="<td>";
	  	  $show.="$Order_Number";
      $show.="</td>";
	  $show.="<td>";
	  	  $show.="$time";
      $show.="</td>";
	   $show.="<td>";
	  $show.="<a href='change_data.php?key=change&id=$id'>修改</a>";
	  $show.="<td>";
	  $show.="<a href='shezhi.php?key=shan&id=$id'>删除   </a>";
	  $show.="</tr>";
	   }
	  
      $show.="</tbody>";
	  $show.="</table>";
       $show.="</div>";

  }
 
 elseif($key=="bb")
  {
	   $sql0 = mysql_query("select * from client_table") ;
      $row1 = mysql_num_rows($sql0);
	  
	  $show.="<form method='POST' action='delete_all.php'>";
      $show.="<table class='footable'>";
      $show.="<tbody>";
      $show.="<tr>";
      $show.="<td>名称</td>";
	  $show.="<td>数目</td>";
      $show.="</tr>"; 
	  $show.="<tr>";
      $show.="<td>订单总数</td>";
	  $show.="<td>$row1</td>";
      $show.="</tr>";
	  $show.="<tr>";
      $show.="<td>一键删除</td>"; 
      $show.="<td>";
      $show.="<input name='userpwd' placeholder='删除密码' value='' id='courseplace' type='text'  / >";
	   $show.="<input type='submit' value='全部删除' id='courseplace' >";
	  $show.="</td>";
      $show.="</tr>";  
      $show.="<tbody>";
      $show.="</table>";
      $show.="</form>";
   }
   elseif($key=="sz")
   {
	   
	  $show.="<table class='footable'>";
      $show.="<tbody>";
      $show.="<tr>";
      $show.="<td>背景颜色</td>";
	  $show.="<td bgcolor='#FFFFF0'><input name='color' type='radio' value='#FFFFF0' checked='true' onclick='selectcolor()'/></td>";
	  $show.="<td bgcolor='#757575'><input name='color' type='radio' value='#757575' onclick='selectcolor()'/></td>";
	  $show.="<td bgcolor='#B8B8B8'><input name='color' type='radio' value='#B8B8B8' onclick='selectcolor()'/></td>";
	  $show.="<td bgcolor='#668B8B'><input name='color' type='radio' value='#668B8B' onclick='selectcolor()'/></td>";
	  $show.="<td bgcolor='#43CD80'><input name='color' type='radio' value='#43CD80' onclick='selectcolor()'/></td>";
	  $show.="<td bgcolor='#EEC591'><input name='color' type='radio' value='#EEC591' onclick='selectcolor()'/></td>";
      $show.="</tr>"; 
	  $show.="<tr>";
      
      $show.="<tbody>";
      $show.="</table>";
	   
	   
   }
  echo $show;

   ?>
 
  
    

</body>
   
<script type="text/javascript">
function disp_prompt()
  {
  var name=prompt("请输入删除的密码","")
  if (name!=null && name!="")
    {
		//echo ("输入密码完毕");
		//header("location:main.php");
      var url='shezhi.php?key=ssd&secret='+name;
      $.getJSON(url,function(d) {
	   if(d['code']==1)
       {
           // alert(d['text']);
           document.write(d['text'])
       }
         else
         {
             // alert(d['text']);
              document.write(d['text'])
         }
	});
        
        //document.write("" + name + " 今天过得怎么样？")
    }
  }
function messageData()  
   {
	 
	 var sign = document.getElementById( "ssd" ).value;
     var radios = document.getElementsByName("stype");  
	 document.getElementById( "showplace" ).innerHTML='';
                                  
    //根据 name集合长度 遍历name集合  
    for(var i=0;i<radios.length;i++)  
    {   
        //判断那个单选按钮为选中状态  
        if(radios[i].checked)  
        {  
            //弹出选中单选按钮的值  
           var bj=radios[i].value;	
          //  alert(bj);		   
        }   
    }   
	// alert(sign);
		if (sign=="")
	{
		alert("信息不能为空");
	}
	else
	{
		var url='ss.php?bj='+bj;
	    $.getJSON(url,{sign:sign},function(d) {
		if(d['code']==0)
		{
			// document.getElementById( "showplace" ).innerHTML='';
			//$("#showplace").empty();
			document.getElementById( "showplace" ).innerHTML=d['txt'];
		}
		else
		{
		
			   document.getElementById( "showplace" ).innerHTML='';
			   document.getElementById( "showplace" ).innerHTML=d['data'];
		
		  
		 }
		
   
	  
	});
	}	
   }
   function selectcolor()
   {
	   var radiox = document.getElementsByName("color"); 
	    for(var i=0;i<radiox.length;i++)  
    {   
        //判断那个单选按钮为选中状态  
        if(radiox[i].checked)  
        {  
            //弹出选中单选按钮的值  
           var color=radiox[i].value;	
            //alert(bj);	
           
		   //更改数据库里面的值
		   var url='color.php';
	    $.getJSON(url,{color:color},function(d) {
		if(d['code']==1)
		{
		   document.body.style.backgroundColor=color;
		}
		});
		   
		   
		   
           		   
        }   
    }
   }
  
  
</script>
</html>