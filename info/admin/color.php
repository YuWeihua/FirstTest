<?php
   //此处用于和前端信息进行交换json方式交互
   header("Content-type: text/html; charset=utf-8");
   include ("../db.php");
   $color=isset($_REQUEST['color'])&&!empty($_REQUEST['color'])?$_REQUEST['color']:"error";
   if($color=="error")
   {
	    @$msg=array(code=>0,txt=>"信息出错 无法更改");	  
   }
   else
   {
	    
		  $happy="update color set color='$color' where id=1";
		if(mysql_query($happy)){
		 @$msg=array(code=>1,data=>"颜色更新成功");	 
	}
	else{
		 @$msg=array(code=>0,txt=>"信息出错 无法更改");	  
	}
	   
   }
  
	  
   
	   
	   
	  echo $msg=json_encode($msg);
   
  ?>