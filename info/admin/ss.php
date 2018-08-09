<?php
   //此处用于和前端信息进行交换json方式交互
   header("Content-type: text/html; charset=utf-8");
   include ("../db.php");
   $sign=isset($_REQUEST['sign'])&&!empty($_REQUEST['sign'])?$_REQUEST['sign']:"error";
   $bj=isset($_REQUEST['bj'])&&!empty($_REQUEST['bj'])?$_REQUEST['bj']:"error";
   if ($bj==1)
   {
       //根据姓名
	    $query = mysql_query("select * from client_table  WHERE Name='$sign' order by id desc");  
   }
   elseif($bj==2)
   {
	   //根据手机号
	    $query = mysql_query("select * from client_table  WHERE Mobile_Number='$sign' order by id desc"); 
   }
   else
   {
	   //根据订单号
	    $query = mysql_query("select * from client_table  WHERE Order_Number='$sign' order by id desc"); 
   }
   
   
      $count=mysql_num_rows($query);
   if($count==0)
   {
	    @$msg=array(code=>0,txt=>"没有查询到相关信息");	 
   }	   
   else
   {
	   $show="<table class='footable'>";
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
	    @$msg=array(code=>1,data=>$show);	 
   }
	   
	   
	  echo $msg=json_encode($msg);
   
  ?>