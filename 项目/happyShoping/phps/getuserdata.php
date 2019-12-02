<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/23
 * Time: 17:23
 */
//连接数据库
$numq=(int)$_POST['num'];
$page=((int)$_POST['page']-1)*$numq;
header("charset=utf-8");
$cont=mysqli_connect("localhost","root","root","myobject");
//获取人员的总数


$sel=mysqli_query($cont,"select * from user limit {$page} ,{$numq}");
$data=mysqli_fetch_assoc($sel);
while($data){
    $arr[]=$data;
    $data=mysqli_fetch_assoc($sel);
};
$lists=json_encode($arr);
$num=mysqli_query($cont,"select count(1) as num from user ");
$numm=mysqli_fetch_row($num);
//$sunnum=json_encode($numm);
$ss=implode(",", $numm);
echo "{".'"totalsum"'.":".$ss.",".'"list"'.":".$lists."}";



