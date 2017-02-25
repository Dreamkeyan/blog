<?php
namespace app\admin\controller;
 use think\Model;
use think\Db;
use think\Session;

use think\Controller;
class Login extends Controller
{
	
	function Index ()
	{

		return $this->fetch();
	}
	function login(){
		$captcha=input("code");
            if(!captcha_check($captcha)){
        $this->success("验证码错误");
        };
			$data=[
			
			"username"=>input("name"),
			"password"=>input("password")
			];
           $rust=Db::name('admin')->where('username',input("name"))->where('password',input("password"))->find();

			if($rust&&$rust["isdel"]==0){
                Session::set('login',$rust);
                $this->success("登陆成功",'Admin/index');
            }else{
                $this->error('用户名或者密码错误');
            }
		
	}
        function logout(){
            Session::delete('login');
             $this->success("退出成功",'login/index');

        }	
}