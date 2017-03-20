<?php
/**
 * Created by PhpStorm.
 * User: tuyi
 * Date: 2016/8/3
 * Time: 10:14
 */


header("content-type:text/html;charset=utf-8");

$name=$_POST['name'];
$password=$_POST['password'];
//$name='201413137119';
//$password='wananle0';

@$link=mysql_connect("localhost","root","tuyi");
mysql_query("use library");
mysql_query("set names utf8",$link);

//$res1=mysql_query("select *from users");
//$arr=array();
//while($row=mysql_fetch_assoc($res1))
//{
//    $arr[]=$row;
//}
//
//print_r($arr);
//exit();
$res=mysql_query("select *from users where name='$name'");

if(mysql_num_rows($res)<1)
{
    echo 10;
    exit();
}

$res1=mysql_query("select *from users where name=$name and password='$password'");
if(mysql_num_rows($res1)==1)
{
    echo 1;
    session_start();
    $_SESSION['expiretime'] = time() + 1800;
    $_SESSION['username']=$name;
    $_SESSION['time']=0;
    exit();
}
else echo 0;