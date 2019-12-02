<?php

//连接请求数据库
header("Content-Type:text/html;charset=utf8");
//获取usrname
$username=$_POST['username'];

//获取商品的名称
$name=$_POST['name'];

//获取单价
$price=$_POST['total'];

//获取数量
$num=$_POST['num'];

//总价
$sum=$num*$price;
$phone=$_POST['phone'];
//获取退货的缘由
$content=$_POST['describe'];

//获取退货的地址
$address=$_POST['address'];
echo $address;
//获取退货的时间
$time=$_POST['time'];
if($address==''||$sum==0||$content==""||$phone==""){
    echo "请输入完善退货信息后再提交！";
    header('Location:/happyShoping/dist/merchandiseUnsubscribe.html');
}else{
    $conts = mysqli_connect("localhost", "root", "root", "myobject");

    if(!$conts){
        exit("数据库连接失败");
    }
    $sel=mysqli_query($conts,"INSERT INTO foodsunsubscribe  VALUES ('NULL','{$username}','{$name}',{$sum},'{$num}','{$address}','{$time}','退货','null','{$content}','{$price}','{$phone}');");
   if($sel){
       echo "退货信息填写正确！";
   }else{
       echo "退货信息填写错误，请重新填写！";
   }
//$sel=mysqli_query($conts,"INSERT INTO foods(name,price,describe,num,picture,state,fenlei) VALUES ('{$name}','{$price}','{$describe}','{$num}','{$fileimg}','{$fenlei}')");
 header('Location:/happyShoping/dist/merchandiseUnsubscribe.html'); 
}
   
 ?>