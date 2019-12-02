<?php
//连接请求数据库
header("Content-Type:text/html;charset=utf8");
$name=$_POST['name'];
$price=$_POST['price'];

    $conts = mysqli_connect("localhost", "root", "root", "myobject");

    if(!$conts){
        exit("数据库连接失败");
    }
    //更新数据库中的信息
    $query=mysqli_query($conts,"select * from foods where price=$price and `name`='$name';");
    $data=mysqli_fetch_assoc($query);
    while($data){
        $aa[]=$data;
        $data=mysqli_fetch_assoc($query);  
    }
    $list=json_encode($aa);
    echo $list;
?>