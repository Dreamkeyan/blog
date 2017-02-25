<?php
namespace app\index\controller;
 use think\Model;
use think\Db;
use think\Session;
use app\index\controller\Base;
class learn extends Base
{
	
	function Index ()
	{
       $ew=Db::table("type")->where("isdel",0)->select(); 
        $ad=Db::table("type")->field("typetitle")->where("id",input("id"))->find();
        // $as=Db::table("type")->field("id")->where("typeid",input("id"))->select();
        $as=Db::table('type')->where("typeid",input("id"))->column('id');
       // dump($as);die;
        if(!$as){
       $ech=Db::table("article")->where("typeid",input("id"))->paginate(6);
    }else{
        //$asw=array_values($as);
       // $as[]=input("id");

        // $ech=Db::table("article")->where("typeid","in",$as)->paginate(6);

        $ech=Db::table("article")->where("typeid",input("id"))->whereor("typeid","in",$as)->paginate(6);
    }
    
     foreach ($ech as $key1 => $value1) {
            foreach ($ew as $value2) {
                if($value1["typeid"]==$value2["id"]){
                    $value1["typetitle"]=$value2["typetitle"];
                }
        
                $ech[$key1]=$value1;
            }
        }
     //dump ($ad);die;
        $this->assign("article",$ech);
        $this->assign("typetitle",$ad["typetitle"]);
        if(input("matter")==0){

		return $this->fetch('Index');
        }else{
            return $this->fetch('shou');
        }
	}
	
}


