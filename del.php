<?php
    header('Content-type:application/json;charset=utf-8');
    $host="127.0.0.1";
    $user="root";
    $pass="";
    $dbname="gbook";
    $id=$_POST['id'];
    $conn=mysqli_connect($host,$user,$pass,$dbname);
    if(!$conn){
           echo "连接数据库失败".mysqli_error($conn);
    }
    $sql="delete from gbook where id='$id'";
    $result=mysqli_query($conn,$sql);
    $message=[];
    if(!$result){
        $message['code']=0;
        $message['msg']="删除失败";
    }else{
       $message['code']=1;
       $message['msg']="删除成功";
    }
    echo json_encode($message);
?>

