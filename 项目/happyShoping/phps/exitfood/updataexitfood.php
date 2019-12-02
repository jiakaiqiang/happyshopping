<?php
//连接请求数据库
header("Content-Type:text/html;charset=utf8");

$id=$_POST['id'];
    $conts = mysqli_connect("localhost", "root", "root", "myobject");

    if(!$conts){
        exit("数据库连接失败");
    }
    //更新数据库中的信息
    $sel=mysqli_query($conts,"update foodsunsubscribe set transportSatus='已签收' where id='$id'");
    var_dump($sel);
    echo 'success';
    ?>