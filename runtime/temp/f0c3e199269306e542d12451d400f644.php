<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:61:"E:\WWW\blog\public/../application/admin\view\lista\index.html";i:1483684656;}*/ ?>
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
<form method="post" action="" id="listform">
  <div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 内容列表</strong> <a href="" style="float:right; display:none;">添加字段</a></div>
    <div class="padding border-bottom">
      <ul class="search" style="padding-left:10px;">
        <li> <a class="button border-main icon-plus-square-o" href="__ROOT__/add.html"> 添加内容</a> </li>
        <li>搜索：</li>
        <li>
          标签
          <select name="s_isvouch" class="input" onchange="changesearch()"  style="width:60px; line-height:17px;display:inline-block">
            <option value="0">选择</option>
            <option value="1">推荐</option>
            <option value="2">置顶</option>
          </select>
         
        </li>
        <if condition="$iscid eq 1">
          <li>
           <select name="s_istop" id="s_istop" class="input" style="width:160px; line-height:17px;display:inline-block">
            
            <option value="0">一级分类</option>
            <option value="1">二级分类</option>
             <option value="2">三级分类</option>            
          </select>
        </li>
        <if condition="$iscid eq 1">
        <li>分类名称</li>
          <li id='level'>
            <select name="cid"  class="input" style="width:200px; line-height:17px;"  id="ciwed">
      
              <?php foreach($typetitle as $vale): ?>
              <option value="<?php echo $vale['typeid']; ?>"><?php echo $vale['typetitle']; ?></option>
               <?php endforeach; ?>      
             
             
            </select>
          </li>
        </if>
        <li>
          <input type="text" placeholder="请输入搜索关键字" name="keywords" class="input" style="width:250px; line-height:17px;display:inline-block" />
          <a href="javascript:void(0)" class="button border-main icon-search" onclick="changesearch()" > 搜索</a></li>
      </ul>
    </div>
    <table class="table table-hover text-center">
      <tr>
        <th width="100" style="text-align:left; padding-left:20px;">ID</th>
     
        <th>图片</th>
        <th>名称</th>
        <th>属性</th>
        <th>分类名称</th>
        <th width="10%">更新时间</th>
        <th width="310">操作</th>
      </tr>
      <?php if($article != ""): foreach($article as $value): ?>
        <tr>
          <td style="text-align:left; padding-left:20px;"><input type="checkbox" name="id[]" value="" />
           <?php echo $value['id']; ?></td>
          
          <td width="10%"><img src="__PUBLIC__/../index/images/article/<?php echo $value['pic']; ?>" alt="" width="70" height="50" /></td>
          <td><input type="button" onclick="ale('<?php echo $value['title']; ?>')"  value="<?php echo mb_substr($value['title'],0,7,'utf-8'); ?>" style="border: 0;text-align: center;background-color: #fff" ></td>
          <td><font color="#00CC99">
	<?php if($value['state'] == 2): ?> 置顶
	<?php elseif($value['state'] == 1): ?> 推荐
	<?php else: ?> 不推荐不置顶
	<?php endif; ?>

          </font></td>
          <td><?php echo $value['typetitle']; ?></td>
          <td><?php echo date("y-m-d",$value['time']); ?></td>
          <td><div class="button-group"> <a class="button border-main" href="__ROOT__/lista/update/[id/<?php echo $value['id']; ?>].html"><span class="icon-edit"></span> 修改</a> <a class="button border-red" href="javascript:void(0)" onclick="return del(<?php echo $value['id']; ?>)"><span class="icon-trash-o"></span> 删除</a> </div></td>
        </tr>
   		 <?php endforeach; else: endif; ?>
      <tr>
        <td style="text-align:left; padding:19px 0;padding-left:20px;"><input type="checkbox" id="checkall"/>
          全选 </td>
        <td colspan="7" style="text-align:left;padding-left:20px;"><a href="javascript:void(0)" class="button border-red icon-trash-o" style="padding:5px 15px;" onclick="DelSelect()"> 删除</a> <a href="javascript:void(0)" style="padding:5px 15px; margin:0 10px;" class="button border-blue icon-edit" onclick="sorts()"> 排序</a> 操作：
          
          <select name="isvouch" style="padding:5px 15px; border:1px solid #ddd;" onchange="changeisvouch(this)">
            <option value="">推荐</option>
            <option value="1">是</option>
            <option value="0">否</option>
          </select>
          <select name="istop" style="padding:5px 15px; border:1px solid #ddd;" onchange="changeistop(this)">
            <option value="">置顶</option>
            <option value="1">是</option>
            <option value="0">否</option>
          </select>
          &nbsp;&nbsp;&nbsp;
          
          移动到：
          <select name="movecid" style="padding:5px 15px; border:1px solid #ddd;" onchange="changecate(this)">
            <?php foreach($typetitle as $vale): ?>
              <option value="<?php echo $vale['typeid']; ?>"><?php echo $vale['typetitle']; ?></option>
               <?php endforeach; ?> 
          </select>
          <select name="copynum" style="padding:5px 15px; border:1px solid #ddd;" onchange="changecopy(this)">
            <option value="">请选择复制</option>
            <option value="5">复制5条</option>
            <option value="10">复制10条</option>
            <option value="15">复制15条</option>
            <option value="20">复制20条</option>
          </select></td>
      </tr>
      <tr>
        <td colspan="7"><div class="pagelist"><?php echo $list->render(); ?></td>
      </tr>
    </table>
  </div>
</form>
<script type="text/javascript">

//搜索
function changesearch(){	
		
}

//单个删除
function del($id){
	if(confirm("您确定要删除吗?")){
		window.location="__ROOT__/lista/dele/[id/"+$id+"]";
	}
}

//全选
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

//批量删除
function DelSelect(){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){
		var t=confirm("您确认要删除选中的内容吗？");
		if (t==false) return false;		
		$("#listform").submit();		
	}
	else{
		alert("请选择您要删除的内容!");
		return false;
	}
}

//批量排序
function sorts(){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){	
		
		$("#listform").submit();		
	}
	else{
		alert("请选择要操作的内容!");
		return false;
	}
}


//批量首页显示
function changeishome(o){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){
		
		$("#listform").submit();	
	}
	else{
		alert("请选择要操作的内容!");		
	
		return false;
	}
}

//批量推荐
function changeisvouch(o){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){
		
		
		$("#listform").submit();	
	}
	else{
		alert("请选择要操作的内容!");	
		
		return false;
	}
}

//批量置顶
function changeistop(o){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){		
		
		$("#listform").submit();	
	}
	else{
		alert("请选择要操作的内容!");		
	
		return false;
	}
}


//批量移动
function changecate(o){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){		
		
		$("#listform").submit();		
	}
	else{
		alert("请选择要操作的内容!");
		
		return false;
	}
}

//批量复制
function changecopy(o){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){	
		var i = 0;
	    $("input[name='id[]']").each(function(){
	  		if (this.checked==true) {
				i++;
			}		
	    });
		if(i>1){ 
	    	alert("只能选择一条信息!");
			$(o).find("option:first").prop("selected","selected");
		}else{
		
			$("#listform").submit();		
		}	
	}
	else{
		alert("请选择要复制的内容!");
		$(o).find("option:first").prop("selected","selected");
		return false;
	}
}

</script>
</body>
</html>
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
})

function ale(co){
  alert("内容:"+co);
}
</script>