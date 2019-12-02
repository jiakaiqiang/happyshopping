<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/23
 * Time: 16:12
 */
header("Content-Type:text/html;charset=utf8");
$name=$_POST['name'];
//连接数据库

$conts = mysqli_connect("localhost", "root", "root", "myobject");

if(!$conts){
    exit("数据库连接失败");
}
//取出数据库中的数据根据id
$sel=mysqli_query($conts,"SELECT * FROM user where username='$name';");
$data=mysqli_fetch_assoc($sel);
echo json_encode($data);
?>

