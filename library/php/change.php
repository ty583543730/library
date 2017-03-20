<?php
/**
 * Created by PhpStorm.
 * User: tuyi
 * Date: 2016/8/5
 * Time: 23:11
 */


header("content-type:text/html;charset=utf-8");


session_start();


$a=isset($_SESSION['username'])?$_SESSION['username']:exit();
@$link=mysql_connect("localhost","root","tuyi");
mysql_query("use library",$link);
mysql_query("set names utf8",$link);
$num1=$_POST['num1'];
$vip=$_POST['vip'];
//$num1="201413132222";
//$vip=2;


$res01=mysql_query("select *from information where num1='$a'");
$information01=mysql_fetch_assoc($res01);

if(mysql_num_rows($res01)!=1)
{
    echo 2;
    exit();
}


if($vip==0)
{
    exit();
}
$res=mysql_query("select *from information where num1='$num1'");
$information=mysql_fetch_assoc($res);
if(mysql_num_rows($res)!=1)
{
   echo 2;
    exit();
}

if($information['num1']==$a||$information01['team']==$information['team'])
{

    if($_POST['name']!=null)
    {
        $name=$_POST['name'];
        mysql_query("update information set name='$name' where num1='$num1'");
    }
    if($_POST['num2']!=null)
    {
        $num2=$_POST['num2'];
        mysql_query("update information set num2='$num2' where num1='$num1'");
    }
    if($_POST['team']!=null)
    {
        $team=$_POST['team'];
        mysql_query("update information set team='$team' where num1='$num1'");
    }
    if($_POST['time']!=null)
    {
        $time=$_POST['time'];
        mysql_query("update information set time='$time' where num1='$num1'");
    }
    echo 1;
exit();

}

$res1=mysql_query("select invitecode from users where name='$num1'");

$invitecode=mysql_fetch_assoc($res1);
$code=$invitecode['invitecode'];
if($code[0]=='a'||$code[0]=='b'&&$vip!=1)
{
    echo 10;
    exit();
}

if($_POST['num1']!=null)
    $num1=$_POST['num1'];
if($_POST['name']!=null)
{
    $name=$_POST['name'];
    mysql_query("update information set name='$name' where num1='$num1'");
}
if($_POST['num2']!=null)
{
    $num2=$_POST['num2'];
    mysql_query("update information set num2='$num2' where num1='$num1'");
}
if($_POST['team']!=null)
{
    $team=$_POST['team'];
    mysql_query("update information set team='$team' where num1='$num1'");
}
if($_POST['time']!=null)
{
    $time=$_POST['time'];
    mysql_query("update information set time='$time' where num1='$num1'");
}

echo 1;