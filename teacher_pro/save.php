<?php
//获取用户名和密码
$phone=$_POST["phone"];
$paswd=$_POST["paswd"];
//插入数据的SQL语句
$sql="INSERT INTO user_login(phonenum,paswd)VALUES ('$phone','$paswd')";
if($conn->query($sql)===TRUE){
	echo "success";	
}else{
	echo "fail";
}
$conn->close();
?>

# Virtual Hosts
#

<VirtualHost *:80>
	ServerName localhost
	DocumentRoot D:/wamp64/www
	<Directory  "D:/wamp64/www/">
		Options +Indexes +Includes +FollowSymLinks +MultiViews
		AllowOverride All
		Require local
	</Directory>
</VirtualHost>
<VirtualHost *:8085>
	ServerName localhost
	DocumentRoot F:/Android/wamp64/wamp64/www
	<Directory  "F:/Android/wamp64/wamp64/www/">
		Options +Indexes +Includes +FollowSymLinks +MultiViews
		AllowOverride All
		Require local
	</Directory>
</VirtualHost>
#
