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
                echo "�ƶ��ļ�".$file."ʧ�ܣ�";die;
            }     
        }else{
            echo "����".$folder_name."�ļ�ʧ��";die;
        }

    }
}
echo "�ɹ�";