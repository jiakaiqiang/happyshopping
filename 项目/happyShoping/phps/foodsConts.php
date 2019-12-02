<?php

header("Content-type:text/html;charset=utf-8");
//获取输入的值
$id=$_GET['id'];
//连接数据库
$con=mysqli_connect("localhost","root","root","myobject");
mysqli_query($con,"SET NAMES utf-8");
//获取物品详情
$list=mysqli_query($con,"select * from foods where id='$id';");

$data=mysqli_fetch_assoc($list);
while($data){
    $arr[]=$data;
    $data=mysqli_fetch_assoc($list);

}

echo json_encode($arr)
//var_dump($arr)

?>