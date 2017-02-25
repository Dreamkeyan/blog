<?php
namespace app\index\controller;
 use think\Model;
use think\Db;
use think\Session;
use app\index\controller\Base;
class Index extends Base
{
	
	function Index ()
	{
        $ew=Db::table("type")->where("isdel",0)->select();
        $rew=Db::table("article")

        ->where("isdel",0)->where("state",1)->order("click desc,time,review")->paginate(6);
        foreach ($rew as $key1 => $value1) {
            foreach ($ew as $value2) {
                if($value1["typeid"]==$value2["id"]){
                    $value1["typetitle"]=$value2["typetitle"];
                }
        
                $rew[$key1]=$value1;
            }
        }
        $link=Db::table("links")->select();
        $this->assign("links",$link);
        //dump($rew);die;
        $this->assign("articles",$rew);
		return $this->fetch('Index');
	}
	
}


