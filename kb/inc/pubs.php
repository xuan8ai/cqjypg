<?php 

$doup2s = "./inc/desc.txt";

function webalert($Key){
 $html="<script>\r\n";
 $html.="alert('".$Key."');\r\n";
 $html.="window.location.href='index.php';\r\n";
 $html.="</script>";
 exit($html);
}


function characet($data){
  if(!empty($data) ){    
    $fileType = mb_detect_encoding($data , array('UTF-8','GBK','LATIN1','BIG5')) ;   
    if( $fileType != 'UTF-8'){   
      $data = mb_convert_encoding($data ,'utf-8' , $fileType);   
    }   
  }   
  return $data;    
}

function charaget($data){
  if(!empty($data) ){    
    $fileType = mb_detect_encoding($data , array('UTF-8','GBK','LATIN1','BIG5')) ;   
    if( $fileType != 'GBK'){   
      $data = mb_convert_encoding($data ,'GBK' , $fileType);   
    }   
  }   
  return $data;    
}

Function rephtmls($Keys){
$Keys = str_replace(array(" "), "&nbsp;", $Keys); 
$Keys = str_replace(array("\""), "&quot;", $Keys); 
$Keys = str_replace(array("<"), "&lt;", $Keys); 
$Keys = str_replace(array(">"), "&gt;", $Keys); 
$Keys = str_replace(array("\r\n", "\r", "\n"), "<br>", $Keys); 
  return $Keys;
}

function foldlist($path,$timeshuo,$foldshuo,$dbtype) {
 $current_dir = opendir($path); 
   echo "var provinceList = [ \r\n";
   echo "{name:'".characet($foldshuo)."', cityList:[";
   echo "'".characet($timeshuo)."'";
   echo "]}";
      $iv=0; 
 while(($file = readdir($current_dir)) !== false) { 
 $sub_dir = $path . DIRECTORY_SEPARATOR . $file;
 if($file == '.' || $file == '..') {
 } else if(is_dir($sub_dir)) {
        $iv++; 
 if($iv=="1"){
   echo "".erjilist($sub_dir,$file,$timeshuo,$dbtype);
 }else{
   echo "".erjilist($sub_dir,$file,$timeshuo,$dbtype);
 }
 } else {
 }
 }
 echo "];";
 echo "\r\n";
}

function erjilist($path,$files,$timeshuo,$dbtype) {
   echo ",\r\n{name:'".characet($files)."', cityList:[";
   echo "'".characet($timeshuo)."'";
$dir = opendir($path); 
$basename = basename($path); 
$fileArr = array(); 
while ($file_name = readdir($dir)) { 
if (($file_name ==".") || ($file_name == "..")) { 
 } else if(is_dir($file_name)) {
 } else {
$fName = "$path/$file_name"; 
$fTime = filemtime($fName); 
$fileArr[$file_name] = $fTime; 
 } 
} 
arsort($fileArr); 
foreach($fileArr as $tt=>$vv){
 $thisName=$tt;
$filetp=substr($thisName,-strlen($dbtype));
$filetp=strtolower($filetp);
$filesw=substr($thisName,0,-strlen($dbtype));//注意后缀是4位数
if($filetp == $dbtype || $filetp == ".xls"){
$file = $filesw;    //
 echo ",'".characet($file)."'";
}
} 
echo "]}";
closedir($dir); 
} 

function fileline1($path = '.') {
   $a_content = file_get_contents($path);
   $str = strtok($a_content,"\r");
   return $str;
}

function get_file_line( $file_name, $line ){
  $n = 0;
  $handle = fopen($file_name,'r');
  if ($handle) {
    while (!feof($handle)) {
        ++$n;
        $out = fgets($handle, 4096);
        if($line==$n) break;
    }
    fclose($handle);
  }
  if( $line==$n) return $out;
  return false;
}



/**
 * KBW2U_20220219_102843_c6be86373f3ae44377ca8a49812669ac.zip
 * Created by chalide.cn 20220219_102843
 * @author yujianyue<admin@ewuyi.net> 
 * @tels 15058593138(同微信号) 
 * 版权约束：保留署名权和发行权 不得转售 或 将源码直接发布到公开渠道 
 * 问题反馈：15058593138 同微信号 沟通请提供版本号[ KBW2U_20220219_102843_c6be86373f3ae44377ca8a49812669ac.zip ]
 * 帮助：源码自带说明书，详见压缩包内*.html/*.txt文件(都不建议删除)。
 * 保留：原始数据也请保留；供以后规律参考(比如看前几行都是什么)。
 * 技巧：原始版本能用而你修改后不能用，说明是你操作问题(建议保留原始版本)。
 */
 ?>