<?php

header("Content-type:text/html;charset=utf-8");
//获取输入的值
$numq=(int)$_POST['num'];

$page=((int)$_POST['page']-1)*$numq;
$name=$_POST['name'];
$foodstatus=$_post['foodstatus'];
//获取用户的名称




//连接数据库
$con=mysqli_connect("localhost","root","root","myobject");
mysqli_query($con,"SET NAMES utf-8");

//$list=mysqli_query($con,"select * from foods where name like '%$name%'and state='$';");
 if($foodstatus=="已发货"||$foodstatus=='已签收'||$foodstatus=="待发货"){
    $cont=mysqli_query($conts,"select count(1) as num from shopping where transportStatus='$foodstatus'  ");
    $numm=mysqli_fetch_row($cont);
    
    $ss=implode(",", $numm);
    $list=mysqli_query($con,"SELECT * FROM shopping WHERE 1=1 AND ('all' ='all' OR 'username'='all' ) AND ('all'='all' OR 'name'='all') AND ('$foodstatus'='all' OR 'transportStatus'='$foodstatus') ORDER BY TIME DESC limit {$page},{$numq}");
} else if($foodstatus==""){
    $cont=mysqli_query($conts,"select count(1) as num from shopping where name='$foodstatus' ");
    $numm=mysqli_fetch_row($cont);
    
    $ss=implode(",", $numm);
    $list=mysqli_query($con,"SELECT * FROM shopping WHERE 1=1 AND ('all' ='all' OR 'username'='all' ) AND ('$foodstatus'='all' OR 'name'='$foodstatus') AND ('all'='all' OR 'transportStatus'='all') ORDER BY TIME DESC limit {$page},{$numq}");


$data=mysqli_fetch_assoc($list);
}
else{
    $cont=mysqli_query($conts,"select count(1) as num from shopping ");
    $numm=mysqli_fetch_row($cont);
    
    $ss=implode(",", $numm);
    $list=mysqli_query($con,"SELECT * FROM shopping WHERE 1=1 AND ('all' ='all' OR 'username'='all' ) AND ('all'='all' OR 'name'='all') AND ('all'='all' OR 'transportStatus'='all') ORDER BY TIME DESC limit {$page},{$numq}");


$data=mysqli_fetch_assoc($list);
while($data){
    $arr[]=$data;
    $data=mysqli_fetch_assoc($list);

}
$lists=json_encode($arr);
echo "{".'"total"'.":".$ss.",".'"list"'.":".$lists."}";
?>