<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:60:"E:\WWW\blog\public/../application/admin\view\cate\index.html";i:1483619749;}*/ ?>
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
<body>
<div class="panel admin-panel">
  <div class="panel-head"><strong class="icon-reorder"> 内容列表</strong></div>
  <form method="post",action="__ROOT__/Cate/ajax" id="ss" name="frm">
    <div class="padding border-bottom">
      <ul class="search" style="padding-left:10px;">
        
        <li>搜索：</li>
        <li>
          
          分类等级
          <select name="s_istop" id="s_istop" class="input" style="width:160px; line-height:17px;display:inline-block">
             <option value="-1">全部</option>
            <option value="-1">一级分类</option>
            <option value="0">二级分类</option>
             <option value="1">三级分类</option>            
          </select>
        </li>
        <if condition="$iscid eq 1">
        <li>父级分类</li>
          <li id='level'>
            <select name="cid"  class="input" style="width:200px; line-height:17px;"  id="ciwed">
            
              <?php foreach($type1 as $v): ?>
              <option value="<?php echo $v['id']; ?>"><?php echo $v['typetitle']; ?></option>
              <?php endforeach; ?>         
              
             
            </select>
          </li>
        </if>
        <li>
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
                   var jbo;
                   for (var i = obj.length - 1; i >= 0; i--) {
                       
                       
                       jbo +="<option value='"+obj[i]['id']+"'>"+obj[i]['typetitle']+"</option>";
                       
                       //alert(jbo);

                   };
                   var qsw="</select>";
                   var wsxc=jboj+jbo+qsw;
                   //alert(wsxc);
                   $("#level").html(wsxc);
                }
              });
                
            });
            $('#sousuo').click(function(){
              //alert('2121212');
              var fzr=$("#ciwed").val();
             // var fzr=$("#ss").serializeArray();
             
            // alert(fzr);return;
              $.ajax({
                url:'__ROOT__/Cate/ajax',
                type:"post",
                //date:JSON.stringify({"idtitle":fzr}),
                date:fzr,
                //dataType:"JSON",
                success:function(data){
                  
                }
              })
              

             
            })

          });
          </script>
           <a href="javascript:void(0)" class="button border-main icon-search" id="sousuo"> 搜索</a></li>
      </ul>
    </div>
  </form>
  <table class="table table-hover text-center">
    <tr>
      <th >ID</th>
      <th >分类名称</th>
      <th>等级</th>
       <th >是否为栏目</th>
       <th>是否有内容页</th>
      <th >操作</th>
    </tr>
    <?php foreach($type as $v): ?>
   <tr>
      <td><?php echo $v['id']; ?></td>
      <td><?php echo $v['typetitle']; ?></td>
      <td><?php echo $v['level']+1; ?></td>
      <td>
      <?php if($v['colum'] == 0): ?> 是栏目<?php else: ?>不是<?php endif; ?></td>
 <td>
      <?php if($v['matter'] == 0): ?> 有<?php else: ?>没有<?php endif; ?></td>
      <td><div class="button-group"> <a class="button border-main" href="__ROOT__/cate/cateedit/[typeid/<?php echo $v['id']; ?>].html"><span class="icon-edit"></span> 修改</a> <a class="button border-red" href="javascript:void(0)" onclick="return del(<?php echo $v['id']; ?>)"><span class="icon-trash-o"></span> 删除</a> </div></td>
    </tr>
    <?php endforeach; ?>
    <tr><td colspan="4"><?php echo $list->render(); ?></td></tr>
  </table>
</div>
<script type="text/javascript">
function del($id){
	if(confirm("您确定要删除吗?")){			
		window.location="__ROOT__/Cate/dele/[id/"+$id+"]";
	}
}
</script>
<div class="panel admin-panel margin-top">
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>添加内容</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="__ROOT__/Cate/insert">
      <div class="form-group">
        <div class="label">
          <label>上级分类：</label>
        </div>
        <div class="field">
          <select name="typeid" class="input w50">
            <option value="-1">请选择分类</option>
            <?php foreach($type1 as $v): ?>
            <option value="<?php echo $v['id']; ?>"><?php echo $v['typetitle']; ?></option>
            <?php endforeach; ?>
          </select>
          <div class="tips">不选择上级分类默认为一级分类</div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>分类标题：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="typetitle" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>批量添加：</label>
        </div>
        <div class="field">
          <textarea type="text" class="input w50" name="tits" style="height:150px;" placeholder="多个分类标题请转行"></textarea>
          <div class="tips">多个分类标题请转行</div>
        </div>
      </div>
    <div class="form-group">
        <div class="label">
          <label>是否为栏目：</label>
        </div>
        <div class="field">
          <input type="radio"  value="0" name="colum" />是栏目
          <input type="radio"  value="1" name="colum" />不是栏目
          <div class="tips"></div>
        </div>
      </div>
       <div class="form-group">
        <div class="label">
          <label>是否有内容页：</label>
        </div>
        <div class="field">
          <input type="radio"  value="0" name="matter" />有
          <input type="radio"  value="1" name="matter" />没有
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
</body>
</html>