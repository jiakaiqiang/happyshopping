<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/17
 * Time: 20:48
 */
//获取传过来的值
$username=$_POST['name'];
$password=$_POST['password'];
$email=$_POST['email'];
//连接数据库
$conts=mysqli_connect("localhost","root","root","myobject");
if(!$conts){
    exit("数据库连接失败");
}
//进行数据的查询
$sel=mysqli_query($conts,"INSERT INTO user VALUES(NULL,'{$username}','{$password}','{$email}',null,null,null,0,null)");

header('Location:../dist/login.html');