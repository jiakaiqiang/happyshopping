<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/19
 * Time: 22:09
 */
$name=$_POST['name'];
echo $name;
//连接数据库
$conts=mysqli_connect("localhost","root","root","myobject");
if($conts=0){
    exit('数据库连接失败');
};
//创建查询
$sel=mysqli_query($conts,"select *from foods where name='$name';");

