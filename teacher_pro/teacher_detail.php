<?php
//获取教师表里的信息
include('conn.php');
//解决中文乱码问题
$conn->query("SET NAMES 'UTF8'");
$name=$_POST["name"];
$sql="select * FROM teacher where teach_name='$name'";
$result=$conn->query($sql);
if($result->num_rows>0){
	//输出每行数据
	while($row=$result->fetch_assoc()){
		echo $row['teach_sex'].",".$row['teache_phonum'].",".$row['teach_address'].",".$row['teach_exper'].",".$row['teach_icon'];
		}
	}else{
		echo "";
		}
		$conn->close();
		?>