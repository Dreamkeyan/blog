<?php
namespace app\admin\controller;
 use think\Model;
use think\Db;
use think\Session;

use think\Controller;
class Page extends Controller
{

    function _initialize(){
        // echo" 12";
        if (!Session::has('login')) {
           $this->success("请登录",'login/index');
        }
         $nameid= Session::get('login')["adminjurld"];
        if($nameid==1){
            $this->error("没有会员管理权限，请联系更高级管理员");
        }
    }
	
	function Index ()
	{
       
        
       

        //$ruse=Db::name("admin")->select();
       
       // $nameidd=$ruse[$qw]["Id"];

        $resq=Db::name("admin")->paginate(7);
        // $this->assign("coun",$nameidd);
         $this->assign("list",$resq);
		return $this->fetch();
	}
    function update(){
        // dump(input('post.'));
        // header("content-type:text/json;charset=utf-8");
        // $json =  file_get_contents("php://input");
        // dump(array('dsd','dsd'));die;
        // $arr = json_decode($json,true)->toArray();
        // dump($arr);die;
       $nameid= Session::get('login')["Id"];
       if ($nameid==input("post.Id")) {
            
            echo"-1";
        }else{

        
        
        $upda=Db::table("admin")->update(input('post.'));
        echo $upda;

    }
    }
	function dele(){
        $nameid= Session::get('login')["Id"];
        if(input("id")==1){
            $this->error("最高权限者无法删除");
        
        }else if($nameid==input("id")){
            $this->error("无法删除自己的账号，请联系更高级管理员");
        }

        else{


        $rulect=Db::table("admin")->where("id",input("id"))->delete();
        if ($rulect){
                $this->success("删除管理员成功");
            }
            else
            {
                $this->error('删除管理员失败');
            }
    }

}
 function delselect () 
    {
        $nameid= Session::get('login')["Id"];
       // dump(input('post.'));
        $id=input('post.')["id"];
        foreach ($id as $key=>$value){
           if($value==$nameid){
            unset($id[$key]);
           }
        }
       // dump($id);
        $ruselt=Db::table("admin")->delete($id);
        echo $ruselt;

    }
    function indese(){
        //dump(input("post."));
        $qwe=Db::table("admin")->insert(input("post."));
        echo $qwe;
    }
}