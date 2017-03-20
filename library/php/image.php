<?php
/**
 * Created by PhpStorm.
 * User: tuyi
 * Date: 2016/8/22
 * Time: 10:44
 */


header("content-type:text/html;charset=utf-8");
@$link=mysql_connect("localhost","root","tuyi");
mysql_query("use library",$link);
mysql_query("set names utf8",$link);
$res=mysql_query("select *from image");

$arr=array();
while($row=mysql_fetch_assoc($res))
{
    $arr[]=$row;
}

foreach($arr as $key=>$value)
{
    $new[$key]=$value;
    $new[$key]['id']=urlencode($value['id']);
    $new[$key]['content']=urlencode($value['content']);
    $new[$key]['img']=urlencode($value['img']);
}

echo urldecode(json_encode($new));