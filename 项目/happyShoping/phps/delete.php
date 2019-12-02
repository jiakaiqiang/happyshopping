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
$conts=mysqli_connect("localhost","root","root","myobject");

//mysqli_query($cont,'set names utf-8;');
mysqli_query($conts,"SET NAMES utf-8");
//"SELECT * FROM user where username='$name';"
//$sel=mysqli_query($conts,'delete from foods where id=$id;');
$sel=mysqli_query($conts,"delete  FROM foods where id='$id';");

if(!$sel){
    echo'删除失败';
}
$row=mysqli_affected_rows($conts);
if($row<0){
exit('查询失败');

}
if(var_dump($sel)){
    echo 'success';
}
?>