<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:60:"E:\WWW\blog\public/../application/index\view\learn\shou.html";i:1483707958;s:63:"E:\WWW\blog\public/../application/index\view\common\header.html";i:1483851027;s:61:"E:\WWW\blog\public/../application/index\view\common\foot.html";i:1483612292;}*/ ?>
<!DOCTYPE HTML>
<html lang="zh-CN">
<head>
<meta charset="UTF-8">
<title><?php echo $typetitle; ?>-个人博客</title>
<meta name="keywords" content="个人博客" />
<meta name="description" content="" />
<link rel="stylesheet" href="__PUBLIC__/style/index.css"/>
<link rel="stylesheet" href="__PUBLIC__/style/style.css"/>
<script type="text/javascript" src="__PUBLIC__/style/jquery1.42.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/style/jquery.SuperSlide.2.1.1.js"></script>
<!--[if lt IE 9]>
<script src="js/html5.js"></script>
<![endif]-->
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
    <!--header end-->
    <!--content start-->
    <div id="say">
     <div class="weizi">
           <div class="wz_text">当前位置：<a href="#">首页</a>><h1><?php echo $typetitle; ?></h1></div>
           </div>
           <?php foreach($article as $value): ?>
          <ul class="say_box">
                     <div class="sy">
                         <p> <?php echo strip_tags($value['content']); ?></p>
                     </div>
                  <span class="dateview"><?php echo date("Y-m-d",$value['time']); ?></span>
          </ul>
         <?php endforeach; ?>
               <div class="pagelist" ><?php echo $article->render(); ?>
        <style>
li {
   
    float: left;}
         .pagelist {padding:10px 0; text-align:center;}
.pagelist span,.pagelist a{ border-radius:3px; border:1px solid #dfdfdf;display:inline-block; padding:5px 12px;}
.pagelist a{ margin:0 3px;}
.pagelist span.current{ background:#09F; color:#999; border-color:#09F; margin:0 2px;}
.pagelist a:hover{background:#09F; color:#FFF; border-color:#09F; }
.pagelist label{ padding-left:15px; color:#999;}
.pagelist label b{color:red; font-weight:normal; margin:0 3px;}


 </style>
        </div>
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
