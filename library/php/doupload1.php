<?php
/**
 * Created by PhpStorm.
 * User: tuyi
 * Date: 2016/8/22
 * Time: 13:55
 */

header("content-type:text/html;charset=utf-8");
echo "<pre>";

$content=$_POST['textarea2'];

    $dir="../img/";
    foreach($_FILES as $k=>$v)
    {
        $name=$v['name'];
        $destination=$dir . $name;
        $tmp_name=$v['tmp_name'];
    }
    $destination=iconv("utf-8","gb2312",$destination);
    move_uploaded_file($tmp_name,$destination);

echo 1;