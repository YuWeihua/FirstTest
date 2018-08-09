<!DOCTYPE html>
<html>
<head>
<title></title>
<link rel="stylesheet" href="/style.css">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
<link rel="stylesheet" href="/weui.css"><link rel="stylesheet" href="/main.css">
<link rel="stylesheet" href="/scroll.css">
</head>
<body onload="loaded()" ontouchstart>
<div class="container js_container">
<div class="page"><div id="header">订单查询</div><div id="wrapper3"><div id="scroller"><div class="weui_cells_title"> 请填写收件人手机号</div><div class="weui_cells"><div class="weui_cell"><input name="input_tel" id="input_tel" type="tel" placeholder="请填写收件人手机号" value="" class="weui_input"></div></div><div class="weui_cells_title"></div><button style="width: 90%;" onClick="query_orders_by_tel()" class="weui_btn weui_btn_warn">下一步</button><br><div id="show_orders" style="margin-left:15px;font-size: 16px;margin-right:14px" class="zxy"></div></div><!-- include order.jade--></div><script>var myScroll

function loaded () {
  myScroll = new IScroll('#wrapper3', {mouseWheel: true,click:true});
}

document.addEventListener('touchmove', function (e) { e.preventDefault(); }, false)
</script><script>function query_orders_by_tel(){
  var tel = $("#input_tel").val();
  
  var url = '/orders/query/' + tel;
  window.location.href = url;
  <!-- $("#input_tel").val(''); -->
}</script></div></div></body></html><script src="http://shop.mengxiaoban.cn/js/zepto.js"></script><script src="http://shop.mengxiaoban.cn/js/iscroll/iscroll.js"></script><script src="http://shop.mengxiaoban.cn/js/fastclick.js"></script>