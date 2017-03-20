<?php
/**
 * Created by PhpStorm.
 * User: tuyi
 * Date: 2016/8/21
 * Time: 9:46
 */


header("content-type:text/html;charset=utf-8");
session_start();
$name=isset($_SESSION['username'])?$_SESSION['username']:exit();
@mysql_connect("localhost","root","tuyi");
mysql_query("set names utf8");
mysql_query("use library");

$leavenum=$_POST['leavenum'];
//$leavenum=7;
mysql_query("delete from leaves where id=$leavenum");
mysql_query("alter table leaves drop id");
mysql_query("alter table leaves add id int not null first");
mysql_query("alter table leaves modify id int not null auto_increment,add primary key(id)");

echo 1;