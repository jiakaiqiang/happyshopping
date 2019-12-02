<?php
//连接请求数据库
header("Content-Type:text/html;charset=utf8");
$id=$_GET['id'];

    $conts = mysqli_connect("localhost", "root", "root", "myobject");

    if(!$conts){
        exit("数据库连接失败");
    }
    //更新数据库中的信息
    $query=mysqli_query($conts,"select * from user where userid='$id';");
    $data=mysqli_fetch_assoc($query);

 echo json_encode($data);
?>