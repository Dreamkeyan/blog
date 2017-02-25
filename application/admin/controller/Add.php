<?php
namespace app\admin\controller;
 use think\Model;
use think\Db;
use think\Controller;
use think\Session;
class Add extends Controller
{

	function _initialize(){
        // echo" 12";
        if (!Session::has('login')) {
           $this->success("请登录",'login/index');
        }
    }
	
	function Index ()
	{
		$reluct=Db::table('type')->where('isdel',0)->select();		
		
		$this->assign("type",$reluct);
		return $this->fetch();
	}
	public function upload(){
				
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
		function insertarc(){
			
					$time1=strtotime(input("datetime"));
				
					
				
			
				$pic= $this->upload();

			
				 $stat=input("wed1");
				if($stat ==null){
					$stat=0;
				}


				$we=Db::table("article")->where("isdel","0")->where("title",input("title"))->find();
				if(!$we){

				$date=["title"=>input("title"),"typeid"=>input("cid"),"author"=>input("authour"),"content"=>input("content"),"time"=>$time1,"pic"=>$pic,"state"=>$stat];
				$RE=Db::table("article")->insert($date);

				if ($RE) {
						$this->success("添加文章成功","lista/index");
					}
					else
					{
						$this->error('添加文章失败');
					}
				}else
				{
					$this->error('该文章已在数据库中');
					}

		}
}