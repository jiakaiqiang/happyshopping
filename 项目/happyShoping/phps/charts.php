
<?php

//mysqli_query($cont,'set names utf-8;');


header("Content-Type:text/html;charset=utf8");
//获取昨日的时间
$time=$_POST['time'];
$conts=mysqli_connect("localhost","root","root","myobject");
$list=mysqli_query($conts,"select sum(num) as yesnum from shopping where time like '%$time%'");

$data=mysqli_fetch_assoc($list);

while($data){
   
    
    $arr[]=$data;
    $data=mysqli_fetch_assoc($list);

}
$lists=json_encode($arr);
//获取昨日销售金额和总金额
$alltotal=mysqli_query($conts,"SELECT SUM(total)AS total FROM shopping");
$alltotallists=mysqli_fetch_assoc($alltotal);
//昨天
while($alltotallists){
    $arrw[]=$alltotallists;
    $alltotallists=mysqli_fetch_assoc($alltotal);
}
$taotals=json_encode($arrw);
$yestotal=mysqli_query($conts,"SELECT SUM(total)AS total FROM shopping WHERE '$time'=DATE(TIME)");
$yestotals=mysqli_fetch_assoc($yestotal);
while($yestotals){
    $arrsw[]=$yestotals;
    $yestotals=mysqli_fetch_assoc($yestotal);
}
$taotaly=json_encode($arrsw);







//获取各类商品总合计
$sumallfood=mysqli_query($conts,"select sum(shopping.num) as value,foods.state as name from foods,shopping where foods.foodName=shopping.foodName GROUP BY state;");
$sumlist=mysqli_fetch_assoc($sumallfood);

while($sumlist){
    $arrs[]=$sumlist;
    $sumlist=mysqli_fetch_assoc($sumallfood);
}
//输出分类的合计结果,进行项目排名
$sumallfoodlist=json_encode($arrs);
//销售排名
$ss=mysqli_query($conts,"select sum(num) as score,name from shopping GROUP BY name order by sum(num)");
$sslist=mysqli_fetch_assoc($ss);

while($sslist){
    $arrss[]=$sslist;
    $sslist=mysqli_fetch_assoc($ss);
}
$paihang=json_encode($arrss);
//进行月份的统计
$ssli=mysqli_query($conts,"select sum(num)as num,time  from shopping group by month(time)");
$sslists=mysqli_fetch_assoc($ssli);

while($sslists){
    $arrssli[]=$sslists;
    $sslists=mysqli_fetch_assoc($ssli);
}
$yufentongji=json_encode($arrssli);

//echo "{".'"totalsum"'.":".$lists.",".'"list"'.":".$sumallfoodlist."}";
echo "{".'"yesdayperch"'.":".$lists.",".'"sumallfood"'.":".$sumallfoodlist.",".'"paihang"'.":".$paihang.",".'"yuefentongji"'.":".$yufentongji.",".'"sumtotal"'.":".$taotals.",".'"yestotals"'.":".$taotaly."}";
?>
