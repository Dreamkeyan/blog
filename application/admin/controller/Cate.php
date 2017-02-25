<?php
namespace app\admin\controller;
use think\Model;
use think\Db;
use think\Controller;
use think\Session;
class Cate extends Controller
{


	function _initialize(){
        // echo" 12";
        if (!Session::has('login')) {
           $this->success("请登录",'login/index');
        }
    }
	function Index ()
	{
		$type1 = array();
		$this->assign("type1",$type1);
		
		
		$reluct=Db::table('type')->where('isdel',0)->paginate(4,true,[
'type' => 'bootstrap',
'var_page' => 'page',
]);
		$reluct1=Db::table("type")->where("isdel",0)->select();
			$this->assign("type1",$reluct1);
		$this->assign('list', $reluct);
		$this->assign("type",$reluct);
		return $this->fetch();
	}
	function insert ()
	{
		$insertdate=$_POST;
		if(($insertdate['typetitle'])!="")
		{
			
				if($insertdate['typeid']!="-1")
				{
					$relult=Db::table('type')->where("id", $insertdate['typeid'])->find();
					$level=$relult['level']+1;
				}
				else
				{
					$level=0;
					$insertdate['typeid']=0;
				}
				
			
				$typetits=explode("\n", trim($_POST['tits']));
				$typetits[]=$insertdate['typetitle'];
				$dbtypetitle=Db::table("type")->where("isdel",0)->where("typeid","EQ",$insertdate['typeid'])->column("typetitle");
				$arr=array_intersect($typetits, $dbtypetitle);
				
				if(!count($arr))
				{
				$date=array();
				foreach ($typetits as $key=> $value) {
					// for($i=0;$i<count($typetits);$i++)
						// {
							$date[$key]=[
						'typetitle'=>$value,
						'level'=>$level,
						'typeid'=>$insertdate['typeid'],
						'colum'=>input("colum"),
						'matter'=>input("matter")

						];
					// }
				}

			
			
			

			$relq=Db::name('type')->insertAll($date);
			if ($relq) {
				$this->success("添加分类成功");
			}
			else
			{
				$this->error('添加分类失败');
			}
		}
		else{
			$arr1=implode(",", $arr);
			
			$this->error("该分类下存在与{$arr1}相同的子分类,请重新输入");
		}
		}
		else
		{
			$this->error('添加分类失败');
		}
	}
	public function ajx(){
		// $type1=Db::table(type)->where("isdel",0)->where("level",0)->select();
		// $type2=Db::table(type)->where("isdel",0)->where("level",1)->select();
		// $type3=Db::table(type)->where("isdel",0)->where("level",2)->select();
		// $this->assign("type1",$type1);
		// $this->assign("type2",$type2);
		// $this->assign("type3",$type3);
		header("content-type:text/json;charset=utf-8");
		$obj = file_get_contents('php://input');
		$arr = json_decode($obj,true);
		$type=Db::table('type')->field("id,typetitle")->where("isdel",0)->where("level",$arr['level'])->select();
		 //var_dump($type);die;
		echo json_encode($type);
		// echo "<pre>";
		// var_dump($type);
	}
	function ajax(){
		header("content-type:text/json;charset=utf-8");
		//$obj = file_get_contents('php://input');
		$obj=input("idtitle");
		//$array = json_decode($obj,true);
		//echo $array["idtitle"];
		//var_dump($array);
		echo $obj;
	}
	function dele(){
		$rulect=Db::table("type")->where("id",input("id"))->update(["isdel"=>1]);
		if ($rulect) {
				$this->success("删除分类成功");
			}
			else
			{
				$this->error('删除分类失败');
			}
	}
function cateedit(){

		$reluct=Db::table('type')->where('isdel',0)->select();		
		$this->assign('list', $reluct);
		$this->assign("type",$reluct);
		$relucto=DB::table("type")->where("id",input("typeid"))->find();
		$sde=Db::table("type")->field("typetitle")->where("id",$relucto["typeid"])->find();
				if($sde){
					$relucto["typefjtitle"]=$sde["typetitle"];
				}else{
					$relucto["typefjtitle"]="顶级菜单";

				}
			
		
		//var_dump($relucto);
		$this->assign("xiug",$relucto);
	return $this->fetch("cateedit");
}
function cateeditupda(){
	//$er=Db::table("type")->where("id",">",input("sort"))->setInc("id");
	$ere=Db::table("type")->where("id",input("id"))->update(["typetitle"=>input("title"),"level"=>(input("s_istop")+1),"typeid"=>input("cid"),"colum"=>input("colum"),'matter'=>input("matter")]);
	if ($ere) {
				$this->success("修改分类成功","Cate/index");
			}
			else
			{
				$this->error('修改分类失败');
			}

}
	
}
