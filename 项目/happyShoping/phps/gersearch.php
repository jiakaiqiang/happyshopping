<?php

header("Content-type:text/html;charset=utf-8");
//获取输入的值
$username=$_POST['username'];
//连接数据库

$con=mysqli_connect("localhost","root","root","myobject");
mysqli_query($con,"SET NAMES utf-8");
//获取物品详情
$list=mysqli_query($con,"select * from user where username='$username';");

$data=mysqli_fetch_assoc($list);
if(json_encode($data)!='null'){
    while($data){
        $arr[]=$data;
        $data=mysqli_fetch_assoc($list);
    
    }
    
    echo json_encode($arr);
}else{
    echo 'null';
}

//var_dump($arr)

?>