<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:62:"E:\WWW\blog\public/../application/admin\view\column\index.html";i:1483868584;}*/ ?>
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
<body style="font-size: 1px">
<!-- <form method="post" action=""> -->
  <div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder">会员管理</strong></div>
    <div class="padding border-bottom">
      <ul class="search">
        <li>
          <button type="button"  class="button border-green" id="checkall"><span class="icon-check"></span> 全选</button>
          <button type="submit" class="button border-red" onclick="DelSelect()"><span class="icon-trash-o"></span> 批量删除</button>
        </li>
      </ul>
    </div>
    <table class="table table-hover text-center">
      <tr>
        <th>ID</th>
        <th> 用户名</th>       
        <th>电话</th>
        <th>邮箱</th>
        <th>地址</th>
        <th >评论权限</th>
         <th >留言权限</th>
        <th>操作</th>       
      </tr> 
      <?php if($list != ""): foreach($list as $value): ?> 
      
      
      
      <form  name="<?php echo $value['Id']; ?>">     
        <tr>
          <td><input type="checkbox" name="id[]" value="<?php echo $value['Id']; ?>" />
            <?php echo $value['Id']; ?></td>
          <td> <input type="hidden" name="Id" value="<?php echo $value['Id']; ?>">
            <input type="text" name="username" readonly value="<?php echo $value['username']; ?>" style="border:0;text-align: center;" /></td>
          <td><input type="text" name="photho" readonly value="<?php echo $value['photho']; ?>" style="border:0;text-align: center;" /></td>
          <td><input type="text" name="Email" readonly value="<?php echo $value['Email']; ?>" style="border:0;text-align: center;" /></td>  
           <td><input type="text" name="dizhi" readonly value="<?php echo $value['dizhi']; ?>" style="border:0;text-align: center;" /></td>         
          <td> <?php if($value['reviewjurld'] == 0): ?> 可评论 <input  value="0" name="reviewjurld" type="radio"  checked="checked" />
            不可评论<input  value="1" name="reviewjurld" type="radio" /> 
 
  <?php else: ?>  可评论<input  value="0" name="reviewjurld" type="radio" />
           不可评论 <input " value="1" name="reviewjurld" type="radio" checked='checked'/> 
  <?php endif; ?></td>
          <td> <?php if($value['leaverjurld'] == 0): ?> 可留言<input  value="0" name="leaverjurld" type="radio"  checked="checked" />
            不可留言<input  value="1" name="leaverjurld" type="radio" /> 
 
  <?php else: ?>  可留言<input  value="0" name="leaverjurld" type="radio" />
           不可留言 <input " value="1" name="leaverjurld" type="radio" checked='checked'/> 
  <?php endif; ?></td>
          <td><div class="button-group"> <a class="button border-red" href="javascript:void(0)" onclick="return del(<?php echo $value['Id']; ?>)"><span class="icon-trash-o"></span> 删除</a> <a class="button border-green" href="javascript:void(0)" onclick="return update(<?php echo $value['Id']; ?>)"><span class="icon-edit"></span>修改</a> </div></td>
        </tr>
        </form>
   <?php endforeach; ?>
        <td colspan="8"><div class="pagelist"> <?php echo $list->render(); ?> </div></td>
    <?php else: endif; ?>
      </tr>
    
    </table>
  </div>
<!-- </form> -->
<script type="text/javascript">

function del(id){
  if(confirm("您确定要删除吗?")){
    window.location="__ROOT__/Column/dele/[id/"+id+"]";
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
            url:"__ROOT__/Column/delselect",
            dataType:'text',
            success:function(data){
              if(data>0){
                alert("删除会员成功");
                location.reload(true);
              }else{
                alert("删除会员失败");
              }
            }
  })
}

</script>
</body></html>
<script type="text/javascript">

function update(id){
  if(confirm("您确定要修改吗?")){
    alert($("[name="+id+"]").serialize());
      // console.log(JSON.stringify($("[name=<?php echo $value['Id']; ?>]").serialize()));return;
      $.ajax({
            type:"post",
            data:$("[name="+id+"]").serialize(),
            url:"__ROOT__/Column/update",
            dataType:'text',
            success:function(data){
              if(data>0){
                 alert("保存成功"); 
              }
              else{
                alert("修改失败");
              }
            }

      })

    }

  }
  </script>