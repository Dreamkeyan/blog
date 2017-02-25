<?php
namespace app\index\controller;
 use think\Model;
use think\Db;
use think\Session;


use app\index\controller\Base;
class news extends Base
{
	
	function Index ()
	{
       
        $sq=Db::table("article")->where("id",input("id"))->find();
        $qazx=Db::table("article")->where("id",input("id"))->update(["click"=>($sq["click"]+1)]);
        //dump($sq);die;
        $ew=Db::table("type")->where("isdel",0)->select();
        //dump($ew);die;
        //foreach ($sq as $key1 => $value1) {
            foreach ($ew as $value2) {
                if($sq["typeid"]==$value2["id"]){
                    $sq["typetitle"]=$value2["typetitle"];
                }
        
               // $sq["typetitle"]=$value1;
            }
       // dump($sq);die;
         $resd=Db::table("review")
        ->alias('a')
        ->where("a.isdel",0)
        ->join('article w','a.articleid = w.id')
        ->join("user q",'a.userid = q.Id')
        //->join('user z','a.userid = z.Id')
      //->select();
      ->where("articleid",input("id"))
        ->paginate(10);
         $re=getcated($resd,0,"reviewid");
        // $qe=getcated($resd,0,"articleid");
        // echo"<pre>"; 
        //var_dump($re);
   
        $this->assign("review",$re); 
        $this->assign("list",$resd); 
       $this->assign("article1",$sq);
		return $this->fetch('Index');
	}
    function sub(){
        //echo input("content");
        $ws=Session::get('userlogin');
         if($ws["Id"]==""){
            $this->success("评论失败，请登录","login/index");
            die;
        }
        //dump($ws);die;
        $date=[
            "userid"=>$ws["Id"],
            "centent"=>input("content"),
            "articleid"=>input("id"),
            "reviewdate"=>time()
        ];
        $sed=Db::table("review")->insert($date);
        if($sed){
            $this->success("评论成功");
        }else{
            $this->success("评论失败");
        }
    }
  
 function subz(){
              $ws=Session::get('userlogin');
              if($ws["Id"]==""){
            $this->success("评论失败，请登录","login/index");
            die;
        }
        //dump($ws);die;
        $date=[
            "userid"=>$ws["Id"],
            "articleid"=>input("id"),
            "centent"=>input("content"),
            "reviewid"=>input("reviewid"),
            "reviewdate"=>time()
        ];
        $sed=Db::table("review")->insert($date);
        if($sed){
            $this->success("回复评论成功");
        }else{
            $this->success("回复评论失败");
        }
    }
        function dele(){
             $ws=Session::get('userlogin');
         if(!Session::has('userlogin')){
            $this->success("评论失败，请登录","login/index");
            die;
        }
             $sde=Db::table("review")->where("id",input("id"))->find();
             if($sde["userid"]!==$ws["id"]){
                $this->success("无法删除别人的评论");
            die;
             }
            $se=Db::table("review")->field("id")->where("reviewid",input("id"))->find();
            
            dump($se);
            if($se){
                $sed=Db::table("review")->where("id",$se)->where("id",input("id"))->update(["isdel"=>1]);

            }else{
                $sed=Db::table("review")->where("id",input("id"))->update(["isdel"=>1]);
            }
                 if($sed){
                $this->success("删除评论成功");
            }else{
                $this->success("删除评论失败");
            }
        }
	
}


