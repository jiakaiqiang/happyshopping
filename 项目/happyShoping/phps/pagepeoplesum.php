<?php
session_start(); 
if( !isset($_COOKIE["user"]) ){ 
setcookie("user","newGuest",time()+3600); 
}else { 
setcookie("user","oldGuest"); 
} 

public function ShowMyCounter(){ 
    //定义变量 
    $IsGone = FALSE; 
    //读取数据 
    $querysql = "SELECT * FROM `mycounter` WHERE id = Ƈ' "; 
    $queryset = mysqli_query($querysql); 
    $row = mysqli_fetch_array($queryset); 
    //获得时间量 
    $DateNow = date('Y-m-d'); 
    $RecordDate = $row['RecordDate']; 
    $DateNow_explode = explode("-",$DateNow); 
    $RecordDate_explode = explode("-",$RecordDate); 
    //判断是否已过去一天 
    if( $DateNow_explode[0] > $RecordDate_explode[0]) $IsGone = TRUE; 
    else if( $DateNow_explode[0] == $RecordDate_explode[0] ){ 
    if( $DateNow_explode[1] > $RecordDate_explode[1] ) $IsGone = TRUE; 
    else if( $DateNow_explode[1] == $RecordDate_explode[1] ){ 
    if( $DateNow_explode[2] > $RecordDate_explode[2] ) $IsGone = TRUE; 
    }else BREAK; 
    }else BREAK; 
    //根据IsGone进行相应操作 
    IF($IsGone) { 
    $RecordDate = $DateNow; 
    $CounterToday = 0; 
    $CounterLastDay = $row['CounterToday']; 
    $upd_sql = "update mycounter set RecordDate = '$RecordDate',CounterToday = '$CounterToday',CounterLastDay = '$CounterLastDay' WHERE id = Ƈ' "; 
    mysqli_query($upd_sql); 
    } 
    //再次获取数据 
    $querysql = "SELECT * FROM `mycounter` WHERE id = Ƈ' "; 
    $queryset = mysqli_query($querysql); 
    $Counter = $row['Counter']; 
    $CounterToday = $row['CounterToday']; 
    $CounterLastDay = $row['CounterLastDay']; 
    if($row = mysqli_fetch_array($queryset) ){ 
    if( $_COOKIE["user"] != "oldGuest" ){ 
    $Counter = ++$row['Counter']; 
    $CounterToday = ++$row['CounterToday']; 
    $upd_sql = "update mycounter set counter = '$Counter',CounterToday = '$CounterToday' WHERE id = Ƈ' "; 
    $myquery = mysqli_query($upd_sql); 
    } 
    echo "总访问量：".$Counter; 
    echo " 
    "; 
    echo "今日流量：".$CounterToday; 
    echo " 
    "; 
    echo "昨日流量：".$CounterLastDay; 
    }else{//如果数据库为空时，相应的操作 
    } 
    } 
    ?> 
    

