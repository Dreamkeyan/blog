<?php
namespace app\admin\controller;
 use think\Model;
use think\Db;
use think\Session;

use think\Controller;
class Pass extends Controller
{
	function _initialize(){
        // echo" 12";
        if (!Session::has('login')) {
           $this->success("请登录",'login/index');
        }
    }
	function Index ()
	{
       $name= Session::get('login')["username"];
       $this->assign("username",$name);
		return $this->fetch();
	}
    function update(){
        if(input("newpass")==input("renewpass")){
            $rust=Db::name('admin')->where('username',Session::get('login')["username"])->where('password',input("mpass"))->find();
           // var_dump($rust);die;
            if($rust){
               
                 $date=[
                "password"=>input("newpass")
                ];
                $use=Db::name("admin")->where("Id",$rust["Id"])->update($date);
                if($use){
                    $this->success("密码更改成功");
                   // $this->redirect("__ROOT__/login/logout",302);
                }else{
                     $this->error('密码更改失败');
                }
            }else{
                $this->success("密码错误");
            }
        }else{
             $this->error('两次密码不一致');
        }
        
    }
	
}