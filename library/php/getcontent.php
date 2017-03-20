<?php
/**
 * Created by PhpStorm.
 * User: tuyi
 * Date: 2016/8/21
 * Time: 18:13
 */


header("content-type:text/html;charset=utf-8");
@$link=mysql_connect("localhost","root","tuyi");
mysql_query("use library",$link);
mysql_query("set names utf8",$link);


$res=mysql_query("select *from content where id=1");
$row=mysql_fetch_assoc($res);

$new['id']=urlencode($row['id']);
$new['text1']=urlencode($row['text1']);
$new['text2']=urlencode($row['text2']);

echo urldecode(json_encode($new));