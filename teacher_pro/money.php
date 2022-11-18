<?php
//获取订单表里的信息
include('conn.php');
//解决中文乱码问题
$conn->query("SET NAMES 'UTF8'");
$phone=$_POST["phone"];
$sql="select stu_balance,yue,jifen FROM stu_money where phonenum='$phone'";
$result=$conn->query($sql);
if($result->num_rows>0){
	//输出每行数据
	while($row=$result->fetch_assoc()){
		echo $row['stu_balance'].",".$row['yue'].",".$row['jifen'];
		}
	}else{
		echo "";
		}
		$conn->close();
		?>