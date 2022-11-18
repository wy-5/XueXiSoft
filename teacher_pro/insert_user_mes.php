<?php
//php文件设置编码
header("Content-type:text/html; charset=utf-8");
//连接MySql的相关信息
$servername="127.0.0.1";
$username="root";
$password="";
$db_name="user";
//创建连接
$conn=new mysqli($servername,$username,$password,$db_name);
//监测连接
if($conn->connect_error){
  die("连接失败:". $conn->connect_error);
}
//获取用户名和密码
$phone=$_POST["phone"];
$paswd=$_POST["paswd"];
//插入数据的SQL语句
$sql="INSERT INTO user_login(phonenum,paswd) VALUES ('$phone','$paswd')";
if($conn->query($sql)==TRUE){
	echo "1";	
}else{
	echo "0";
}
$conn->close();
?>