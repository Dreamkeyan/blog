<?php
namespace app\admin\controller;
use think\Model;
use think\Db;

use think\Session;

use think\Controller;
class Adv extends Controller
{

    function _initialize(){
        // echo" 12";
        if (!Session::has('login')) {
           $this->success("请登录",'login/index');
        }
    }
	
	function Index ()
    {
        // $resd=Db::table("review")
        // ->alias('a')
        // ->join('user z','a.userid = z.id')

        // ->paginate(10);



        // $re=getcate($resd,0,"reviewid");
        $resd=Db::table("review")
        ->alias('a')
        
        ->join('article w','a.articleid = w.id')
        ->join("user q",'a.userid = q.Id')
        //->join('user z','a.userid = z.Id')
      //->select();
        ->paginate(10);
         $re=getcated($resd,0,"reviewid");
        // $qe=getcate($resd,0,"articleid");
        //  echo"<pre>"; 
         
   
        $this->assign("review",$re); 
        $this->assign("list",$resd); 
        return $this->fetch();
    }
     function dele(){
        // echo input("id");die;
        $relae=Db::table("review")->where("ID",input("id"))->delete();
        if($relae){
            $this->success("删除评论成功");     
        }
     else
     {
        $this->error("删除评论失败！");
        }
    }


 function delselect () 
    {
       $id=input('post.')["id"];
       // dump($id);
        $ruselt=Db::table("review")->delete($id);
        echo $ruselt;

    }
     function update(){
        //var_dump(input('post.'));
        //echo input("Id");
        // echo  input("isdel");
        $rels=Db::table("review")->where("id",input("Id"))->update(["isdel"=>input("isdel")]);
        echo $rels;
     }
}