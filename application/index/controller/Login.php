<?php
namespace app\index\controller;
 use think\Model;
use think\Db;
use think\Session;
use app\index\controller\Base;
class Login extends Base
{
	
	function Index ()
	{

		return $this->fetch();
	}
	function login(){
       // dump(input("post."));die;
		$captcha=input("code");
            if(!captcha_check($captcha)){
        $this->success("验证码错误");
        };
			$data=[
			
			"username"=>input("username"),
			"password"=>input("password")
			];
           $rust=Db::name('user')->where('username',input("username"))->where('password',input("password"))->find();

			if($rust){
                Session::set('userlogin',$rust);
                $this->success("登陆成功","index/index");
            }else{
                $this->error('用户名或者密码错误');
            }
		
	}
        function logout(){
            Session::delete('userlogin');
             $this->success("退出成功");

        }	
        function res(){
            //dump(input('post.'));
            if(input("checkbox")=="on"){
              // $se= Session::delete(input("checkbox"));
                $dete=input("post.");
               // $se= unset($dete["checkbox"]);
               //dump($dete);
               // die;
               // $ser=Db::table("user")->insert("")
               $swt=Db::table("user")->where("username",input("username"))->whereor("Email",input("Email"));
               if($swt){
                 $this->error('用户名或邮箱已被使用');
             }else{
                $data=[
                  "username" => input("username"),
                  "Email"=> input("Email"),
                  "photho" => input("photho"),
                  "dizhi" => input("dizhi"),
                  "password" =>input("password"),
                  "portrial"=>"s.jpg"
                  ];
                   $ser=Db::table("user")->insert($data);
                   if($ser){
                     Session::set('userlogin',$data);
                $this->success("注册并登录成功","index/index");
            }else{
                $this->error('注册失败');
            }
             }
               
            }
        }
}