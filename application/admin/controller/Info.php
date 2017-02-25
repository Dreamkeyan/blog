<?php
namespace app\admin\controller;
 use think\Model;
use think\Db;
use think\Session;

use think\Controller;
class Info extends Controller
{
	
      function _initialize(){
        // echo" 12";
        if (!Session::has('login')) {
           $this->success("请登录",'login/index');
        }
    }
	function Index ()
	{
        $relect=Db::table("website")->where("id","0")->find();
        $this->assign("website",$relect);
		return $this->fetch();
	}
    function update(){
        if(request()->file('fileid')==""){
            $pic= input("pic");
        }else{
        $pic= $this->sde();
    }
            $data=[
                "stitle"=>input("stitle"),
                "slogo"=> $pic,
                "surl"=>input("surl"),
                "sdescription"=>input("sdescription"),
                "s_name"=>input("s_name"),
                "s_phone"=>input("s_phone"),
                "s_fax"=>input("s_fax"),
                "QQ"=>input("s_qq"),
                "email"=>input("s_email"),
                "s_address"=>input("s_address"),
                "scopyright"=>input("scopyright"),
                "s_qqu"=>input("s_qqu")
            ];

        $relect=Db::table("website")->where("id","0")->update($data);
        if ($relect) {
                        $this->success("网站信息更新成功");
                    }
                    else
                    {
                        $this->error('网站信息更新失败');
                    }

    }
    public function sde(){

        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('fileid');
        // 移动到框架应用根目录/public/uploads/ 目录下
        $info = $file->move("static/index/images");
        if($info){
        // 成功上传后 获取上传信息
        // 输出 jpg
        $pic=$info->getSaveName();
        // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
       
        }else{
        // 上传失败获取错误信息
        echo $file->getError();
        }
        return $pic ;
    }
    // //$q=input("fileid1");
    
    // var_dump($q);
    // $file = request()->file('fileid1');
    // echo $file;
    // die;

}