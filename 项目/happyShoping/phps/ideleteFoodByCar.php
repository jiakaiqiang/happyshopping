<?php
/**
 * Created by PhpStorm.
 * User: 13889
 * Date: 2019/3/12
 * Time: 20:47
 */
header("Content-Type:text/html;charset=utf8");
//获取传过来的想要进行删除的数据的id
$ids=$_POST['id'];
$id=number_format($ids);
$conts=mysqli_connect("localhost","root","root","myobject");
//
//mysqli_query($cont,'set names utf-8;');
mysqli_query($conts,"SET NAMES utf-8");
//"SELECT * FROM user where username='$name';"
//$sel=mysqli_query($conts,'delete from foods where id=$id;');

$query=mysqli_query($conts,"delete  FROM shopping where id=$id;");
var_dump($query);

?>