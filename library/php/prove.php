<?php
/**
 * Created by PhpStorm.
 * User: tuyi
 * Date: 2016/8/4
 * Time: 16:46
 */


header("content-type:text/html;charset=utf-8");
@$link=mysql_connect("localhost","root","tuyi");
mysql_query("use library",$link);
mysql_query("set names utf8",$link);

$num=mysql_query("select count(*)as count from leaves");

$arr=array();
while($row=mysql_fetch_assoc($num))
{
    $arr[]=$row;
}

$num=$arr[0]['count'];

$pagesize=5;

$pagecount=ceil($num/$pagesize);
echo $pagecount;
