<?php
//连接请求数据库
header("Content-Type:text/html;charset=utf8");
$id=$_POST['id'];

    $conts = mysqli_connect("localhost", "root", "root", "myobject");

    if(!$conts){
        exit("数据库连接失败");
    }
    //更新数据库中的信息
    $sel=mysqli_query($conts,"update shopping set foodsStatus='已购买',transportStatus='已发货' where id='$id'");
  echo 'success';



    /* $query=mysqli_query($conts,"select * from shopping");
    $data=mysqli_fetch_assoc($query)
    while($data){
        $aa[]=$data;
        $data=mysqli_fetch_assoc($query);  
    }
    echo json_encode($aa); */
    
?>