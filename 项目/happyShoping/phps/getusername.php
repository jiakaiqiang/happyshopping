<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/19
 * Time: 22:09
 */

header("Content-type:json/html;charset=utf-8");
//获取要编辑商品的ID
$name=$_GET['name'];

//创建连接数据库
$conts=mysqli_connect('localhost','root','root','myobject');
if(!$conts){
    exit("连接数据库失败");
}
//执行查询操作
$query=mysqli_query($conts,"select * from user where username='$name';");
$data=mysqli_fetch_assoc($query);
$aa[]=$data;
echo json_encode($aa);

?>

