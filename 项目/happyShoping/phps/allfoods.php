<?php
/**
 * Created by PhpStorm.
 * User: 13889
 * Date: 2019/3/12
 * Time: 18:00
 */
header("Content-type:text/html;charset=utf-8");
//连接数据库
$con=mysqli_connect("localhost","root","root","myobject");
mysqli_query($con,"SET NAMES utf-8");
$list=mysqli_query($con,'select * from foods');
$data=mysqli_fetch_assoc($list);
while($data){
    $arr[]=$data;
    $data=mysqli_fetch_assoc($list);

}
echo json_encode($arr);
?>