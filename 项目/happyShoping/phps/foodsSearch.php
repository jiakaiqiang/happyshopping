<?php

header("Content-type:text/html;charset=utf-8");
//获取输入的值
$name=$_POST['name'];
$page=($_POST['page']-1)*8;


//连接数据库
$con=mysqli_connect("localhost","root","root","myobject");
mysqli_query($con,"SET NAMES utf-8");
//$count=mysqli_query($con,"SELECT COUNT(id) as count  FROM foods WHERE NAME LIKE '%苹果%';");
//$datas=mysqli_fetch_assoc($count);

$list=mysqli_query($con,"select * from foods where name like '%$name%' limit $page, 8;");

$data=mysqli_fetch_assoc($list);
while($data){
    $arr[]=$data;
    $data=mysqli_fetch_assoc($list);

}

echo json_encode($arr);





?>