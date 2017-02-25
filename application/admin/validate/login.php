<?php
namespace app\index\validate;
use think\Validate;
class login extends Validate
{
protected $rule = [
'name' => 'require|max:25',
'email' => 'email',
];
$validate = new Validate($rules);
}