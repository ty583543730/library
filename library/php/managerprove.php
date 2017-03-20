<?php
/**
 * Created by PhpStorm.
 * User: tuyi
 * Date: 2016/8/5
 * Time: 21:17
 */


session_start();
$name=isset($_SESSION['username'])?$_SESSION['username']:exit();

@$link=mysql_connect("localhost","root","tuyi");
mysql_query("use library",$link);
mysql_query("set names utf8",$link);

$res=mysql_query("select invitecode from users where name=$name");

$arr=array();
while($row=mysql_fetch_assoc($res))
{
    $arr[]=$row;
}

if($arr[0]['invitecode'][0]=='a')
{
    echo 1;
}
else if($arr[0]['invitecode'][0]=='b')
{
    echo 2;
}
else echo 0;