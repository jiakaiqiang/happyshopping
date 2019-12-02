<?php
//连接请求数据库
header("Content-Type:text/html;charset=utf8");
//获取传入的值
$foodState=$_POST['foodname'];
$tramsportstate=$_POST['state'];

    


    $conts = mysqli_connect("localhost", "root", "root", "myobject");

    if(!$conts){
        exit("数据库连接失败");
    }
    $query=mysqli_query($conts,"update foods set num=$number where id='$id';");
var_dump($query);


    //根据商品的foodName进行修改商品的数量
 //header('Location:/happyShoping/dist/shopcar.html');






?>