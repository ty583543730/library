<?php
/**
 * Created by PhpStorm.
 * User: tuyi
 * Date: 2016/10/22
 * Time: 16:56
 */
header("content-type:text/html;charset=utf-8");
$email="aaaaaa@qq.com";
@$link=mysql_connect("localhost","root","tuyi");
mysql_query("use ty",$link);
mysql_query("set names utf8",$link);
$res=mysql_query("select uid from user where email='$email'");

$arr=array();
while($row=mysql_fetch_assoc($res))
{
    $arr[]=$row;
}

var_dump($arr);