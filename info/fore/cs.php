<!DOCTYPE html>
<html>
<head>
<title>查询</title>
<link rel="stylesheet" href="style.css">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
<link rel="stylesheet" href="style.css">
<script src="../js/jquery.js"></script>
<link rel="stylesheet" href="../css/style.css">

</head>
<body onload="loaded()" ontouchstart>
<table class="footable">
 <thead>
	<tr>
	<th style='height:45px'>
	信息查询
    </th>
     </tr>
	 </thead>
	 </table>
<div id="scroller" style="transition-timing-function: cubic-bezier(0.1, 0.57, 0.1, 1); transition-duration: 0ms; transform: translate(0px, 0px) translateZ(0px);">
<div class="weui_cells_title" id="dq1"> 请填写收件人手机号</div>
<div class="weui_cells" id="dq4">
<div class="weui_cell" id="dq5">
<input name="input_tel" id="input_tel" type="tel" placeholder="请填写收件人手机号" value="" class="weui_input">
</div>
</div>
<div class="weui_cells_title" id="dq2"></div>
<button style="width:90%;" onclick="messageData()" class="weui_btn weui_btn_warn" id="dq3">下一步</button>
<br>
<div id="show_orders" style="margin-left:15px;font-size: 16px;margin-right:14px" class="zxy">

</div>
</div>
</body>
<script type="text/javascript">
function messageData()
{
	var url='contact.php';
	var sign = document.getElementById( "input_tel" ).value;
	//alert (sign);
	//style="display:none"
	if (sign=="")
	{
		alert("亲，手机号不能为空哦");
	}
	else
	{
	$.getJSON(url,{sign:sign},function(d) {
		if(d['code']==0)
		{
			document.getElementById( "show_orders" ).innerHTML=d['txt'];
		}
		else
		{
			if(d['code']==2)
			{
			   document.getElementById( "show_orders" ).innerHTML="<img src='http://csvip-kd.stor.sinaapp.com/wait.png' width='100%' style='margin-top: -50px;'>";	
			}
			else
			{
			   document.getElementById( "show_orders" ).innerHTML=d['data'];
			   document.getElementById('dq1').style.display='none';
			   document.getElementById('input_tel').style.display='none';
			   document.getElementById('dq2').style.display='none';
			   document.getElementById('dq3').style.display='none';
			   document.getElementById('dq4').style.display='none';
			}
		  
		 }
		
   
	  
	});
	}
	}
</script>
</html>