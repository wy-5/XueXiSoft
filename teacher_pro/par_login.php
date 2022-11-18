<?php
//登录验证
include('conn.php');
//获取用户名和密码
$phone=$_POST["phone"];
$paswd=$_POST["paswd"];
$sql="select * from student where phonenum ='$phone'and paswd='$paswd'";
$result=$conn->query($sql);
if($result->num_rows>0){
	echo '1';
	}else{
		echo"0";
		}
		$conn->close();
		?>