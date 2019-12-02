<?php
header('charset=utf-8;Content-type:text/json');
//获取人员的人员的id，通过人员的id进行人员的信息获取或者人员的删除信息的获取
$userid=$_GET['userid'];

$cont=mysqli_connect('localhost','root','root','myobject');

if(!$cont){
    exit("数据库连接失败");
}
//创建查询的语句和连接
$sel=mysqli_query($cont,'select * from user where userid='.$userid.';');
$data=mysqli_fetch_assoc($sel);

while($data){
    $arr[]=$data;
    $data=mysqli_fetch_assoc($sel);
}
//序列化结果
$arr=json_encode($arr);
echo $arr;

?>