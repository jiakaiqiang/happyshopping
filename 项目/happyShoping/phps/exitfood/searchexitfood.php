<?php
//连接请求数据库
header("Content-Type:text/html;charset=utf8");
//获取出数据的状态值
$state=$_POST['state'];
$conts = mysqli_connect("localhost", "root", "root", "myobject");

    if(!$conts){
        exit("数据库连接失败");
    }
if($state=='已发货'||$state='已签收'){
$state=$state;
//更新数据库中的信息
$queryq=mysqli_query($conts,"select * from  foodsunsubscribe where transportSatus='$state';");
$dataq=mysqli_fetch_assoc($queryq);
while($dataq){
    $aa[]=$dataq;
    $dataq=mysqli_fetch_assoc($queryq);  
}
echo json_encode($aa);
}else if($state=='null'){
    $query=mysqli_query($conts,"select * from  foodsunsubscribe");
    while($data){
    $aa[]=$data;
    $data=mysqli_fetch_assoc($query);  
}
echo json_encode($aa);
}
    

    
    ?>