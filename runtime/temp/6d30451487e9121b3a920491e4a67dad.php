<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:60:"E:\WWW\blog\public/../application/admin\view\info\index.html";i:1483611452;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>网站信息</title>  
    <link rel="stylesheet" href="__PUBLIC__/style/pintuer.css">
    <link rel="stylesheet" href="__PUBLIC__/style/admin.css">
    <script src="__PUBLIC__/style/jquery.js"></script>
    <script src="__PUBLIC__/style/pintuer.js"></script> 
    <script src ="__PUBLIC__/../KindEditor/kindeditor.js"></script>

  <script type="text/javascript">
    var editor;
    KindEditor.ready(function(e){
      editor = e.create("[name=scopyright]",{
        width:"100%",
        height:"20%"
      });
    });
    </script>
</head>
<body>
<div class="panel admin-panel">
  <div class="panel-head"><strong><span class="icon-pencil-square-o"></span> 网站信息</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="__ROOT__/info/update" enctype="multipart/form-data" >
      <div class="form-group">
        <div class="label">
          <label>网站标题：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="stitle" value="<?php echo $website['stitle']; ?>" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>网站LOGO：</label>
        </div>
        <div class="field">
          <!-- <input type="text" id="url1" name="slogo" class="input tips" style="width:25%; float:left;" value="" data-toggle="hover" data-place="right" data-image=""  /> -->
           <!-- <input type="file" class="button bg-blue margin-left" id="image1" value="" ><img src="" whidth="60px" id="img" height="60px"> -->
           <div id="preview" style="filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale); width:180px;height:190px;border:solid 1px black;"><img src="__PUBLICI__\images\<?php echo $website['slogo']; ?>" style='width: 179px; height: 189px;' ></div>
  
          <input type="file" id="fileid" name="fileid" onchange="preImg(this.id,'imgid');"/>
          <input type="hidden" name="pic" value="<?php echo $website['slogo']; ?>">

           <script type="text/javascript">
// 获取本地上传的照片路径  
      function getPath(obj) {  
          if (obj) {  
              //ie  
              if (window.navigator.userAgent.indexOf("MSIE") >= 1) {  
                  obj.select();  
                  // IE下取得图片的本地路径  
                  return document.selection.createRange().text;  
              }  
              //firefox  
              else if (window.navigator.userAgent.indexOf("Firefox") >= 1) {  
                  if (obj.files) {  
                      // Firefox下取得的是图片的数据  
                      return obj.files.item(0).getAsDataURL();  
                  }  
                  return obj.value;  
              }  
              return obj.value;  
          }  
      }  
//显示图片
  
function previewPhoto(){  
    var picsrc=getPath(document.all.fileid);  
    var picpreview=document.getElementById("preview");  
    if(!picsrc){   
     return
    }  
    if(window.navigator.userAgent.indexOf("MSIE") >= 1) {  
         if(picpreview) {  
          try{  
                 picpreview.filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = picsrc;  
                }catch(ex){  
           alert("文件路径非法，请重新选择！") ;  
           return false;  
          }  
     }else{   
        picpreview.innerHTML="<img src='"+picsrc+"' />";  
     }  
   }  
}  
  
  
  
function preImg(fileid, imgid) {
    if (typeof FileReader == 'undefined') {
        var picsrc=getPath(document.all.fileid)
        $("#imgid").attr({ src: picsrc});
        previewPhoto();
    }
    else{
    var reader = new FileReader();
    var name=$("#fileid").val();
    var picpreview=document.getElementById("preview");  
    reader.onload = function(e) {
        var img = document.getElementById(imgid);
        //img.src = this.result;
        picpreview.innerHTML="<img src='"+this.result+"' style='width: 179px; height: 189px;' />";  
    }
    reader.readAsDataURL(document.getElementById(fileid).files[0]);
}
}
  
  </script>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>网站域名：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="surl" value="<?php echo $website['surl']; ?>" />
        </div>
      </div>
   <!--    <div class="form-group" style="display:none">
        <div class="label">
          <label>副加标题：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="sentitle" value="" />
          <div class="tips"></div>
        </div>
      </div> -->
      <!-- <div class="form-group" style="display:none;">
        <div class="label">
          <label>网站关键字：</label>
        </div>
        <div class="field">
          <textarea class="input" name="skeywords" style="height:80px"></textarea>
          <div class="tips"></div>
        </div>
      </div> -->
      <div class="form-group">
        <div class="label">
          <label>网站描述：</label>
        </div>
        <div class="field">
          <textarea class="input" name="sdescription"><?php echo $website['sdescription']; ?></textarea>
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>联系人：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="s_name" value="<?php echo $website['s_name']; ?>" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>手机：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="s_phone" value="<?php echo $website['s_phone']; ?>" />
          <div class="tips"></div>
        </div>
      </div>
      <!-- <div class="form-group" style="display:none;">
        <div class="label">
          <label>电话：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="s_tel" value="" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group" style="display:none;">
        <div class="label">
          <label>400电话：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="s_400" value="" />
          <div class="tips"></div>
        </div>
      </div> -->
      <div class="form-group">
        <div class="label">
          <label>职业：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="s_fax" value="<?php echo $website['s_fax']; ?>" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>QQ：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="s_qq" value="<?php echo $website['QQ']; ?>" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group" style="display:block;">
        <div class="label">
          <label>QQ群：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="s_qqu" value="<?php echo $website['s_qqu']; ?>" />
          <div class="tips"></div>
        </div>
      </div>
     
      <div class="form-group">
        <div class="label">
          <label>个人简介：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="s_email" value="<?php echo $website['email']; ?>" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>地址：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="s_address" value="<?php echo $website['s_address']; ?>" />
          <div class="tips"></div>
        </div>
      </div>  
              
      <div class="form-group">
        <div class="label">
          <label>底部信息：</label>
        </div>
        <div class="field">
          <textarea name="scopyright" class="input" style="height:120px;"><?php echo $website['scopyright']; ?></textarea>
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label></label>
        </div>
        <div class="field">
          <button class="button bg-main icon-check-square-o" type="submit"> 提交</button>
        </div>
      </div>
    </form>
  </div>
</div>
</body></html>