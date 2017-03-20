<?php
/**
 * Created by PhpStorm.
 * User: tuyi
 * Date: 2016/8/20
 * Time: 10:37
 */
header("content-type:text/html;charset=utf-8");
session_start();
$name=isset($_SESSION['username'])?$_SESSION['username']:exit();
@$link=mysql_connect("localhost","root","tuyi");
mysql_query("use library",$link);
mysql_query("set names utf8",$link);

$res=mysql_query("select invitecode from users where isinvite=0");

$num=mysql_num_rows($res);



$pagecount=ceil($num/60);
echo $pagecount;