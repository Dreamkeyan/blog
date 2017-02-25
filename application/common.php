<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
function splitfile($name){
	$pic=array();
	$er=explode(".jpg",$name);
	$er=array_pop($er);
	foreach( $er as $value){
		if(strpos($value,".gif")){
			$e=explode(".gif", $value.".jpg");
		}else if(strpos($value,".jpeg")){
			$eg=explode(".jpeg", $value.".jpg");
		}else if(strpos($value,".png")){
			$ej=explode(".png", $value.".jpg");
		}else{
			$pic[]=$value.".jpg";
		}
	}
	foreach ($ej as $value){
		if(strrpos($value,".jpg")){
			$pic[]=$value;
		}else{
			$pic[]=$value.".png";
		}
	}
	foreach ($eg as $key => $value) {
	 	if(strpos($value,".png")){
	 		$xj=explode(".png", $value.".jpeg");
	 	}else{
	 		if(strrpos($value,".jpg")){
			$pic[]=$value.".jpg";
		}else{
			$pic[]=$value.".jpeg";
		}
	 	}
	 }
	 foreach ($e as $key => $value) {
	 	if(strpos($value,".jpeg")){
	 		$xgj=explode(".jpeg", $value.".gif");

	 	}else if(strpos($value,".png")) {
	 		$ejj=explode(".png", $value.".gif");
	 	}else{
	 		$pic[]=$value.".gif";
	 	}
	 }
	 foreach ($xj as $key => $value) {
	 	if(strrpos($value,".jpg")){
			$pic[]=$value;
		}else{
			$pic[]=$value.".png";
		}
	 }
	 foreach ($xgj as $key => $value) {
	 	if(strpos($value,".png")){
	 		$xjj=explode(".png", $value.".jpeg");
	 	}else{
	 		if(strrpos($value,".jpg")){
			$pic[]=$value.".jpg";
		}else{
			$pic[]=$value.".jpeg";
		}
	 	}
	 	foreach ($ejj as $key => $value) {
	 		if(strrpos($value,".jpg")){
			$pic[]=$value;
		}else{
			$pic[]=$value.".png";
		}
	 	}
	 	foreach ($xjj as $key => $value) {
	 		if(strrpos($value,".jpg")){
			$pic[]=$value;
		}else{
			$pic[]=$value.".png";
	 	}
	 		
	 	}
	 }

	 return $pic;
}
//
//$se 数据库上一级分类id字段名称
//$pid=0 ,顶级分类的字段名称值
//
function getcate($arr,$pid=0,$se){
    static $array = array();
    //通过遍历查找是否属于顶级父类，pid=0为顶级父类
    foreach($arr as $v){
        //进行判断如果pid=0，那么为顶级父类，放入定义的空数组里
        if($v[$se]==$pid){
            $array[] = $v;
            //递归点，调用自身，把顶级父类的主键id作为父类进行再调用循环，空格+1
            getcate($arr,$v['id'],$se);
        }
    }
    return $array;    //递归出口
}

function delDirAndFile($path, $delDir = FALSE) {
    $handle = opendir($path);
    if ($handle) {
        while (false !== ( $item = readdir($handle) )) {
            if ($item != "." && $item != "..")
                is_dir("$path/$item") ? delDirAndFile("$path/$item", $delDir) : unlink("$path/$item");
        }
        closedir($handle);
        if ($delDir)
            return rmdir($path);
    }else {
        if (file_exists($path)) {
            return unlink($path);
        } else {
            return FALSE;
        }
    }
}

function getcated($arr,$pid=0,$se){
    static $array = array();
    //通过遍历查找是否属于顶级父类，pid=0为顶级父类
    foreach($arr as $v){
        //进行判断如果pid=0，那么为顶级父类，放入定义的空数组里
        if($v[$se]==$pid){
            $array[] = $v;
            //递归点，调用自身，把顶级父类的主键id作为父类进行再调用循环，空格+1
            getcated($arr,$v['ID'],$se);
        }
    }
    return $array;    //递归出口
}
