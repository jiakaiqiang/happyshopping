<?php
//连接请求数据库
header("Content-Type:text/html;charset=utf8");

$conts = mysqli_connect("localhost", "root", "root", "myobject");
$name=$_POST['name'];

$price=$_POST['price'];

$num=$_POST['num'];
$username=$_POST['userName'];
$time=$_POST['time'];
$userid=$_POST['userid'];


$total=number_format($price)*number_format($num);
$address=$_POST['address'];
$phone=$_POST['phone'];

$foodName=$name.'_'.$price;
//获取人员信息表
$people=mysqli_query($conts,"select * from user where userid='$userid'");
$data=mysqli_fetch_assoc($people);
$sum=$data['money']-$total;
if($sum>0){
    //更新数据库
    $peoplemoney=mysqli_query($conts,"update user set money=$sum where userid=$userid");
    if($peoplemoney){
   
        $sel=mysqli_query($conts,"INSERT INTO shopping VALUES ('NULL','{$foodName}','{$username}',{$num},'{$price}','{$total}','{$name}','已购买','待发货','{$time}','{$address}','{$phone}');");
        
    }
$infos=json_encode('当前剩余金额'.$sum.'元');
}else{
    $infos=json_encode("购买失败,本账号余额可能不足请返回首页，在充值中心进行充值!");
}

//更新数据库中的信息
//$sel=mysqli_query($conts,"update shopping set foodsStatus='已购买',transportStatus='待发货',time='$time'where id='$id'");
echo "{".'"info"'.":".'"success"'.",".'"money"'.":".$infos."}";


    
    //var_dump($sel)
    //$sel=mysqli_query($conts,"INSERT INTO shopping VALUES ('NULL','{$foodName}','{$username}',{$num},'{$price}','{$total}','{$name}','已购买','待发货','{$time}');");

 //header('Location:/happyShoping/dist/shopcar.html');






?>