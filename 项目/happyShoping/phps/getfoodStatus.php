<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/14
 * Time: 21:50
 */
header("Content-type:json/html;charset=utf-8");
//获取要编辑商品的ID
$foodstatus=$_POST['foodstatus'];
$numq=(int)$_POST['num'];

$page=((int)$_POST['page']-1)*$numq;

//创建连接数据库
$conts=mysqli_connect('localhost','root','root','myobject');
if(!$conts){
    exit("连接数据库失败");
}
if($foodstatus==""){
    $cont=mysqli_query($conts,"select count(1) as num from shopping where transportStatus is not null and transportStatus!='已签收' ");
    $numm=mysqli_fetch_row($cont);
    
    $ss=implode(",", $numm);
    //查询总条数
    //执行查询操作
    $query=mysqli_query($conts,"select * from shopping  where transportStatus is not null and transportStatus!='已签收' order by time desc limit {$page},{$numq};");
}else{
    $cont=mysqli_query($conts,"select count(1) as num from shopping where  ('$foodstatus' ='all' OR transportStatus='$foodstatus' )");
$numm=mysqli_fetch_row($cont);

$ss=implode(",", $numm);
//查询总条数
//执行查询操作
$query=mysqli_query($conts,"select * from shopping  where ('$foodstatus' ='all' OR transportStatus='$foodstatus' ) order by time desc limit {$page},{$numq};");
  
}
$data=mysqli_fetch_assoc($query);
while($data){
    $aa[]=$data;
    $data=mysqli_fetch_assoc($query);  
}
$list=json_encode($aa);
//echo "{".'"totalsum"'.":".$ss.",".'"list"'.":".$lists."}";
echo "{".'"total"'.":".$ss.",".'"list"'.":".$list."}";

?>