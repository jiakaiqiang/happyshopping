<?php
/**
 * Created by PhpStorm.
 * User: 13889
 * Date: 2019/3/11
 * Time: 11:23
 */



//mysqli_query($cont,'set names utf-8;');


header("Content-Type:text/html;charset=utf8");

$numq=(int)$_POST['num'];
$page=((int)$_POST['page']-1)*$num;
$conts=mysqli_connect("localhost","root","root","myobject");
$list=mysqli_query($conts,"select * from foods order by id limit {$page} ,{$numq}");

$data=mysqli_fetch_assoc($list);

while($data){
   
    
    $arr[]=$data;
    $data=mysqli_fetch_assoc($list);

}
$lists=json_encode($arr);

//mysqli_query($cont,'set names utf-8;');
mysqli_query($conts,"SET NAMES utf-8");
//查询出总条数
$num=mysqli_query($conts,"select count(id) as num from foods");
$numm=mysqli_fetch_row($num);
//$sunnum=json_encode($numm);
$ss=implode(",", $numm);
//将数据进行封装成对象进行返回
echo "{".'"totalsum"'.":".$ss.",".'"list"'.":".$lists."}";
?>
