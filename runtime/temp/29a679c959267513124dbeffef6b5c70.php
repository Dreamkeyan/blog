<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:63:"E:\WWW\blog\public/../application/admin\view\cate\cateedit.html";i:1483619552;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="renderer" content="webkit">
<title></title>
<link rel="stylesheet" href="__PUBLIC__/style/pintuer.css">
<link rel="stylesheet" href="__PUBLIC__/style/admin.css">
<script src="__PUBLIC__/style/jquery.js"></script>
<script src="__PUBLIC__/style/pintuer.js"></script>
</head>
<body >
<div class="panel admin-panel margin-top" >
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>修改分类</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="__ROOT__/Cate/cateeditupda/[id/<?php echo $xiug['id']; ?>]">        
      <div class="form-group">
        <div class="label">
          <label>分类标题：</label>
        </div>
        <div class="field" id="hgy">
          <input type="text" class="input w50" name="title" value="<?php echo $xiug['typetitle']; ?>" />
          <div class="tips"></div>
        </div>
      </div>        
      <div class="form-group">
        <div class="label">
          <label>分类等级：</label>
        </div>
        <div class="field">
          <select name="s_istop" id="s_istop" class="input" style="width:160px; line-height:17px;display:inline-block">
           
            <option value="-1" id="a">一级分类</option>
            <option value="0"  id="b" >二级分类</option>
             <option value="1" id="c">三级分类</option>
          </select>

        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>父级标签：</label>
        </div>
        <div class="field" id="level">
          <select name="cid"  class="input" style="width:200px; line-height:17px;"  id="ciwed">
            
              
              <option value="<?php echo $xiug['typeid']; ?>"><?php echo $xiug['typefjtitle']; ?></option>
                
                          
            </select>  

        </div>
      </div>
     
      <div class="form-group">
        <div class="label">
          <label>是否为栏目：</label>
        </div>
        <div class="field">
          <?php if($xiug['colum'] == 0): ?> 是栏目 <input  value="0"  name="colum" type="radio" checked='checked' />
            不是栏目 <input  value="1" name="colum" type="radio" /> 
 
  <?php else: ?>  是栏目 <input  value="0" name="colum" type="radio" />
           不是栏目  <input  value="1" name="colum" type="radio" checked='checked'/> 
  <?php endif; ?>
          <div class="tips"></div>
        </div>
      </div>
            <div class="form-group">
        <div class="label">
          <label>是否有内容页：</label>
        </div>
        <div class="field">
          <?php if($xiug['matter'] == 0): ?> 有 <input  value="0"  name="matter" type="radio" checked='checked' />
            没有 <input  value="1" name="matter" type="radio" /> 
 
  <?php else: ?>  有 <input  value="0" name="matter" type="radio" />
           没有  <input  value="1" name="matter" type="radio" checked='checked'/> 
  <?php endif; ?>
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
 <script>
          $(function(){
            $('#s_istop').change(function(){
              // var level = this.value;
              $.ajax({
                url:'__ROOT__/Cate/ajx',
                type:'post',
                data:JSON.stringify({'level':this.value}),
                dataType:"JSON",
                success:function(data){
                    //$("#level").html(data);
                    // var level = dcoument.getElementById('level');
                    // alert(level);
                   var obj= eval(data);
                   var jboj="<select name='cid'  class='input' style='width:200px; line-height:17px;'id='ciwed' >";
                   var objq=" <option value='0'>顶级菜单</option>"
                   var jbo;
                   for (var i = obj.length - 1; i >= 0; i--) {
                       
                       
                       jbo +="<option value='"+obj[i]['id']+"'>"+obj[i]['typetitle']+"</option>";
                       
                       //alert(jbo);

                   };
                   var qsw="</select>";
                   if(obj.length<1){
                    var wsxc=jboj+objq+jbo+qsw;
                   }else{
                    var wsxc=jboj+jbo+qsw;
                   }
                   
                   //alert(wsxc);
                   $("#level").html(wsxc);
                }
              });
                
            });
   $("#hgy").ready(function(){
      selected_option = <?php echo $xiug['level']-1; ?>;
        $("select#s_istop").val(selected_option);
   
  
})

})
</script>