<?php

//连接请求数据库
header("Content-Type:text/html;charset=utf8");
$name=$_POST['name'];
$price=$_POST['price'];
$num=$_POST['num'];
$describe=$_POST['describe'];
$fileimg = $_FILES['picture'];
$foodName=$name.'_'.$price;

move_uploaded_file($fileimg['tmp_name'], '../img/'.$fileimg['name']);
$picture='img/'.$fileimg['name'];
$state=$_POST['state'];

$fenlei=$_POST['fenlei'];
    $conts = mysqli_connect("localhost", "root", "root", "myobject");

    if(!$conts){
        exit("数据库连接失败");
    }
    $sel=mysqli_query($conts,"INSERT INTO foods VALUES ('NULL','{$foodName}','{$name}',{$price},'{$describe}','{$num}','{$picture}','{$state}','{$fenlei}');");
//$sel=mysqli_query($conts,"INSERT INTO foods(name,price,describe,num,picture,state,fenlei) VALUES ('{$name}','{$price}','{$describe}','{$num}','{$fileimg}','{$fenlei}')");
 header('Location:/happyShoping/dist/backgroundManagerSystem.html');