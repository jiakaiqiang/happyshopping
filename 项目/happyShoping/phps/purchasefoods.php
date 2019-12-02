<?php
//连接请求数据库
header("Content-Type:text/html;charset=utf8");
$id=$_POST['id'];
$time=$_POST['time'];
$total=$_POST['total'];
$userid=$_POST['userid'];
$phoness=$_POST['phone'];
$address=$_POST['address'];

    $conts = mysqli_connect("localhost", "root", "root", "myobject");

    if(!$conts){
        exit("数据库连接失败");
    }
    //获取人员信息表
    $people=mysqli_query($conts,"select money from user where userid='$userid'");
    $data=mysqli_fetch_assoc($people);
  
    $sum=$data['money']-$total;
 
    if($sum>0){
        //更新数据库
        $peoplemoney=mysqli_query($conts,"update user set money=$sum where userid=$userid");
        if($peoplemoney){
           
            $sel=mysqli_query($conts,"update shopping set foodsStatus='已购买',transportStatus='待发货',phone='$phoness',address='$address',time='$time'where id='$id'");
        }
    $infos=json_encode('当前剩余金额'.$sum.'元');
    }else{
        $infos=json_encode("购买失败,本账号余额可能不足请返回首页，在充值中心进行充值!");
    }
   
    //更新数据库中的信息
    //$sel=mysqli_query($conts,"update shopping set foodsStatus='已购买',transportStatus='待发货',time='$time'where id='$id'");
    echo "{".'"info"'.":".'"success"'.",".'"money"'.":".$infos."}";
    ?>