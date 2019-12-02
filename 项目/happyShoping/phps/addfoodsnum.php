<?php
header("Content-Type:text/html;charset=utf8");
//获取传过来的想要进行删除的数据的id
$ids=$_POST['ids'];
$num=$_POST['numcontent'];

$conts=mysqli_connect("localhost","root","root","myobject");
mysqli_query($conts,"SET NAMES utf-8");
$sels=mysqli_query($conts,"select num from foods where id=$ids");
$data=mysqli_fetch_assoc($sels);
$nums=number_format(json_encode($data)[8])+number_format($num);


$sel=mysqli_query($conts,"update foods set  num=$nums  where id=$ids");
var_dump($sel);
 

//echo json_encode($data);

?>