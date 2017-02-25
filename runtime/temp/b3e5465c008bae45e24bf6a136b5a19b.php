<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:61:"E:\WWW\blog\public/../application/index\view\index\Index.html";i:1483773466;s:63:"E:\WWW\blog\public/../application/index\view\common\header.html";i:1483851027;s:62:"E:\WWW\blog\public/../application/index\view\common\right.html";i:1483794956;s:61:"E:\WWW\blog\public/../application/index\view\common\foot.html";i:1483612292;}*/ ?>
<!DOCTYPE HTML>
<html lang="zh-CN">
<head>
<meta charset="UTF-8">
<title><?php echo $website['stitle']; ?></title>
<meta name="keywords" content="<?php echo $website['stitle']; ?>" />
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
       <!--nav end-->
    <!--content start-->
    <div id="content">
         <!--left-->
         <div class="left" id="c_left">
           <div class="s_tuijian">
           <h2>文章<span>推荐</span></h2>
           </div>
          <div class="content_text">
             <?php foreach($articles as $value): ?>
           <div class="wz">
            <h3><a href="__ROOT__/news/index/[id/<?php echo $value['id']; ?>]" title="<?php echo $value['title']; ?>"><?php echo $value['title']; ?></a></h3>
             <dl>
               <dt><img src="__PUBLIC__/images/article/<?php echo $value['pic']; ?>" width="200"  height="123" alt=""></dt>
               <dd>
                 <p class="dd_text_1"><?php echo mb_substr(strip_tags($value['content']),0,165,'utf-8'); ?>.....</p>
               <p class="dd_text_2">
               <span class="left author"><?php echo $value['author']; ?></span><span class="left sj">时间:<?php echo date("Y-m-d",$value['time']); ?></span>
               <span class="left fl">分类:<a href="#" title="<?php echo $value['typetitle']; ?>"><?php echo $value['typetitle']; ?></a></span><span class="left yd"><a href="__ROOT__/news/index/[id/<?php echo $value['id']; ?>]" title="阅读全文">阅读全文</a>
               </span>
                <div class="clear"></div>
               </p>
               </dd>
               <div class="clear"></div>
             </dl>
            </div>
            <?php endforeach; ?>
           <!--wz end-->
           
           <!--wz end-->
              
        <div class="pagelist" ><?php echo $articles->render(); ?>
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

         </div>

         <!--left end-->
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
      
           <!--end-->
           
           <div class="link">
            <h2>友情链接</h2>
            <?php foreach($links as $value): ?>
            <p><a href="<?php echo $value['url']; ?>"><?php echo $value['title']; ?></a></p>
               <?php endforeach; ?>
           </div>
        
         </div>
         <!--right end-->
         <div class="clear"></div>
    </div>
    <!--content end-->
    <!--footer start-->
    
         
    <!--content end-->
    <!--footer start-->
     <div id="footer">
     <p><?php echo $website['scopyright']; ?></p>
    </div>
    <!--footer end-->
   


    <!--footer end-->
    <script type="text/javascript">jQuery(".lanmubox").slide({easing:"easeOutBounce",delayTime:400});</script>
    <script  type="text/javascript" src="__PUBLIC__/style/nav.js"></script>
}
</body>
</html>
