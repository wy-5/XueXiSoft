<?php
//获取订单表里的信息
include('conn.php');
//解决中文乱码问题
$conn->query("SET NAMES 'UTF8'");
$phone=$_POST["phone"];
$sql="select bookname,count,price,state FROM stu_order where stu_phone='$phone'";
$result=$conn->query($sql);
if($result->num_rows>0){
	//输出每行数据
	while($row=$result->fetch_assoc()){
		echo $row['bookname'].",".$row['count'].",".$row['price'].",".$row['state'].",";
		}
	}else{
		echo "";
		}
		$conn->close();
		?>