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
<?php
   $host="127.0.0.1";
   $user="root";
   $pass="";
   $dbname="gbook";
   $id=$_GET['id'];
   //echo $id;
   $conn=mysqli_connect($host,$user,$pass,$dbname);
   $sql="select name,sex,email,info from gbook where id='$id'";
   $result=mysqli_query($conn,$sql);
   $row=mysqli_fetch_assoc($result);
   if(!$result){
       echo $sql."sql语法错误";
   }
?>
    </div>
</body>
</html>
<html>
    <body>
        <div class="container">
             <form method="post" action="changeok.php">
                 <input type="hidden" name='id' value="<?php echo $id;?>">
                 姓名:<input type="text" class="form-control" name="uname" value="<?php echo $row['name']?>">
                 性别:<input type="text" class="form-control" name="sex" value="<?php echo $row['sex']?>">
                 邮箱:<input type="text" class="form-control" name="email" value="<?php echo $row['email']?>">
                 内容:<textarea class="form-control" name="info" rows="10" cols="30"><?php echo $row['info']?></textarea>
                 <input class="btn btn-info" type="submit" value="提交">
             </form>
        </div>
    </body>
</html>