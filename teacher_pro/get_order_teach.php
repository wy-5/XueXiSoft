<?php
//获取预约教师表里的信息
include('conn.php');
//解决中文乱码问题
$conn->query("SET NAMES 'UTF8'");
$phone=$_POST["phone"];
$sql="select subject,teach_name FROM reserve where stu_phone='$phone'";
$result=$conn->query($sql);
if($result->num_rows>0){
	//输出每行数据
	while($row=$result->fetch_assoc()){
		echo $row['subject'].",".$row['teach_name'].",";
		}
	}else{
		echo "";
		}
		$conn->close();
		?>