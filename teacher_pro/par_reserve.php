<?php
include('conn.php');
//解决中文乱码问题
$conn->query("SET NAMES 'UTF8'");
//获取预定的学员手机号和老师手机号、科目
$stu_phone=$_POST["stu_phone"];
$teach_phone=$_POST["teach_phone"];
$name=$_POST["teach_name"];
$subject=$_POST["subject"];
$data=$_POST["data"];
//在这里进行插入数据库操作 success为1  fail为0
$sql="INSERT INTO reserve(stu_phone,teach_phone,teach_name,subject,data) VALUES ('$stu_phone','$teach_phone','$name','$subject','$data')";
if($conn->query($sql)==TRUE){
	echo "1";	
}else{
	echo "0";
}
$conn->close();
?> 