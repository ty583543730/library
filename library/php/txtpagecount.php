<?php
/**
 * Created by PhpStorm.
 * User: tuyi
 * Date: 2016/8/20
 * Time: 11:01
 */
header("content-type:text/html;charset=utf-8");
//session_start();
//$name=isset($_SESSION['username'])?$_SESSION['username']:exit();
@$link=mysql_connect("localhost","root","tuyi");
mysql_query("use library",$link);
mysql_query("set names utf8",$link);
$num=mysql_query("select count(*)as count from baoming where checked=0");
$arr=array();
while($row=mysql_fetch_assoc($num))
{
    $arr[]=$row;
}

$num=$arr[0]['count'];

$pagecount=ceil($num/15);

echo $pagecount;