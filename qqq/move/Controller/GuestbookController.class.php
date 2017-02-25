<?php
namespace admin\Controller;
use Think\Controller;
class GuestbookController extends Controller {
	public function index(){
	$this->display('Guestbook');
	}
}