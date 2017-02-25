<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:60:"E:\WWW\blog\public/../application/admin\view\book\index.html";i:1483497480;}*/ ?>
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
<form method="post" action="">
  <div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 留言管理</strong></div>
    <div class="padding border-bottom">
      <ul class="search">
        <li>
          <button type="button"  class="button border-green" id="checkall"><span class="icon-check"></span> 全选</button>
          <button type="submit" class="button border-red"onclick="DelSelect()"><span class="icon-trash-o"></span> 批量删除</button>
        </li>
      </ul>
    </div>
    <table class="table table-hover text-center">
      <tr>
        <th>ID</th>
        <th>留言会员名</th>       
        <th>留言内容</th>
        <th>父级留言ID</th>
        <th>留言时间</th>
        <th >用户删除</th>
         
        <th>操作</th> 

      </tr>
      <?php if($leaver != ""): foreach($leaver as $value): ?>
      <form  name="<?php echo $value['id']; ?>" >   
        <tr>
          <td><input type="checkbox" name="id[]" value=<?php echo $value['id']; ?> />
           <?php echo $value['id']; ?></td>
          <td><?php echo $value['username']; ?></td>
          <td ><input type="button" onclick="ale('<?php echo $value['centent']; ?>')" name="<?php echo $value['id']; ?>" value="<?php echo mb_substr($value['centent'],0,7,'utf-8'); ?>" style="border: 0;text-align: center;background-color: #fff" ></td>
          
          <td><?php echo $value['leaverid']; ?></td>  
           <td><?php echo date("y-m-d",$value['leaverdate']); ?></td>         
         
          <td> <?php if($value['isdel'] == 0): ?> 未删 <input  value="0" name="isdel" type="radio" checked='checked' />
            已删 <input  value="1" name="isdel" type="radio" /> 
 
  <?php else: ?>  未删 <input  value="0" name="isdel" type="radio" />
           已删  <input  value="1" name="isdel" type="radio" checked='checked'/> 
  <?php endif; ?></td>
          <td><div class="button-group"> <a class="button border-red" href="javascript:void(0)" onclick="return del(<?php echo $value['id']; ?>)"><span class="icon-trash-o"></span> 删除</a><a class="button border-green" href="javascript:void(0)" onclick="return update(<?php echo $value['id']; ?>)"><span class="icon-edit"></span>修改</a>  </div></td>
        </tr>
        </form> 
        <?php endforeach; ?>
      <tr>
      <?php else: endif; ?>
        <td colspan="7"><div class="pagelist"><?php echo $list->render(); ?> </div></td>
      
   
      </tr>
    </table>
  </div>
</form>
<script type="text/javascript">

function del(id){
	if(confirm("您确定要删除吗?")){
		window.location="__ROOT__/book/dele/[id/"+id+"]";
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
            url:"__ROOT__/book/delselect",
            dataType:'text',
            success:function(data){
              if(data>0){
                alert("删除留言成功");
                location.reload(true);
              }else{
                alert("删除留言失败");
              }
            }
  })
}


</script>

</body></html>
<script type="text/javascript">
function ale(co){
  alert("留言内容:"+co);
}

function update(id){
  if(confirm("您确定要修改吗?")){
        //alert(id);
        //alert($("[name="+id+"]").serialize());

      // console.log(JSON.stringify($("[name=<?php echo $value['Id']; ?>]").serialize()));return;
      $.ajax({
            type:"post",
            data:$("[name="+id+"]").serialize(),
            url:"__ROOT__/book/update/[Id/"+id+"]",
            dataType:'text',
            success:function(data){
              if(data>0){
                 alert("修改成功"); 
           
              }
              else{
                alert("修改失败");
              }
            }

      })

    }

  }

</script>

