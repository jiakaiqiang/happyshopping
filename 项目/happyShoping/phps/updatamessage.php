<?php
//连接请求数据库
header("Content-Type:text/html;charset=utf8");
$id=$_POST['id'];
$time=$_POST['time'];
$message=$_POST['content'];
echo $id;
echo $time;
echo $message;
    $conts = mysqli_connect("localhost", "root", "root", "myobject");

    if(!$conts){
        exit("数据库连接失败");
    }
    //更新数据库中的信息
    $sel=mysqli_query($conts,"update message set businessContent='$message',businessTime='$time' where id='$id' order by businessTime");
   if(var_dump($sel)){
    echo 'success';
   }
    
    ?>