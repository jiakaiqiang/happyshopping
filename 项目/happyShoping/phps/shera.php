<?php
header("Content-type:text/html;charset=utf-8");
//获取购买状态
$foodname=$_POST['foodname'];
$state=$_POST['state'];
$transport=$_POST['paisong'];
$username=$_POST['username'];
$numq=(int)$_POST['num'];
$page=((int)$_POST['page']-1)*$numq;
//创建连接数据库
$conts=mysqli_connect('localhost','root','root','myobject');
if(!$conts){
    exit("连接数据库失败");
}
//执行查询操作
if($foodname==""&&$state==""){
    $querys=mysqli_query($conts,"select * from shopping where username='$username'and transportStatus!='已签收' order by time limit {$page} ,{$numq};;");
    $datas=mysqli_fetch_assoc($querys);
   
    while($datas){
        $aas[]=$datas;
        $datas=mysqli_fetch_assoc($querys);  
    }
    $lists=json_encode($aas);
    $num=mysqli_query($conts,"select count(id) as num from shopping where username='$username'and transportStatus!='已签收'");
$numm=mysqli_fetch_row($num);
//$sunnum=json_encode($numm);
$ss=implode(",", $numm);
echo "{".'"totalsum"'.":".$ss.",".'"list"'.":".$lists."}";
}else if($foodname!=""&&$state==''){
    $query=mysqli_query($conts,"    SELECT * FROM shopping WHERE username='$username' AND ('all'='all' OR transportStatus='all') AND ('$foodname'='all' OR foodsStatus='$foodname') ORDER BY $transport DESC limit {$page} ,{$numq};");
    /*     $query=mysqli_query($conts,"SELECT * FROM shopping WHERE username='$username' and (foodsStatus='$foodname' and transportStatus='$state') order by '$transport' desc;");
     */$data=mysqli_fetch_assoc($query);
    
    while($data){
        $aa[]=$data;
        $data=mysqli_fetch_assoc($query);  
    }
    $lists=json_encode($aa);
    $num=mysqli_query($conts,"SELECT count(1) as num FROM shopping WHERE username='$username' AND ('all'='all' OR transportStatus='all') AND ('$foodname'='all' OR foodsStatus='$foodname')");
$numm=mysqli_fetch_row($num);
//$sunnum=json_encode($numm);
$ss=implode(",", $numm);
    echo "{".'"totalsum"'.":".$ss.",".'"list"'.":".$lists."}";
}else{
    $query=mysqli_query($conts," SELECT * FROM shopping WHERE username='$username' AND ('$state'='all' OR transportStatus='$state') AND ('$foodname'='all' OR foodsStatus='$foodname') ORDER BY $transport DESC limit {$page} ,{$numq}; ");
/*     $query=mysqli_query($conts,"SELECT * FROM shopping WHERE username='$username' and (foodsStatus='$foodname' and transportStatus='$state') order by '$transport' desc;");
 */$data=mysqli_fetch_assoc($query);

while($data){
    $aa[]=$data;
    $data=mysqli_fetch_assoc($query);  
}
$lists =json_encode($aa);
$num=mysqli_query($conts,"select count(1) as num from shopping where username='$username' AND ('$state'='all' OR transportStatus='$state') AND ('$foodname'='all' OR foodsStatus='$foodname') ;");
$numm=mysqli_fetch_row($num);
//$sunnum=json_encode($numm);
$ss=implode(",", $numm);
    echo "{".'"totalsum"'.":".$ss.",".'"list"'.":".$lists."}";
}


?>