<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:61:"E:\WWW\blog\public/../application/admin\view\admin\index.html";i:1483531528;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>后台管理中心</title>  
       <link rel="stylesheet" href="__PUBLIC__/style/admin.css">
    <link rel="stylesheet" href="__PUBLIC__/style/pintuer.css">
  <script src="__PUBLIC__/style/jquery.js"></script>     
</head>
<body style="background-color:#f2f9fd;">
<div class="header bg-main">
  <div class="logo margin-big-left fadein-top">
    <h1><img src="__PUBLIC__/images/y.jpg"class="radius-circle rotate-hover" height="50" alt="" />后台管理中心</h1>
  </div>
  <div class="head-l"><a class="button button-little bg-green" href="__ROOT__/../index" target="_blank"><span class="icon-home"></span> 前台首页</a> &nbsp;&nbsp;<a href="__ROOT__/admin/huancun" class="button button-little bg-blue"><span class="icon-wrench"></span> 清除缓存</a> &nbsp;&nbsp;<a class="button button-little bg-red" href="javascript:logout()"><span class="icon-power-off"></span> 退出登录</a> </div>
  <script type="text/javascript">
     function logout(){
     if(confirm("您确定要退出吗?")){
      window.location="__ROOT__/login/logout";
    }
  }
 
  </script>
</div>
<div class="leftnav">
  <div class="leftnav-title"><strong><span class="icon-list"></span>菜单列表</strong></div>
  <h2><span class="icon-user"></span>基本设置</h2>
  <ul style="display:block">
    <li><a href="__ROOT__/info.html" target="right"><span class="icon-caret-right"></span>网站设置</a></li>
    <li><a href="__ROOT__/pass.html" target="right"><span class="icon-caret-right"></span>修改密码</a></li>
    <li><a href="__ROOT__/page.html" target="right"><span class="icon-caret-right"></span>管理员管理</a></li>  
    <li><a href="__ROOT__/adv.html" target="right"><span class="icon-caret-right"></span>评论管理</a></li>   
    <li><a href="__ROOT__/book.html" target="right"><span class="icon-caret-right"></span>留言管理</a></li>     
    <li><a href="__ROOT__/column.html" target="right"><span class="icon-caret-right"></span>会员管理</a></li>
    <li><a href="__ROOT__/links.html" target="right"><span class="icon-caret-right"></span>友情链接</a></li>
  </ul>   
  <h2><span class="icon-pencil-square-o"></span>栏目管理</h2>
  <ul>
    <li><a href="__ROOT__/lista.html" target="right"><span class="icon-caret-right"></span>内容管理</a></li>
    <li><a href="__ROOT__/add.html" target="right"><span class="icon-caret-right"></span>添加内容</a></li>
    <li><a href="__ROOT__/cate.html" target="right"><span class="icon-caret-right"></span>分类管理</a></li>        
  </ul>  
</div>
<script type="text/javascript">
$(function(){
  $(".leftnav h2").click(function(){
    $(this).next().slideToggle(200);  
    $(this).toggleClass("on"); 
  })
  $(".leftnav ul li a").click(function(){
      $("#a_leader_txt").text($(this).text());
      $(".leftnav ul li a").removeClass("on");
    $(this).addClass("on");
  })
});
</script>
<ul class="bread">
  <li><a href="##"  class="icon-home"> 首页</a></li>
  <li><a href="##" id="a_leader_txt">网站信息</a></li>
  <li><b>当前语言：</b><span style="color:red;">中文</php></span>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;切换语言：<a href="##">中文</a> &nbsp;&nbsp;<a href="##">英文</a> </li>
</ul>
<div class="admin">
  <iframe scrolling="auto" rameborder="0" src="__ROOT__/info.html" name="right" width="100%" height="100%"></iframe>
</div>
<div style="text-align:center;">
<p>来源:<a href="http://www.mycodes.net/" target="_blank">源码之家</a></p>
</div>
</body>
</html>