<?php
/**
 * Created by PhpStorm.
 * User: 13889
 * Date: 2019/3/12
 * Time: 20:47
 */
header("Content-Type:text/html;charset=utf8");
//获取传过来的想要进行删除的数据的id
$id=$_POST['id'];
$num=$_POST['money'];


$conts=mysqli_connect("localhost","root","root","myobject");
//
//mysqli_query($cont,'set names utf-8;');
mysqli_query($conts,"SET NAMES utf-8");
//先查询出剩余的余额
$sels=mysqli_query($conts,"select money from user where userid=$id");
$data=mysqli_fetch_assoc($sels);

$nums=$num+$data['money'];

$sel=mysqli_query($conts,"update user set money=$nums where userid=$id");
var_dump($sel);
if(!$sel){
    echo'删除失败';
}
$row=mysqli_affected_rows($conts);
if($row<0){
exit('查询失败');

}

?>