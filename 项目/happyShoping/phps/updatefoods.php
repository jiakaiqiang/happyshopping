<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/15
 * Time: 22:33
 */
//连接请求数据库
header("Content-Type:text/html;charset=utf8");
$id=$_POST['id'];
$name=$_POST['name'];
$price=$_POST['price'];
$num=$_POST['num'];
$describe=$_POST['describe'];
$fileimg = $_FILES['picture'];
$foodname=$name.'_'.$price;

move_uploaded_file($fileimg['tmp_name'], '../img/'.$fileimg['name']);
$picture='img/'.$fileimg['name'];
$state=$_POST['state'];
$fenlei=$_POST['fenlei'];

    $conts = mysqli_connect("localhost", "root", "root", "myobject");

    if(!$conts){
        exit("数据库连接失败");
    }

//$sel=mysqli_query($conts,"INSERT INTO foods VALUES ('{$id}','{$name}',{$price},'{$describe}','{$num}','{$picture}','{$state}','{$fenlei}');");
$sel=mysqli_query($conts,"update  foods set foodName='$foodname',name='$name',price='$price',`describe`='$describe',num='$num',picture='$picture',state='$state',fenlei='$fenlei' where id='$id'");

header('Location:/happyShoping/dist/allfoods.html');
 ?>