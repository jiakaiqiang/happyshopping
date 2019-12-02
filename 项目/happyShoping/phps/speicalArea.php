<?php

header("charset=utf-8");
//获取输入的值
$state=$_POST['state'];

//连接数据库

$con=mysqli_connect("localhost","root","root","myobject");
mysqli_query($con,"SET NAMES utf-8");
$list=mysqli_query($con,"select * from foods where state='$state';");

$data=mysqli_fetch_assoc($list);
while($data){
    $arr[]=$data;
    $data=mysqli_fetch_assoc($list);

}
echo json_encode($arr);
?>