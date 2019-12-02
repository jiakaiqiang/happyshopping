/**
 * Created by 13889 on 2019/1/20.
 */
let obj={};
$('.mainleft>li').click(function(e){
let liarr=$('.mainleft>li');
//循环遍历
for(let i=0;i<liarr.length;i++){
   liarr[i].style.background="";
   liarr[i].style.color='white';

}
$(this).css({'background':'#E0E0E0','color':'#333'})

    var indexs =$(this).index()/2;
    $('.foodlist').removeClass('current');

    var indexs =$(this).index()/2;
    //console.log(indexs);
    $('.foodlist').eq(indexs).addClass('current');
    //$(".mainleft>li").eq(indexs).css({background:'#ccc'});

});
//当点击dl中的元素的时候，获取元素中的值
$(".foodlist dl").click(function(e){
    //获取dl的值
    var dltext=$(this).text();
    console.log(dltext);
  window.location.href='http://127.0.0.1:8080/happyShoping/dist/foodsContents.html?foodsname='+escape(dltext)
  
});
//获取后台系统的id
$("#backmange").click(function(){

    var aa=$(".backmange").css('display');
    if(aa=='none'){
        console.log(aa);
        $(".backmange").css({display:'block'});
    }else if(aa='block'){
        $(".backmange").css({display:'none'});
    }

       console.log("i");
});
//页面加载的时候获取登陆人员的名称
getSessionItem=function(){
    //如果获取的人员名称不存在则证明是初次登陆
    if(localStorage.getItem('name')==null){
        console.log(localStorage.getItem('name'))
        $('#backmange').css({'display':'none'});
        $('#mycontent').css({'display':'none'}); 
        $('#mycontents').css({'display':'none'});
        return
    }
    let name=localStorage.getItem('name');
    
    //根据人员的名称发起请求

    $.ajax({
        url:'./phps/logindata.php',
    type:'POST',
    dataType:'json',
    async:false,
    data:{
        name:name,
    },
    success:(res)=>{
        //console.log(res)
        
        console.log('ss',res);
        if(res.isManager=='0'){
          
            $('#backmange').css({'display':'none'});
            $('#mycontent').css({'display':'inline-block'});
            $('#mycontents').css({'display':'inline-block'})
        }else if(res.isManager=='1'){
            $('#mycontents').css({'display':'none'})
            $('#backmange').css({'display':'inline-block'});
            $('#mycontent').css({'display':'none'});
        }else{
            $('#backmange').css({'display':'none'});
            $('#mycontent').css({'display':'none'}); 
            $('#mycontents').css({'display':'none'})
        }
        obj=res;
    }
    })
    //将人员信息展示到页面上
    $('#loginhidden').css({'display':'none'});
    $('#loginpeople').css({"display":'inline-block'}).html('欢迎'+"<a  href='javascript:void(0)'>"+name+'</a>登陆系统');


}
//点击登陆人的时候详细页进行展示
$('#loginpeople a').click(function(){
    alert('sss')
    $("#ltt-peoples").css({'display':'block'})
})
getSessionItem();
//人员信息的展示
funpeoplecontent=function(){
    $("#ltt-username>span").text(obj.username);
    $("#ltt-describe>span").text(obj.describe);
    $("#ltt-email>span").text(obj.email)

}
funpeoplecontent();
$("#ltt-contentEdit").click(()=>{
    //弹出模态框进行信息的修改
})
$('#ltt-exit').click(()=>{
    //获取登陆人员的姓名然后进行退出乐
    alert('马上退出了，亲不在看看您喜欢的宝贝')
    let name=$('#loginpeople a').text();
    console.log(name)
    localStorage.removeItem(name);
    $('#loginhidden').css({'display':'inline-block'});
    $('#loginpeople').css({"display":'none'})
})
/* //点击页面中的dl进行页面的跳转
$('.main dl').click(()=>{
    //获取当前的点击的文本
    alert('ddd')
   let name= $(this).val();
    window.location.href='../dist/商品页面.html?foodsName='+name;
}) */
console.log($('#searchName'))
//点击搜索进行商品的搜索
$('#searchName').click(function(){
    console.log('sss')
   $('#foodsInfos').css({'display':'block'})
})
//个人资料修改点击个人资料进行资料的显示
$("#editsystem").click(function(){
    console.log(window.location.href);
    location.href="http://127.0.0.1:8080/happyShoping/"
});


