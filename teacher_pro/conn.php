<?php
//php文件设置编码
header("Content-type:text/html; charset=utf-8");
//连接MySql的相关信息
$servername="127.0.0.1";
$username="root";
$password="";
$db_name="xuexi";
//创建连接
$conn=new mysqli($servername,$username,$password,$db_name);
//监测连接
if(!$conn){
  echo '连接失败';
}
?>