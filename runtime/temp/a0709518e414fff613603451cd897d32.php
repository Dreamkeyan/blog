<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:60:"E:\WWW\blog\public/../application/admin\view\page\index.html";i:1483861822;}*/ ?>
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
<body style="font-size: 2px">
<!-- <form method="post" action=""> -->
  <div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 管理员管理</strong></div>
    <div class="padding border-bottom">
      <ul class="search">
        <li>
       <li> <button class="button border-main icon-plus-square-o" id="jia"> 添加内容</button> </li>
          <button type="button"  class="button border-green" id="checkall"><span class="icon-check"></span> 全选</button>
          <button type="submit" class="button border-red" onclick="DelSelect()"><span class="icon-trash-o"></span> 批量删除</button>

        </li>
      </ul>
    </div>
    <table class="table table-hover text-center">
      <tr>
        <th>ID</th>
        <th width="50px">用户名</th>       
        <th>编辑权限</th>
        <th>修改权限</th>
        <th >删除权限</th>
         <th >会员管理权限</th>
         <th>管理员管理权限</th>
         <th >管理员</th>
        <th>操作</th>       
      </tr> 
      <form  name="xiantian">
      <tr id="xinjia" style="display: none">
          <th>新添加</th>
        <th><input type="hidden" name="Id" value="">
            <input type="text" name="username"  style="border:1;text-align: center;" /></th>       
        <th>可编辑<input  value="0" name="combjurld" type="radio" />
           不可编辑 <input " value="1" name="combjurld" type="radio" checked='checked'/> </th>
        <th>可修改<input  value="0" name="updajurld`" type="radio" />
           不可修改 <input  value="1" name="updajurld" type="radio" checked='checked'/> </th>
        <th >可删除<input  value="0" name="delartijurld" type="radio" />
           不可删除 <input  value="1" name="delartijurld" type="radio" checked='checked'/> </th>
         <th >可管理 <input  value="0" name="userjurld" type="radio" />
           不可管理  <input  value="1" name="userjurld" type="radio" checked/> </th>
           <th>可管理 <input  value="0" name="adminjurld" type="radio" />
           不可管理  <input  value="1" name="adminjurld" type="radio" checked /></th>
         <th >开 <input  value="0" name="isdel" type="radio" />
           关闭<input  value="1" name="isdel" type="radio" checked='checked'/> </th>
        <th><a class="button border-main icon-plus-square-o" href="javascript:indese()"> 添加</a> </th>  
      </tr>
      </form>
  
      <?php foreach($list as $value): ?> 
        <form method="post" action="__ROOT__/page/update" name="<?php echo $value['Id']; ?>">
        <tr>
          <td><input type="checkbox" name="id[]" value="<?php echo $value['Id']; ?>" />
            <?php echo $value['Id']; ?></td>
            <td>
            <input type="hidden" name="Id" value="<?php echo $value['Id']; ?>">
            <input   type="text" name="username" value="<?php echo $value['username']; ?>" style="border:0;text-align: center;width: 50px;" /></td>
            <!-- <td><?php echo $value['username']; ?></td> -->
          <td>
                <?php if($value['combjurld'] == 0): ?> 可编辑 <input  value="0" name="combjurld" type="radio"  checked="checked" />
            不可编辑<input  value="1" name="combjurld" type="radio" /> 
 
  <?php else: ?>  可编辑<input  value="0" name="combjurld" type="radio" />
           不可编辑 <input " value="1" name="combjurld" type="radio" checked='checked'/> 
  <?php endif; ?>
          </td>
          <td>
              <?php if($value['updajurld'] == 0): ?> 可修改 <input  value="0" name="updajurld" type="radio" checked='checked' />
            不可修改<input  value="1" name="updajurld" type="radio" />
 
  <?php else: ?>  可修改<input  value="0" name="updajurld`" type="radio" />
           不可修改 <input  value="1" name="updajurld" type="radio" checked='checked'/> 
  <?php endif; ?>
          </td>
          <td>
              <?php if($value['delartijurld'] == 0): ?> 可删除 <input  value="0" name="delartijurld" type="radio" checked='checked' />
            不可删除<input  value="1" name="delartijurld" type="radio" /> 
 
  <?php else: ?>  可删除<input  value="0" name="delartijurld" type="radio" />
           不可删除 <input  value="1" name="delartijurld" type="radio" checked='checked'/> 
  <?php endif; ?>
          </td>  
           
          <td>

            <?php if($value['userjurld'] == 0): ?> 可管理 <input  value="0" name="userjurld" type="radio" checked='checked' />
            不可管理 <input  value="1" name="userjurld" type="radio" /> 
 
  <?php else: ?>  可管理 <input  value="0" name="userjurld" type="radio" />
           不可管理  <input  value="1" name="userjurld" type="radio" checked='checked'/> 
  <?php endif; ?>
          </td>
          <td>
            <?php if($value['userjurld'] == 0): ?> 可管理 <input  value="0" name="adminjurld" type="radio" checked='checked' />
            不可管理 <input  value="1" name="adminjurld" type="radio" /> 
 
  <?php else: ?>  可管理 <input  value="0" name="adminjurld" type="radio" />
           不可管理  <input  value="1" name="adminjurld" type="radio" checked='checked'/> 
  <?php endif; ?>
          </td>
           <td>

            <?php if($value['isdel'] == 0): ?> 开 <input  value="0" name="isdel" type="radio" checked='checked' />
            关闭 <input  value="1" name="isdel" type="radio" /> 
 
  <?php else: ?>  开 <input  value="0" name="isdel" type="radio" />
           关闭  <input  value="1" name="isdel" type="radio" checked='checked'/> 
  <?php endif; ?>
          </td>
          <td><div class="button-group"> <a class="button border-red" href="javascript:void(0)" onclick="return del(<?php echo $value['Id']; ?>)"><span class="icon-trash-o"></span> 删除</a> 
<a class="button border-green" href="javascript:void(0)" onclick="return update(<?php echo $value['Id']; ?>)"><span class="icon-edit"></span>修改</a> 
          </div></td>
        </tr>
        </form>
        <?php endforeach; ?>
      
      <tr>
        <td colspan="9"><div class="pagelist"> <?php echo $list->render(); ?></div></td>
      </tr>
    </table>
  </div>
<!-- </form> -->
<script type="text/javascript">

function del(id){
	if(confirm("您确定要删除吗?")){
		window.location="__ROOT__/Page/dele/[id/"+id+"]";
	}
}

$("#checkall").click(function(){ 
  $("input[name='id[]']").each(function(){
	  if (this.checked) {
		  this.checked = false;
	  }
	  else {
		  this.checked = true;
	  }
  });
})

function DelSelect(){
	var radio=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		radio=true;	
	  }
	});
	if (radio){
		var t=confirm("您确认要删除选中的内容吗？");
		if (t==false) return false; 		
	}
	else{
		alert("请选择您要删除的内容!");
		return false;
	}
  //alert($("input[name='id[]']").serialize());
   $.ajax({
            type:"post",
            data:$("input[name='id[]']").serialize(),
            url:"__ROOT__/Page/delselect",
            dataType:'text',
            success:function(data){
              if(data>0){
                alert("删除管理员成功");
                location.reload(true);
              }else{
                alert("删除管理员失败");
              }
            }
  })
}

</script>
</body>
</html>

<script type="text/javascript">

function update(id){
  if(confirm("您确定要修改吗?")){
 
      // console.log(JSON.stringify($("[name=<?php echo $value['Id']; ?>]").serialize()));return;
      $.ajax({
            type:"post",
            data:$("[name="+id+"]").serialize(),
            url:"__ROOT__/page/update",
            dataType:'text',
            success:function(data){
              if(data>0){
                 alert("保存成功"); 
              }else if(data=="-1"){
                alert("无法修改自己的账号，请联系更高级管理员");
              }
              else{
                alert("修改失败");
              }
            }

      })

    }

  }

$("#jia").click(function(){
var se= $("#xinjia").css("display");
//console.log(se)
if( se=="none"){
    $("#xinjia").css("display","");
 }else{

    $("#xinjia").css("display","none");
 }
})
  
function indese(){
  if(confirm("您确定要添加新管理员吗？"))
{
  $.ajax({
    type:"post",
    data:$("[name=xiantian]").serialize(),
    url:"__ROOT__/page/indese",
    dataType:'text',
    success:function(data){
       if(data==1){
                alert("添加管理员成功");
                location.reload(true);
              }else{
                alert("添加管理员失败");
              }
            
    }
  })
}
}
</script>