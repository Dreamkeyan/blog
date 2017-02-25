<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:60:"E:\WWW\blog\public/../application/index\view\news\Index.html";i:1483842959;s:63:"E:\WWW\blog\public/../application/index\view\common\header.html";i:1483851027;s:62:"E:\WWW\blog\public/../application/index\view\common\right.html";i:1483794956;s:61:"E:\WWW\blog\public/../application/index\view\common\foot.html";i:1483612292;}*/ ?>
<!DOCTYPE HTML>
<html lang="zh-CN">
<head>
<meta charset="UTF-8">
<title><?php echo $article1['title']; ?></title>
<meta name="keywords" content="个人博客" />
<meta name="description" content="" />
<link rel="stylesheet" href="__PUBLIC__/style/index.css"/>
<link rel="stylesheet" href="__PUBLIC__/style/style.css"/>
<script type="text/javascript" src="__PUBLIC__/style/jquery1.42.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/style/jquery.SuperSlide.2.1.1.js"></script>

<!--[if lt IE 9]>
<script src="js/html5.js"></script>
<![endif]-->
<style type="text/css">
div,h2,h3,ul,li,p{margin:0;padding:0;}
a{text-decoration:none;}
a:hover{text-decoration:underline;}
ul{list-style-type:none;}

#msgBox{width:500px;background:#fff;border-radius:5px;margin:10px auto;padding-top:10px;}
#msgBox form h2{font-weight:400;font:400 18px/1.5 \5fae\8f6f\96c5\9ed1;}
#msgBox form{background:url(__PUBLIC__/images/boxBG.jpg) repeat-x 0 bottom;padding:0 20px 15px;}
#userName,#conBox{color:#777;border:1px solid #d0d0d0;border-radius:6px;background:#fff url(__PUBLIC__/images/inputBG.png) repeat-x;padding:3px 5px;font:14px/1.5 arial;}
#userName.active,#conBox.active{border:1px solid #7abb2c;}
#userName{height:20px;}
#conBox{width:700px;resize:none;height:65px;overflow:auto;}
#msgBox form div{position:relative;color:#999;margin-top:10px;}
#msgBox img{border-radius:3px;}
#face{position:absolute;top:0;left:172px;}
#face img{width:30px;height:30px;cursor:pointer;margin-right:6px;opacity:0.5;filter:alpha(opacity=50);}
#face img.hover,#face img.current{width:28px;height:28px;border:1px solid #f60;opacity:1;filter:alpha(opacity=100);}
#sendBtn{border:0;width:80px;height:30px;cursor:pointer;margin-left:10px;background:url(__PUBLIC__/images/publishing-enabled.png) no-repeat;}
#sendBtn.hover{background-position:0 -30px;}
#msgBox form .maxNum{font:26px/30px Georgia, Tahoma, Arial;padding:0 5px;}

.tr{overflow:hidden;zoom:1;}
.tr p{float:right;line-height:30px;}
.tr *{float:left;}
</style>
</head>

<body>
      <!--header start-->
   <script type="text/javascript">
function logout(){
  if(confirm("是否确认退出")){
    window.location="__ROOT__/login/logout";
  }
  
}

</script>
    <!--header start-->
    <div id="header">
    <?php if($denglu == 1): ?>
     <h5 style="float:right;"><a href="javascript:logout()">退出</a></h5>
     <img src="__PUBLIC__/images/<?php echo $userlogin['portrial']; ?>""  alt="<?php echo $userlogin['username']; ?>" title="<?php echo $userlogin['username']; ?>" width="50px" height="50px" style="float:right;" />
     <?php else: ?>
    <h3 style="float:right;"><a href="__ROOT__/login">登录</a></h3>
   <?php endif; ?>
      <h1><?php echo $website['stitle']; ?></h1>
      <p><?php echo $website['sdescription']; ?></p>    
    </div>
     <!--header end-->
    <!--nav-->
     <div id="nav">
        <ul>
         <li><a href="__ROOT__">首页</a></li>
         <?php foreach($headertype as $value): ?>
       
          <li><a  href="__ROOT__/learn/index/[id/<?php echo $value['id']; ?>/matter/<?php echo $value['matter']; ?>]"><?php echo $value['typetitle']; ?></a></li>
            
         <?php endforeach; ?>
         <li><a href="__ROOT__/guestbook">留言板</a></li>
         <div class="clear"></div>
        </ul>
      </div>
       <!--nav end-->
       <!--nav end-->
    <!--content start-->
    <div id="content">
       <!--left-->
         <div class="left" id="news">
           <div class="weizi">
           <div class="wz_text">当前位置：<a href="#">首页</a>><a href="#"><?php echo $article1['typetitle']; ?></a>><span>文章内容</span></div>
           </div>
           <div class="news_content">
                  <div class="news_top">
                    <h1><?php echo $article1['title']; ?></h1>
                    <p>
                      <span class="left sj">时间:<?php echo date("Y-m-d",$article1['time']); ?></span><span class="left fl">分类:<?php echo $article1['typetitle']; ?></span>
                      <span class="left author"><?php echo $article1['author']; ?></span>
                    </p>
                    <div class="clear"></div>
                  </div>
                    <div class="news_text">
                      <?php echo $article1['content']; ?>
                    </div>
<br /><br /><br />
                    <h2 style="float: left;color: #999;">用户评论</h2><h4 style="float: right;color: #999;">评论数() &nbsp阅读(<?php echo $article1['click']; ?>)</h4>
                    <!-- 用户留言区域 -->
          <form>
    <div><textarea id="conBox" class="f-text" oninput ="cgebn()"></textarea></div>
        <div class="tr">
            <p>
                <span id="countTxt" class="countTxt">还能输入</span><strong id="maxNum" class="maxNum" style="font:26px/30px Georgia, Tahoma, Arial;padding:0 5px;">140</strong><span>个字</span>

                <input id="sendBtn" type="button"  onclick="return sub()" value="" title="快捷键 Ctrl+Enter" />
            </p>
        </div>
        </form>
        <div class="list" >
        <h3 style="    position: relative;
    height: 33px;
    font-size: 14px;
    font-weight: 400;
    background: #e3eaec;
    border: 1px solid #dee4e7;"><span style="position: absolute;
    left: 6px;
    top: 6px;
    background: #fff;
    line-height: 28px;
    display: inline-block;
    padding: 0 15px;"> 大家在说</span></h3>
        <ul style="width:700px ">
          <?php if($review != ""): foreach($review as $value): ?>
            <li style="    float: left;
    clear: both;
    width: 100%;
    border-bottom: 1px dashed #d8d8d8;
    padding: 10px 0;
    background: #fff;
    overflow: hidden">
           

               <div class="userPic" style="float: left; margin-left: 5px;"><img src="__PUBLIC__/images/<?php echo $value['portrial']; ?>" width="50px" height="50px" /></div>
                <div class="content" style="float: left; margin-left: 5px;width:90%">
                    <div class="userName" style="float: left; margin-left: 5px;"><a href="javascript:;"><?php echo $value['username']; ?></a>:</div>
                    <div class="msgInfo"  margin-left: 5px;"><?php echo $value['centent']; ?></div>
                    <div class="times"><span><?php echo date("Y-m-d h-i-s",$value['reviewdate']); ?></span><a  style="text-align: right;float: right ;margin-bottom: 0px;" class="del" href="javascript:dele(<?php echo $value['ID']; ?>);">删除</a>
<a  style="text-align: right;float: right ;margin-bottom: 0px;" class="del" href="javascript:huifu(<?php echo $value['ID']; ?>);">回复</a>
                    </div>
                </div>

            </li>
            <li name="<?php echo $value['ID']; ?>" style="display: none"> 
            <form>
    <div><textarea id="conBox" name="conBox<?php echo $value['ID']; ?>" class="f-text" oninput ="cgebnqwe(<?php echo $value['ID']; ?>)"></textarea></div>
        <div class="tr">
            <p>
                <span id="countTxt" class="zxcountTxt">还能输入</span><strong id="asamaxNum" class="maxNum" style="font:26px/30px Georgia, Tahoma, Arial;padding:0 5px;">140</strong><span>个字</span>

                <input id="sendBtn" type="bottom" onclick="return subz(<?php echo $value['ID']; ?>)" value="" title="快捷键 Ctrl+Enter" />
            </p>
        </div>
        </form></li>
            <?php endforeach; else: endif; ?>
            <li><?php echo $list->render(); ?></li>
            </ul></div>
      <!-- 用户发布留言区域结束 -->
          </div>
         </div>
         <!--end left -->
         <!--right-->
           <div class="right" id="c_right">
          <div class="s_about">
          <h2>关于博主</h2>
           <img src="__PUBLIC__/images/<?php echo $website['slogo']; ?>" width="230" height="230" alt="博主"/>
           <p>博主：<?php echo $website['s_name']; ?></p>
           <p>职业：<?php echo $website['s_fax']; ?></p>
           <p>简介：<?php echo $website['email']; ?></p>
           <p>
           <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $website['QQ']; ?>&site=qq&menu=yes"><span class="left "><img border="0" src="http://wpa.qq.com/pa?p=2:<?php echo $website['QQ']; ?>:41" alt="联系博主" title="联系博主"/></a></span><a target="_blank" href="//shang.qq.com/wpa/qunwpa?idkey=b2d92794c5954640bb3858e83fa68d60bcfcb87db557ba1cf135468636dcb137"><span class="left "><img border="0" src="//pub.idqqimg.com/wpa/images/group.png" alt="紫云阁" title="紫云阁"></span></a>
           <div class="clear"></div>
           </p>
          </div>
          <!--栏目分类-->
           <div class="lanmubox">
              <div class="hd">
               <ul><li>精心推荐</li><li>最新文章</li><li class="hd_3">随机文章</li></ul>
              </div>
              <div class="bd">
                <ul>
                <?php foreach($rese as $value): ?>
          <li><a href="__ROOT__/news/index/[id/<?php echo $value['id']; ?>]" title="<?php echo $value['title']; ?>"><?php echo mb_substr($value['title'],0,12,'utf-8'); ?>...</a></li>
          <!-- <li><a href="#" title="关于响应式布局">关于响应式布局</a></li>
          <li><a href="#" title="如何创建个人博客网站">如何创建个人博客网站</a></li>
          <li><a href="#" title="网站项目实战开发（二）">网站项目实战开发（二）</a></li>
          <li><a href="#" title="为什么新站前期排名老是浮动？(转)">为什么新站前期排名老是浮动？(转)</a></li> -->
          <?php endforeach; ?>
        </ul>
                 <ul>
              <?php foreach($rece as $value): ?>
          <li><a href="__ROOT__/news/index/[id/<?php echo $value['id']; ?>]" title="<?php echo $value['title']; ?>"><?php echo mb_substr($value['title'],0,12,'utf-8'); ?>...</a></li>
          <!-- <li><a href="#" title="关于响应式布局">关于响应式布局</a></li>
          <li><a href="#" title="如何创建个人博客网站">如何创建个人博客网站</a></li>
          <li><a href="#" title="网站项目实战开发（二）">网站项目实战开发（二）</a></li>
          <li><a href="#" title="为什么新站前期排名老是浮动？(转)">为什么新站前期排名老是浮动？(转)</a></li> -->
          <?php endforeach; ?>
        </ul>
                 <ul>
               <?php foreach($reee as $value): ?>
          <li><a href="__ROOT__/news/index/[id/<?php echo $value['id']; ?>]" title="<?php echo $value['title']; ?>"><?php echo mb_substr($value['title'],0,12,'utf-8'); ?>...</a></li>
          <!-- <li><a href="#" title="关于响应式布局">关于响应式布局</a></li>
          <li><a href="#" title="如何创建个人博客网站">如何创建个人博客网站</a></li>
          <li><a href="#" title="网站项目实战开发（二）">网站项目实战开发（二）</a></li>
          <li><a href="#" title="为什么新站前期排名老是浮动？(转)">为什么新站前期排名老是浮动？(转)</a></li> -->
          <?php endforeach; ?>
        </ul>
                 
                
              </div>
           </div>
           <!--end-->
      
         <!--end  right-->
         </div>
         <div class="clear"></div>
         
    </div>

    <!--content end-->
    <!--footer-->
    
         
    <!--content end-->
    <!--footer start-->
     <div id="footer">
     <p><?php echo $website['scopyright']; ?></p>
    </div>
    <!--footer end-->
   


    <!--footer end-->
    <script type="text/javascript">jQuery(".lanmubox").slide({easing:"easeOutBounce",delayTime:400});</script>
    <script  type="text/javascript" src="__PUBLIC__/style/nav.js"></script>
</body>
</html>
<script type="text/javascript">
function  cgebn(){
 // $("#conBox").value.length;
//alert($("#conBox").val().length);
var iLen = 0;
var oMaxNum = $("#maxNum");
var oCountTxt = $("#countTxt");
    var maxNum = 140;
    var mxs= maxNum - $("#conBox").val().length;
   // alert(mxs);
   if( mxs<0){
    mxs="<font style='color:red;'>"+mxs+"</font>"
   }
    oMaxNum.html(mxs);
}
function sub(){
  if(confirm("请确认是否发布评论？")){
   var sd= $('#conBox').val();
   //alert($('#conBox').val());
   window.location="__ROOT__/news/sub/[id/<?php echo $article1['id']; ?>/content/"+sd+"]";
  }

}
function huifu(reviewid){
    var sps= $("[name="+reviewid+"]");
    //alert(sps);
    if (sps.css("display") == "none" ) {
      sps.css("display","block");
    }else{
      sps.css("display","none");
    }
}

function subz(reviewid){
  if(confirm("请确认是否发布评论？")){
    alert('#conBox'+reviewid);
    $he='conBox'+reviewid;
   var sd= $("[name=conBox"+reviewid+"]").val();
   alert(sd);
   window.location="__ROOT__/news/subz/[id/<?php echo $article1['id']; ?>/reviewid/"+reviewid+"/content/"+sd+"]";
  }

}
function  cgebnqwe(reviewid){
 // $("#conBox").value.length;
//alert($("#conBox").val().length);
var iLen = 0;
var oMaxNum = $("#asamaxNum");
var oCountTxt = $("#zxcountTxt");
    var maxNum = 140;
    var mxs= maxNum - $("[name=conBox"+reviewid+"]").val().length;
   // alert(mxs);
   if( mxs<0){
    mxs="<font style='color:red;'>"+mxs+"</font>"
   }
    oMaxNum.html(mxs);
}
function dele(reviewid){
   if(confirm("请确认是否删除评论与回复？")){
   // alert('#conBox'+reviewid);
   // $he='conBox'+reviewid;
   //var sd= $("[name=conBox"+reviewid+"]").val();
   //alert(sd);
   window.location="__ROOT__/news/dele/[id/"+reviewid+"]";
  }
}
</script>


