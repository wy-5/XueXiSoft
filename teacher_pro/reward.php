<?php
//获取奖学劵表里的信息
include('conn.php');
//解决中文乱码问题
$conn->query("SET NAMES 'UTF8'");
$phone=$_POST["phone"];
$sql="select acount,data FROM stu_reward where phonenum='$phone'";
$result=$conn->query($sql);
if($result->num_rows>0){
	//输出每行数据
	while($row=$result->fetch_assoc()){
		echo $row['acount'].",".$row['data'].",";
		}
	}else{
		echo "";
		}
		$conn->close();
		?>