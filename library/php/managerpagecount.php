<?php
/**
 * Created by PhpStorm.
 * User: tuyi
 * Date: 2016/8/5
 * Time: 22:12
 */
header("content-type:text/html;charset=utf-8");
session_start();


$name=isset($_SESSION['username'])?$_SESSION['username']:exit();
@$link=mysql_connect("localhost","root","tuyi");
mysql_query("use library",$link);
mysql_query("set names utf8",$link);
$res=mysql_query("select team from information where num1=$name");
$arr=array();
while($row=mysql_fetch_assoc($res))
{
    $arr[]=$row;
}


$team=$arr[0]['team'];
$num=mysql_query("select count(*)as count from information where team=$team");

$arr=array();
while($row=mysql_fetch_assoc($num))
{
    $arr[]=$row;
}

$num=$arr[0]['count'];

$pagesize=15;

$pagecount=ceil($num/$pagesize);
echo $pagecount;
