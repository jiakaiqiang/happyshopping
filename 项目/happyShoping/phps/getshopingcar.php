<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/14
 * Time: 21:50
 */
header("Content-type:json/html;charset=utf-8");
//获取要编辑商品的ID
$username=$_POST['username'];
$numq=(int)$_POST['num'];
$page=((int)$_POST['page']-1)*$numq;

//创建连接数据库
$conts=mysqli_connect('localhost','root','root','myobject');
if(!$conts){
    exit("连接数据库失败");
}
//执行查询操作
$query=mysqli_query($conts,"select * from shopping where username='$username'and transportStatus!='已签收' order by time desc limit {$page} ,{$numq};");
$data=mysqli_fetch_assoc($query);
while($data){
    $aa[]=$data;
    $data=mysqli_fetch_assoc($query);  
}
$lists=json_encode($aa);
//获取数据的总条数
$num=mysqli_query($conts,"select count(id) as num from shopping where username='$username'and transportStatus!='已签收'");
$numm=mysqli_fetch_row($num);
//$sunnum=json_encode($numm);
$ss=implode(",", $numm);
echo "{".'"totalsum"'.":".$ss.",".'"list"'.":".$lists."}";
?>