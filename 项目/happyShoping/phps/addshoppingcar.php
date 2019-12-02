<?php
//连接请求数据库
header("Content-Type:text/html;charset=utf8");
$name=$_POST['name'];

$price=$_POST['price'];

$num=$_POST['num'];
$username=$_POST['userName'];
$time=$_POST['time'];
$address=$_POST['address'];
$phone=$_POST['phone'];



//剩余库存


    $total=number_format($price)*number_format($num);


$foodName=$name.'_'.$price;
    $conts = mysqli_connect("localhost", "root", "root", "myobject");

    if(!$conts){
        exit("数据库连接失败");
    }
    $sel=mysqli_query($conts,"INSERT INTO shopping VALUES ('NULL','{$foodName}','{$username}',{$num},{$price},{$total},'{$name}','购买','null','{$time}','$address','$phone');");

  if($sel){
      echo 'success';
  }else{
      echo 'fail';
  }
   



    //根据商品的foodName进行修改商品的数量
 //header('Location:/happyShoping/dist/shopcar.html');






?>