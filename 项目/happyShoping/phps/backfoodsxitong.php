
<?php

//mysqli_query($cont,'set names utf-8;');


header("Content-Type:text/html;charset=utf8");
$name=$_POST['name'];

$numq=(int)$_POST['num'];
$page=((int)$_POST['page']-1)*$numq;
$conts=mysqli_connect("localhost","root","root","myobject");
if($name==''){
    $list=mysqli_query($conts,"select * from foods   order by id limit {$page},{$numq} ");
    $num=mysqli_query($conts,"select count(id) as num from foods ");
    $data=mysqli_fetch_assoc($list);
    while($data){
   
    
        $arr[]=$data;
        $data=mysqli_fetch_assoc($list);
    
    }
    $lists=json_encode($arr);
    mysqli_query($conts,"SET NAMES utf-8");
//查询出总条数

$numm=mysqli_fetch_row($num);
//$sunnum=json_encode($numm);
$ss=implode(",", $numm);
//将数据进行封装成对象进行返回
}else{
    $listq=mysqli_query($conts,"select * from foods where name like '%$name%' order by id limit {$page},{$numq} ");
    $num=mysqli_query($conts,"select count(id) as num from foods where name like '%$name%'");
    $datas=mysqli_fetch_assoc($listq);
    while($datas){
   
    
        $arrs[]=$datas;
        $datas=mysqli_fetch_assoc($listq);
    
    }
    mysqli_query($conts,"SET NAMES utf-8");
//查询出总条数

$numm=mysqli_fetch_row($num);
//$sunnum=json_encode($numm);
$ss=implode(",", $numm);
//将数据进行封装成对象进行返回
    $lists=json_encode($arrs);
}







//将数据进行封装成对象进行返回
echo "{".'"totalsum"'.":".$ss.",".'"list"'.":".$lists."}";
?>
