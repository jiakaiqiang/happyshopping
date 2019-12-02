<?php

header("charset=utf-8");
//获取输入的值
$name=$_POST['name'];
//echo $name;
//连接数据库
$oder=$_POST['orde'];

$con=mysqli_connect("localhost","root","root","myobject");
mysqli_query($con,"SET NAMES utf-8");
$list=mysqli_query($con,"select * from foods where name like '%$name%' order by $oder desc;");

$data=mysqli_fetch_assoc($list);
while($data){
    $arr[]=$data;
    $data=mysqli_fetch_assoc($list);

}
echo json_encode($arr);
?>