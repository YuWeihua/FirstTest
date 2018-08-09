<?php
   //此处用于和前端信息进行交换json方式交互
   header("Content-type: text/html; charset=utf-8");
   include ("../db.php");
   $sign=isset($_REQUEST['sign'])&&!empty($_REQUEST['sign'])?$_REQUEST['sign']:"error";
     //判断快递属于哪个公司
    function snbelong($a)
   {
	    preg_match_all("/[0-9]{1}/",$a,$arrNum);
        preg_match_all("/[a-zA-Z]{1}/",$a,$arrAl);
        $nums=count($arrNum[0]);
		$zms=count($arrAl[0]);
		if($nums==18&&$zms==0)
		{
			$pic="http://csvip-kd.stor.sinaapp.com/yuantong.png";
		}
		elseif($nums==12&&$zms==0)
		{
		   $pic="http://csvip-kd.stor.sinaapp.com/shentong.png";	
		}
		else
		{
			$pic="http://csvip-kd.stor.sinaapp.com/wuliuxinxi.png";
		}
		return $pic;
   }
   if ($sign=="error")
   {
    @$msg=array(code=>0,txt=>"抱歉，数据发生错误");   
   }
   else
   {
	//读取数据
	//读取该记录的条数
     $result = mysql_query("SELECT * FROM `client_table` WHERE `Mobile_Number`='$sign'");
	 $count=mysql_num_rows($result); 
	 if ($count==0)
	 {
		 $txt="未查询到相关信息";
		 @$msg=array(code=>2,txt=>$txt);
	 }
	 else
	 {
		$show="";
		$i=1;
		$ad[0]="test";
       while($row = mysql_fetch_array($result))
     {
		$name=$row['Name'];
		$sn=$row['Order_Number'];
		//订单号相同的只做一次展示
		for ($j=0;$j<=$i-1;$j++)
		{
			if($sn==$ad[$j])
			{
				$flag=1;
				break;
			}
			else
			{
				$flag=0;
			}
		}
		if($flag==0)
		{
			$ad[$i]=$sn;
			$i++;
			$picx=snbelong($sn);
			$url='"http://m.kuaidi100.com/result.jsp?nu='.$sn.'"';
		    $show.="<table class='footable'>";
	      	$show.="<tr >";
		    $show.="<td style='width:100px;height:100px' rowspan='4'>";
	    	$show.="<img src='".$picx."' style='-webkit-border-radius: 100px;width:75px;heigth:75px;margin-left:12px;'/>";
		    $show.="</td>";
            $show.="<td style='line-height:25px'><p style='margin-left:10px;'>姓名：".$name."</p></td>";
	        $show.="<td style='width:100px;' rowspan='4' bgcolor='#C5C1AA' onclick='location.href=".$url.";'><p style='text-align:center;'>戳这查看物流信息</p></td>";
		    $show.="</tr>";
		    $show.="<tr><td  style='line-height:25px'><p style='margin-left:10px;'>手机号：".$sign."</p></td></tr>";
             $show.="<tr><td  style='line-height:25px'><p style='margin-left:10px;'>订单号</p></td></tr>";
		    $show.="<tr><td  style='line-height:25px'><p style='margin-left:10px;'>".$sn."</p></td></tr>";
		    $show.="<tr></tr>";
	        $show.="</table><br><br>";
		}
		
		
		
		
     }
	
	 	 
        @$msg=array(code=>1,data=>$show);	 
	 } 
	   
   }

  
   
   
   
   
   
     echo $msg=json_encode($msg);




?>