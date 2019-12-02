<?php

//连接请求数据库
header("Content-Type:text/html;charset=utf8");
//获取人员名称
$username=$_POST['username'];

$name=$_POST['name'];

$price=$_POST['price'];

$time=$_POST['time'];

$content=$_POST['content'];

$foodname=$name.'_'.$price;

//获取评论的内容
//获取评论的时间
    $conts = mysqli_connect("localhost", "root", "root", "myobject");

    if(!$conts){
        exit("数据库连接失败");
    }
    $sel=mysqli_query($conts,"INSERT INTO message VALUES ('NULL','{$foodname}','{$username}','{$time}','{$content}','','');");
   
    echo 'success';
//$sel=mysqli_query($conts,"INSERT INTO foods(name,price,describe,num,picture,state,fenlei) VALUES ('{$name}','{$price}','{$describe}','{$num}','{$fileimg}','{$fenlei}')");
 //header('Location:/happyShoping/dist/backgroundManagerSystem.html');