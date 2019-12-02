<?php

$name=$_POST['username'];
$id=$_POST['id'];
$password=$_POST['password'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$der=$_POST['describe'];
$address=$_POST['address'];
//$isManager=$_GET['isManager'];
echo $name;
echo $id;
echo $password;
echo $email;
echo $phone;
echo $der;
echo $address;
echo $id;



//创建连接数据库
$cont = mysqli_connect("localhost", "root", "root", "myobject");
if(!$cont){
    exit('数据库连接失败');
}


$sel=mysqli_query($cont,"update user set username='$name',password='$password',email='$email',`describe`='$der',address='$address',phone=$phone where userid='$id';");
var_dump($sel);
//header('Location:../dist/userdata-content.html')
?>