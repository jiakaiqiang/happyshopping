<?php

header("Content-type:text/html;charset=utf-8");
//获取输入的值
$name=$_POST['name'];
//获取状态值




//连接数据库
$con=mysqli_connect("localhost","root","root","myobject");
mysqli_query($con,"SET NAMES utf-8");

$list=mysqli_query($con,"select * from foods where name like '%$name%';");

$data=mysqli_fetch_assoc($list);
while($data){
    $arr[]=$data;
    $data=mysqli_fetch_assoc($list);

}

echo json_encode($arr);





?>