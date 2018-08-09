<?php
header("Content-type: text/html; charset=utf-8");
include("../db.php");
   $key=isset($_GET['key'])?$_GET['key']:"";

   if($key=="shan")
   {
	 $id=isset($_GET['id'])?$_GET['id']:"";  
	   //删除单条的消息
	   //修改数据表名字
  // $query1="DELETE FROM search WHERE id=$id";
   $query1="DELETE FROM client_table WHERE id=$id";
   $k2=mysql_query($query1);
	 header("location:main.php?key=gl"); 
	 }
  elseif($key=="sc")
  {
      
    $name ="1120.csv";
    $filename = $_FILES['file']['tmp_name'];
    $file = fopen($filename,'r') or die ("文件无法打开，请重试！");//读取临时文件夹中上传的文件！
	/*
    while(!feof($file))//读取每一条记录
  {
   //$rs = explode(",",fgets($file));//从一条记录中分隔记录得到各个字段
   $rs=fgets($file);
   $cx=iconv("UTF-8","GB2312",$rs);
   $happy="INSERT INTO `search` (`cx`) VALUES('$cx')";
   $m=mysql_query($happy);
     
        
    }
	*/
	$result = input_csv($file); //解析csv 
    $len_result = count($result); 
    if($len_result==0){ 
        echo '没有任何数据！'; 
        exit; 
    } 
      //echo $len_result."<br>";
	//var_dump($result);
    for ($i =0; $i<$len_result; $i++) { //循环获取各字段值

		//修改
		//$Name=$result[$i][0];
		$Name = iconv('gb2312', 'utf-8', $result[$i][0]);
	//	echo "$Name     ";
	//修改
		$Mobile_Number=$result[$i][1];
		//echo "$Mobile_Number     ";
		//修改
		$Order_Number=$result[$i][2];
	//	echo "$Order_Number";
		//echo "<br/>";
	$time=date("Y-m-d h:i:s",time());
	//修改
        $happy="INSERT INTO client_table(Name,Mobile_Number,Order_Number,time) VALUES('$Name','$Mobile_Number','$Order_Number','$time')";
		// $happy="INSERT INTO client_table(Name,Order_Number) VALUES('$Name','$Order_Number')";
		//  $happy="INSERT INTO client_table(Name) VALUES('$Name')";
		 $m=mysql_query($happy);
		 

    } 

	
	//修改数据表名字
   $query1="DELETE FROM client_table WHERE Name=''";
   $k2=mysql_query($query1);
     // echo "上传成功"."<a href='main.php?key=bb'>点此查看预售码报表</a>";
      header("location:main.php?key=gl");
  }
elseif($key=="ssd")
{
	    $query1="DELETE FROM client_table WHERE id>0";
       $k2=mysql_query($query1);
	   echo "正处于删除全部状态";

     $sql1="SELECT * FROM  delete where id =1";
	$query11=mysql_query($sql1);
    $q=mysql_fetch_row($query11);
	echo "$q";
    if($q[pwd]=='$secret')
    {
        //密码正确 执行删除操作
        $query1="DELETE FROM client_table WHERE id>0";
        $k2=mysql_query($query1);
        $text="删除成功";
        @$msg=array(data=>array("code"=>1,"text"=>$text));
        echo $msg=json_encode($msg);
    
    }
    else
        {
         $text="密码错误，无法执行删除操作";
        @$msg=array(data=>array("code"=>0,"text"=>$text));
        echo $msg=json_encode($msg);
    
    }
	
    // $query1="DELETE FROM search WHERE id>0";
    //$k2=mysql_query($query1);
    //header("location:main.php?key=bb");

}
elseif($key=="change")
{
	//echo "当前处于修改状态";
   $id=isset($_GET['id'])?$_GET['id']:"";  
  // $query1="DELETE FROM search WHERE id=$id";
   $query1="DELETE FROM client_table WHERE id=$id";
   $k2=mysql_query($query1);
	 header("location:main.php?key=gl"); 
}
else{
  
     header("location:main.php");


}
 function input_csv($handle) { 
    $out = array (); 
    $n = 0; 
    while ($data = fgetcsv($handle, 10000)) { 
        $num = count($data); 
        for ($i = 0; $i < $num; $i++) { 
            $out[$n][$i] = $data[$i]; 
        } 
        $n++; 
    } 
    return $out; 
}       


?>