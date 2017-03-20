<?php
/**
 * Created by PhpStorm.
 * User: tuyi
 * Date: 2016/8/3
 * Time: 15:52
 */

header("content-type:text/html;charset=utf-8");
session_start();

$name=isset($_SESSION['username'])?$_SESSION['username']:exit();

@$link=mysql_connect("localhost","root","tuyi");
mysql_query("use library",$link);
mysql_query("set names utf8",$link);



$res=mysql_query("select *from information where num1=$name");

//$res1=mysql_query("select password from users where name=$name");
//$arr1=array();
//while($row=mysql_fetch_assoc($res1))
//{
//    $arr1[]=$row;
//}
//
//$a=$arr1[0]['password'];
//echo $a;
//mysql_query("update information set password='$a'");
//exit();
$arr=array();
while($row=mysql_fetch_assoc($res))
{
    $arr[]=$row;
}

foreach($arr as $key=>$value)
{
    $new[$key]=$value;
    $new[$key]['id']=urlencode($value['id']);
    $new[$key]['name']=urlencode($value['name']);
    $new[$key]['num1']=urlencode($value['num1']);
    $new[$key]['password']=urlencode($value['password']);
    $new[$key]['num2']=urlencode($value['num2']);
    $new[$key]['time']=urlencode($value['time']);
    $new[$key]['code']=urlencode($value['code']);

}

echo urldecode(json_encode($new));