<?php
namespace app\index\controller;
 
use app\index\controller\Base;
class xc extends Base
{
	
	function Index ()
	{

		return $this->fetch('Index');
	}
	
}


