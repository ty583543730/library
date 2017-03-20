<?php
/**
 * Created by PhpStorm.
 * User: tuyi
 * Date: 2016/8/21
 * Time: 17:49
 */


header("content-type:text/html;charset=utf-8");
session_start();
$name=isset($_SESSION['username'])?$_SESSION['username']:exit();



@$link=mysql_connect("localhost","root","tuyi");
mysql_query("set names utf8",$link);
mysql_query("use library");
$text1=isset($_POST['text1'])?$_POST['text1']:0;
$text2=isset($_POST['text2'])?$_POST['text2']:0;

if($text1!==0)
{
    mysql_query("update content set text1='$text1' where id=1");
    echo 1;
    exit();
}
else if($text2!==0)
{
    mysql_query("update content set text2='$text2' where id=1");
    echo 1;
    exit();
}
else
{
    echo 2;
}