<?php
namespace admin\Controller;
use Think\Controller;
class HomeController extends Controller {
	public function index(){
	$this->display('Home');
	}
}