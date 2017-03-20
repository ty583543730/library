<?php
/**
 * Created by PhpStorm.
 * User: tuyi
 * Date: 2016/8/5
 * Time: 21:12
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
$res=mysql_query("select *from information where team=$team");
while($row=mysql_fetch_assoc($res))
{
    $arr[]=$row;
}

foreach($arr as $key=>$value)
{
    $new[$key]=$value;
    @$new[$key]['id']=urlencode($value['id']);
    @$new[$key]['name']=urlencode($value['name']);
    @$new[$key]['num1']=urlencode($value['num1']);
    @$new[$key]['password']=urlencode($value['password']);
    @$new[$key]['time']=urlencode($value['time']);
    @$new[$key]['code']=urlencode($value['code']);

}
echo urldecode(json_encode($new));