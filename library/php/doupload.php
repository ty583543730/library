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

if($_FILES!=null&&$content!=null)
{

$dir="../img/";
foreach($_FILES as $k=>$v)
{
    $name=$v['name'];
    $destination=$dir . $name;
    $tmp_name=$v['tmp_name'];
}
    $destination=iconv("utf-8","gb2312",$destination);
move_uploaded_file($tmp_name,$destination);
    $destination=iconv("gb2312","utf-8",$destination);
header("content-type:text/html;charset=utf-8");
session_start();
$name=isset($_SESSION['username'])?$_SESSION['username']:exit();
@mysql_connect("localhost","root","tuyi");
mysql_query("set names utf8");
mysql_query("use library");
    mysql_query("set names utf8");

mysql_query("insert into image(content,img)values('$content','$destination');");
    header("Location:../html/mytx.html");

}