<?php
header("content-type;text/html;charset=utf-8");

$path = "./view/";
$path_cor = "./Controller/";
$dir_handle = opendir($path);
while ($file = readdir($dir_handle)) {
    $file1 = $path.$file;
    if(is_dir($file1)){
        if($file!='.'&&$file!='..'){
            // echo $file;die;
            // $folder_name = substr($file, 0,strpos($file, '.'));
            $file = ucfirst(strtolower($file));
            $Controller = $path_cor.$file.'Controller.class.php';
            // touch("./aa.html");
            // echo "\n\n";
            
            // echo $file;die;
            if(touch($Controller)){
                $so = fopen($Controller,'w'); 
                $str = "<?php\nnamespace admin\Controller;\nuse Think\Controller;\nclass ".$file."Controller extends Controller {\n\tpublic function index(){\n\t$"."this->display('".$file."');\n\t}\n}";  
                fwrite($so, $str);  
            }else{
                echo "创建".$folder_name."文件失败";die;
            }
        }
    }
}
echo "成功";
