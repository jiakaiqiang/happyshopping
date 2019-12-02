<?php
header("Content-type:text/html;charset=utf-8");
$name=$_GET['name'];

$password=$_GET['password'];
$email=$_GET['email'];
$phone=$_GET['phone'];
$der=$_GET['describe'];
$address=$_GET['address'];
$isManager=$_GET['isManager'];
echo $name;
echo $password;
echo $email;
echo $phone;
echo $der;
echo $address;
echo $isManager;
//创建连接数据库
$cont = mysqli_connect("localhost", "root", "root", "myobject");
if(!$cont){
    exit('数据库连接失败');
}
$sel=mysqli_query($cont,"INSERT INTO user VALUES(NULL,'{$name}','{$password}','{$email}','{$der}','{$address}','{$phone}','{$isManager}',null)");

header('Location:../dist/userdata-content.html')






?>