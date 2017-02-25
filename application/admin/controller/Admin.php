<?php
namespace app\admin\controller;
 use think\Session;
use think\Controller;
use think\Cache;

class admin extends Controller
{
	function _initialize(){
        // echo" 12";
        if (!Session::has('login')) {
           $this->success("请登录",'login/index');
        }
    }

	function Index ()
	{
        // if(Session::has('login')){

		return $this->fetch("index");
    // }else{
    //     $this->success("请登录",'login/index');
    // }
	}
    function huancun(){
        Cache::clear();
        $res=delDirAndFile(ROOT_PATH."/runtime");

       
      
             $this->success("清除缓存成功");
      
    }
    
	
}


