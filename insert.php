<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name='viewport' content='width=device-width, initial-scale=1.0'>
	<title>信息管理</title>
	<link rel='stylesheet' href='css/bootstrap.css'>
</head>
<body>
    <?php
   $host="127.0.0.1";
   $user="root";
   $pass="";
   $dbname="gbook";
   $uname=$_POST['uname'];
   $sex=$_POST['sex'];
   if($sex==1){
      $gender="男";
   }else{
      $gender="女";
   }
   $email=$_POST['email'];
   $info=$_POST['info'];
   //echo $uname;
   $ip=getenv('REMOTE_ADDR');
   $conn=mysqli_connect($host,$user,$pass,$dbname);
   if(!$conn){
       echo "连接数据库失败".mysqli_error($conn);
   }
   $sql="insert into gbook(id,name,sex,email,info,ip,time_at) values(null,'$uname','$sex','$email','$info','$ip',NOW())";
   $result=mysqli_query($conn,$sql);
   $ly="姓名:{$_POST['uname']}性别:{$gender}邮箱:{$_POST['email']}留言内容:{$_POST['info']}";
   //$file=file_put_contents('liuyan.txt');
   //file_put_contents("liuyan.txt",$file.$ly);
   $id=mysqli_insert_id($conn);
   mysqli_close($conn);
?>
<div class="container-fluid text-center" style="margin-top:20px">
   <?php if($id>0):?>
   <p class="text-primary">留言成功</p>
   <?php else:?>
   <p class="text-primary">留言失败</p>
   <?php endif;?>
   <p><a class="btn btn-primary btn-block" href="index.html">去留言页</a></p>
   <p><a class="btn btn-info btn-block" href="show.php">查看留言</a></p>
</div>
</body>
</html>

