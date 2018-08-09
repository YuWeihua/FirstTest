<?php
  /*此部分为数据库连接*/

    $dbname = '';
     $link = mysql_connect("localhost:3306","root","root");
     if (!$link)
     {
        die('Could not connect: ' . mysql_error());
     }
      mysql_query("SET NAMES 'UTF8'");          
      // mysql_query("SET NAMES 'GB2312'"); 
           mysql_select_db($dbname, $link);
           if(!mysql_select_db($dbname,$link)) {
                 die("Select Database Failed: " . mysql_error($link));
                     }
					 
 

?>