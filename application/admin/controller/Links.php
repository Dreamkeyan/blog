<?php
namespace app\admin\controller;
use think\Model;
use think\Db;
use think\Session;

use think\Controller;
class Links extends Controller
{

    function _initialize(){
        // echo" 12";
        if (!Session::has('login')) {
           $this->success("请登录",'login/index');
        }
    }
    function index(){
       $reke=Db::table("links")->paginate(7);
       $this->assign("list",$reke); 
        return $this->fetch(); 
    }
    function add(){
        return $this->fetch("add");
    }
    function addlink(){
        //dump(input("post."));
        $ruselt=Db::table("links")->insert(input("post."));
        if($ruselt){
            $this->success("添加友情链接成功","links/index");
        }else{
             $this->success("添加友情链接失败");
        }
    }
    function update(){
        $ruselt=Db::table("links")->where("id",input("id"))->find();
        $this->assign("updat",$ruselt); 
        return $this->fetch("update");
    }
    function updates(){
        //echo input("id");
        //dump(input("post."));
        $resc=Db::table("links")->where("id",input("id"))->update(input("post."));
        if($resc){
            $this->success("修改友情链接成功","links/index");
        }else{
             $this->success("修改友情链接失败");
        }
    }
    function dele(){
        $ser=Db::table("links")->where("id",input("id"))->delete();
         if($ser){
            $this->success("删除友情链接成功","links/index");
        }else{
             $this->success("删除友情链接失败");
        }
    }
    function delselect(){
        
       $id=input('post.')["id"];
       //  dump($id);
        $ruselt=Db::table("links")->delete($id);
        echo $ruselt;

    }
}