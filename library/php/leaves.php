<?php
/**
 * Created by PhpStorm.
 * User: tuyi
 * Date: 2016/8/4
 * Time: 13:49
 */

header("content-type:text/html;charset=utf-8");

@$link=mysql_connect("localhost","root","tuyi");
mysql_query("set names utf8",$link);
mysql_query("use library");
$leave=$_POST['leave'];

session_start();
$num=isset($_SESSION['username'])?$_SESSION['username']:exit();

$res=mysql_query("select name from information where num1='$num'");

$arr=array();
while($row=mysql_fetch_assoc($res))
{
    $arr[]=$row;
}
$a=$arr[0]['name'];

mysql_query("insert into leaves(name,content)values('$a','$leave')");
echo 1;