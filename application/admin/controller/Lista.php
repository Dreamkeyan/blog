<?php
namespace app\admin\controller;
 use think\Model;
use think\Db;
use think\Controller;
use think\Session;
class lista extends Controller
{
	function _initialize(){
        // echo" 12";
        if (!Session::has('login')) {
           $this->success("请登录",'login/index');
        }
    }
	function Index ()
	{	
		$ew=Db::table("type")->where("isdel",0)->select();
		$reluct=Db::table('article')->where('isdel',0)->paginate(7);
		foreach ($reluct as $key1 => $value1) {
			foreach ($ew as $value2) {
				if($value1["typeid"]==$value2["id"]){
					$value1["typetitle"]=$value2["typetitle"];
				}
		
				$reluct[$key1]=$value1;
			}
		}
		// echo"<pre>";
		// var_dump($reluct);die;
		$this->assign("typetitle",$ew);
		$this->assign('list', $reluct);
		$this->assign("article",$reluct);
		return $this->fetch();

	}
		function dele(){
		$rulect=Db::table("article")->where("id",input("id"))->update(["Isdel"=>1]);
		if ($rulect) {
				$this->success("删除文章成功");
			}
			else
			{
				$this->error('删除文章失败');
			}
	}
	public function update(){
		$reluct=Db::table('type')->where('isdel',0)->select();		
		$reluctq=Db::table('article')->where("id",input("id"))->find();
		$relucto=DB::table("type")->where("id",$reluctq["typeid"])->find();
		
				if($relucto){
					$reluctq["typetitle"]=$relucto["typetitle"];
				}
		$this->assign("type",$reluct);
		$this->assign('article',$reluctq);
		return $this->fetch();
		return $this->fetch("update");
	}
	//文件上传
	public function upload(){
				$pic=array();
// 获取表单上传文件
		$files = request()->file('image');
		foreach($files as $file){
		// 移动到框架应用根目录/public/uploads/ 目录下
			$info = $file->rule('uniqid')->validate(['size'=>3072000,'ext'=>'jpg,png,gif,jpeg'])->move("static/index/images/article");
				if($info){
				// 成功上传后 获取上传信息		
				// 输出 42a79759f284b767dfcb2a0197904287.jpg
				
				
				$pic=$info->getFilename();
				

				}else{
				 
					$this->error($file->getError());
				}
				return $pic ;
			}
		
		}
	public function updateqw(){
		$time1=strtotime(input("datetime"));
				
					
				
			
				$pic=$this->upload();
				if($pic==""){
					$pic=input("zspic");
				}
			
				$stat=input("wed1");
				if($stat==""){
					$stat=0;
				}
				$date=["title"=>input("title"),"typeid"=>input("cid"),"author"=>input("authour"),"content"=>input("content"),"time"=>$time1,"pic"=>$pic,"state"=>$stat];
				$se=DB::table("article")->where("id",input("id"))->update($date);
				if ($se) {
						$this->success("修改文章成功","lista/index");
					}
					else
					{
						$this->error('修改文章失败');
					}
		

	}
}
