<?php
namespace app\index\controller;
  use think\Model;
use think\Db;
use think\Session;
use app\index\controller\Base;

class guestbook extends Base
{
	
    
	function Index ()
	{
         $resd=Db::table("leaver")
        ->alias('a')
        ->where("a.isdel",0)
        ->join('user w','a.userid = w.id')

        ->paginate(10);



$re=getcate($resd,0,"leaverid");

    //dump($re);die;
   
    $this->assign("leaver",$re); 
    $this->assign("list",$resd); 
		return $this->fetch('Index');
	}
    function sub(){
        //echo input("content");
        $ws=Session::get('userlogin');
        if($ws["Id"]==""){
            $this->success("留言失败，请登录","login/index");
            die;
        }
        //dump($ws);die;
        $date=[
            "userid"=>$ws["Id"],
            "centent"=>input("content"),
            "leaverdate"=>time()
        ];
        $sed=Db::table("leaver")->insert($date);
        if($sed){
            $this->success("留言成功");
        }else{
            $this->success("留言失败");
        }
    }
    function subz(){
              $ws=Session::get('userlogin');
              if($ws["Id"]==""){
            $this->success("留言失败，请登录","login/index");
            die;
        }
        //dump($ws);die;
        $date=[
            "userid"=>$ws["Id"],
            "centent"=>input("content"),
            "leaverid"=>input("leaverid"),
            "leaverdate"=>time()
        ];
        $sed=Db::table("leaver")->insert($date);
        if($sed){
            $this->success("回复留言成功");
        }else{
            $this->success("回复留言失败");
        }
    }

    function dele(){
             $ws=Session::get('userlogin');
             //dump($ws);die;
         if(!Session::has('userlogin')){
            $this->success("删除留言失败，请登录","login/index");
            die;
        }
             $sde=Db::table("leaver")->where("id",input("id"))->find();
             if($sde["userid"]!==$ws["Id"]){
                $this->success("无法删除别人的评论");
            die;
             }
            $se=Db::table("leaver")->field("id")->where("leaverid",input("id"))->find();
            
            //dump($se);
            if($se){
                $sed=Db::table("leaver")->where("id",$se)->where("id",input("id"))->update(["isdel"=>1]);

            }else{
                $sed=Db::table("leaver")->where("id",input("id"))->update(["isdel"=>1]);
            }
                 if($sed){
                $this->success("删除留言成功");
            }else{
                $this->success("删除留言失败");
            }
        }
	
}


