<?php

$name=$_POST['name'];


$id=$_POST['id'];

$password=$_POST['password'];


$email=$_POST['email'];

$phone=$_POST['phone'];


$der=$_POST['describe'];

$address=$_POST['address'];

$isManager=$_POST['isManager'];


//创建连接数据库
$cont = mysqli_connect("localhost", "root", "root", "myobject");
if(!$cont){
    exit('数据库连接失败');
}
$sel=mysqli_query($cont,"update user set username='$name',password='$password',email='$email',`describe`='$der',address='$address',phone=$phone,isManager='$isManager' where userid='$id';");

header('Location:/happyShoping/dist/userdata-content.html')
?>