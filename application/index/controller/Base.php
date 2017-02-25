<?php
namespace app\index\controller;
use think\Model;
use think\Db;
use think\Session;

use think\Controller;
class base extends Controller
{
    
   public function _initialize(){
        $rece=Db::table("article")->where("isdel",0)->order("time desc")->limit(5)->select();//最新5条
         $rese=Db::table("article")->where("isdel",0)->where("state",1)->order("time desc")->limit(5)->select();//推荐的最新五条
          $reee=Db::table("article")->where("isdel",0)->order("click desc,time,review")->limit(5)->select();

        $sed=Db::table("website")->find();
        $headertype=Db::table("type")->where("colum",0)->select();
        //var_dump($headertype);die;
         $this->assign("headertype",$headertype);
        $this->assign("rece",$rece); 
        $this->assign("rese",$rese); 
        $this->assign("reee",$reee); 
        $this->assign("website",$sed); 
         // echo" 12";
        if (!Session::has('userlogin')) {
            $se=0;
          $this->assign("denglu",$se);   
      }else{
         $se=1;
         $sd=Session::get('userlogin');
         $this->assign("userlogin",$sd); 
        $this->assign("denglu",$se);   
      }
    }
    
}