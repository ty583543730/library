<?php
/**
 * Created by PhpStorm.
 * User: tuyi
 * Date: 2016/8/22
 * Time: 13:06
 */

header("content-type:text/html;charset=utf-8");
//session_start();
//$name=isset($_SESSION['username'])?$_SESSION['username']:exit();
@mysql_connect("localhost","root","tuyi");
mysql_query("set names utf8");
mysql_query("use library");

$deletenum=$_POST['deletenum'];
//$leavenum=7;
mysql_query("delete from image where id=$deletenum");
mysql_query("alter table image drop id");
mysql_query("alter table image add id int not null first");
mysql_query("alter table image modify id int not null auto_increment,add primary key(id)");

echo 1;
