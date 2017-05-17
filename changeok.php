<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name='viewport' content='width=device-width, initial-scale=1.0'>
	<title>信息管理</title>
	<link rel='stylesheet' href='css/bootstrap.css'>
</head>
<body>
<div class="container">
    <h1 class="text-center">修改留言</h1>
	<?php
	   $host="127.0.0.1";
	   $user="root";
	   $pass="";
	   $dbname="gbook";
	   $name=$_POST['uname'];
	   $sex=$_POST['sex'];
	   $email=$_POST['email'];
	   $info=$_POST['info'];
	   $id=$_POST['id'];
	   $conn=mysqli_connect($host,$user,$pass,$dbname);
	   if(!$conn){
		   echo "连接数据库失败";
	   }
	   $sql="update gbook set name='$name',sex='$sex',email='$email',info='$info' where id='$id'";
	   mysqli_query($conn,$sql);
	   mysqli_close($conn);
	?>
	<a href="show.php" class="btn btn-info btn-block">查看留言</a>
</div>
</body>
</html>
