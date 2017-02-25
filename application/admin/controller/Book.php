<?php
namespace app\admin\controller;
use think\Model;
use think\Db;
use think\Session;

use think\Controller;
class Book extends Controller
{
	
    function _initialize(){
        // echo" 12";
        if (!Session::has('login')) {
           $this->success("请登录",'login/index');
        }

    }
	function Index ()
	{
        $resd=Db::table("leaver")
        ->alias('a')
        ->join('user w','a.userid = w.id')

        ->paginate(10);



$re=getcate($resd,0,"leaverid");

    
   
    $this->assign("leaver",$re); 
    $this->assign("list",$resd); 
		return $this->fetch();
	}

    function dele(){
        // echo input("id");die;
        $relae=Db::table("leaver")->where("id",input("id"))->delete();
        if($relae){
            $this->success("删除留言成功");     
        }
     else
     {
        $this->error("删除留言失败！");
        }
	}


 function delselect () 
    {

       $id=input('post.')["id"];
       //  dump($id);
        $ruselt=Db::table("leaver")->delete($id);
        echo $ruselt;

    }
     function update(){
        //var_dump(input('post.'));
        //echo input("Id");
        // echo  input("isdel");
        $rels=Db::table("leaver")->where("id",input("Id"))->update(["isdel"=>input("isdel")]);
        echo $rels;
     }
}