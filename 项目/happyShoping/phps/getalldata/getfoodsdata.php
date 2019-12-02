<?php
header("Content-Type:text/html;charset=utf8");
//获取传过来的想要进行删除的数据的id
$conts=mysqli_connect("localhost","root","root","myobject");
mysqli_query($conts,"SET NAMES utf-8");

$sel=mysqli_query($conts,"select * from foods where num<=10");
$data=mysqli_fetch_assoc($sel);
while($data){
    $arr[]=$data;
    $data=mysqli_fetch_assoc($sel);

}


echo json_encode($arr);

?>