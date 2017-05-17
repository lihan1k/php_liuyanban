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

    $conn=mysqli_connect($host,$user,$pass,$dbname);
    $sql="select * from gbook order by id desc";
    $result=mysqli_query($conn,$sql);
    if(!$result){
        echo $sql."语法错误";
    }
    else{
?>
<div class="container">
    <h1 class="text-center">留言板</h1>
    <div class="table-responsive">
        <table class="table table-hover table-bordered" id="table">
               <thead>
                    <tr>
                        <th class="text-center">姓名</th>
                        <th class="text-center">性别</th>
                        <th class="text-center">邮箱</th>
                        <th class="text-center">留言内容</th>
                        <th class="text-center">留言时间</th>
                        <th class="text-center">操作</th>
                    </tr>
               </thead>
<?php
    	while(($row=mysqli_fetch_assoc($result))!=null){
            if($row['sex']==1){
                $gender="男";
            }else{
            	$gender="女";
            }
?>
           <tbody id="t<?php echo $row['id'];?>">
                <tr>
                   <td class="text-center"><?php echo $row['name'];?></td>
                   <td class="text-center"><?php echo $gender;?></td>
                   <td class="text-center"><?php echo $row['email'];?></td>
                   <td class="text-center"><?php echo $row['info'];?></td>
                   <td class="text-center"><?php echo $row['time_at'];?></td>
                   <td class="text-center">
                        <a class="btn btn-warning" method="post" href="change.php?id=<?php echo $row['id'];?>">修改</a>
                        <a class="btn btn-danger" onclick="del(this.id,this)" href="#" id="<?php echo $row['id'];?>">删除</a>
                        <a class="btn btn-primary" href="index.html">继续留言</a>
                   </td>
                </tr>
           </tbody>
<?php 
    	}
    }
    mysqli_free_result($result);
?>
        </table>
    </div>
</div>
</div>
	<script src="js/jquery-1.10.2.js"></script>
	<script>
	function del(id,ele){
		var xhr=new XMLHttpRequest();
		xhr.onreadystatechange=function(response){
		   if(xhr.readyState==4&&xhr.status==200){
			   var response=JSON.parse(xhr.response);
			   doResponse(response);
			   $(ele).parent().parent().remove();
			}
		}
		xhr.open('POST','del.php',true);
		xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xhr.send('id='+id);
		function doResponse(data){
			console.log(data);
		}
	}
	</script>
</body>
</html>


