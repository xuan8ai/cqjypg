<?php include "inc/conn.php";?><?php include "inc/pubs.php";?>
<!doctype html><?php $tts = date("YmdHis",time());?>
<html lang="zh-CN">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0" />
<meta name="apple-mobile-web-app-capable" content="yes" />

<!--  重庆商贸中等专业学校课表查询  -->
<title><?php echo $title;?></title>
<meta name="author" content="">
<meta name="copyright" content="">
<link href="inc/css/style.css?t=170828" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="inc/js/js.js?t=170828"></script>
<script language="javascript">
var timeshuo = '<?php echo $timeshuo;?>';
var foldshuo = '<?php echo $foldshuo;?>';
<?php echo foldlist($UpDir."/",$timeshuo,$foldshuo,$dbtype);?>


function startRequest(Num) {
var queryString;

if(Num == 1 || Num == 0){
if($("fold").value == "" || $("fold").value == "<?php echo $foldshuo;?>"){
$('fold').style.borderColor='red';
return false;
}else{
$('fold').style.borderColor='green';
}
}
if(Num == 5 || Num == 0){
if($("time").value == "" || $("time").value == "<?php echo $timeshuo;?>"){
$('time').style.borderColor='red';
return false;
}else{
$('time').style.borderColor='green';
}
}
if(Num == 3 || Num == 0){
if ($("code")!=null){
var codes=$("code").value.replace(/(^\s+)|(\s+$)/g, "");
if (!codes.match(/^[0-9]{4}$/)){
$("code").value = $("tishi4").innerHTML;
$('33').style.borderColor='red';
return false;
}else{
$('33').style.borderColor='green';
}
}
}
if(Num == "0"){
}
}
</script>
<style>
thead{display:none;}
table.excel {
	width:98%;
	min-width:320px;
	border-width:1;
	border-collapse:collapse;
	font-family:sans-serif;
	font-size:12px;
}
table.excel thead th, table.excel tbody th {
	background:#CCCCCC;
	border-style:ridge;
	border-width:1;
	text-align: center;
	vertical-align:bottom;
}
table.excel tbody th {text-align:center;min-width:60px;}
table.excel tbody td {vertical-align:center;min-width:60px;}
table.excel tbody td {padding: 0 3px;border: 1px solid #d0d0d0;}
</style>
</head>
<body onLoad="inst();">
<div class="html">
<div class="divs" id="divs">
<div id="head" class="head" onclick="location.href='?t=<?php echo $tts;?>';">
<?php echo $title;?>

<!--div class="back" id="pageback">
<a href="?t=<?php echo $tts;?>" class="d">更多</a>
</div-->
</div>
<div class="main" id="main">
<?php 

$stime=microtime(true); 
$codes = trim($_POST['code']);

$folder = trim($_POST['fold']);
$shujus = trim($_POST['time']);

if(!$shujus){
?>
<form name="queryForm" method="post" action="?t=<?php echo $tts;?>" onsubmit="return startRequest(0);">
<div class="select" id="10">
<select name="fold" id="fold" onBlur="startRequest(1)" /></select>
</div>
<div class="select" id="15">
<select name="time" id="time" onBlur="startRequest(5)" /></select>
</div>
<?php 
if($ismas=="1"){
?>
<div class="so_box" id="33">
<input name="code" type="text" class="txts" id="code" placeholder="请输入验证码" onfocus="this.value=''" onBlur="st('code',4);startRequest(3)" />
<div class="more" id="clearkey">
<img src="inc/code.php?t=<?php echo $tts;?>" id="Codes" onClick="this.src='inc/code.php?t='+new Date();" />
</div></div>
<?php }?>
<div class="so_but">
<input type="submit" name="button" class="buts" id="sub" value="立即查询" />
<input type="button" class="buts" value="刷新本页" name="print" onclick="location.reload();">
</div>
<div class="so_bus" id="tishi">
说明:
<!---你的其他说明在这里添加：开始-->
<?php
if(!file_exists($doup2s)){
//echo "<!-- $doup2s 不存在 -->";
}else{
echo file_get_contents($doup2s);
}
?>

<!--你的其他说明在这里添加：结束-->
</div>
<div id="tishi4" style="display:none;">请输入4数字验证码</div>
<script type="text/javascript">
 addressInit('fold', 'time', '<?php echo $foldshuo;?>', '<?php echo $timeshuo;?>');
</script>
</form>
<?php 
}else{
if($ismas=="1"){
session_start();
if($codes!=$_SESSION['PHP_M2T']){
 webalert("请正确输入验证码！");
}
}

$files = characet($UpDir."/".$folder."/".$shujus.".xls");
if(!file_exists($files)){
$files = charaget($files);
}

if(!file_exists($files)){
 webalert('请检查数据库文件');
}

echo '<p align="center">&nbsp;</p>';
echo "<h1>$shujus</h1>";

echo '<div style="margin:0 auto;overflow-x:auto;width:98%;max-width:1188px;">';
echo "\r\n<!--startprint-->";
require_once 'inc/excel.php';
$data = new Spreadsheet_Excel_Reader($files);
echo characet($data->dump(true,true)); 

echo '<!--endprint--></div>';
?>
<div class="so_but">
<input type="button" class="buts" value="预 览" name="print" onclick="preview()">
<input type="button" class="buts" value="返 回" id="reset" onclick="location.href='?t=back';"></div>
<?php 
}
$etime=microtime(true);
$total=$etime-$stime;
echo "<!----页面执行时间：{$total} ]秒--->";
?>
</div>
<div class="boto" id="boto">
&copy;<?php echo date('Y');?>&nbsp; <a href="<?php echo $copyu;?>" target="_blank"><?php echo $copyr;?></a>
</div>
</div>
</div>

</body>

<!--
  问题反馈：xuan8ai666@gmail.com
-->
</html>