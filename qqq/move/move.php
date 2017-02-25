<?php
header("content-type;text/html;charset=utf-8");
$path = "./view/";
$dir_handle = opendir($path);
while ($file = readdir($dir_handle)) {
    $file=preg_replace("/^[a-zd]*$/i",'', $file);
    $file1 = $path.$file;
    if(is_file($file1)){
        $folder_name = substr($file, 0,strpos($file, '.'));
        if(mkdir($path.$folder_name)){
            // die;
            if(!rename($file1, $path.$folder_name.'/'.$file)){
                echo "移动文件".$file."失败！";die;
            }     
        }else{
            echo "创建".$folder_name."文件失败";die;
        }

    }
}
echo "成功";