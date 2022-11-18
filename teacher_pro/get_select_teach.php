<?php
//获取教师表里的信息
include('conn.php');
//解决中文乱码问题
$conn->query("SET NAMES 'UTF8'");
$subject=$_POST["subject"];
$grade=$_POST["grade"];
$sql="select teach_name FROM teacher where grade='grade' and teach_sub='$subject'";
$result=$conn->query($sql);
if($result->num_rows>0){
	//输出每行数据
	while($row=$result->fetch_assoc()){
		echo $row['teach_name'].",";
		}
	}else{
		echo "error";
		}
		$conn->close();
		?>