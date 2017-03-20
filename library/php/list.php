<?php
/**
 * Created by PhpStorm.
 * User: tuyi
 * Date: 2016/8/4
 * Time: 15:13
 */


//
$page=$_POST['page'];
//$page=2;
header("content-type:text/html;charset=utf-8");
@mysql_connect("localhost","root","tuyi");
mysql_query("set names utf8");
mysql_query("use library");

$res=mysql_query("select *from leaves");
$num=mysql_num_rows($res);

$pagesize=5;
$offset=$num-$page*$pagesize;
if($num<=5)
{
    $res=mysql_query("select *from leaves");
}
else
{

    if($offset<0)
    {
        $a=5+$offset;
        $res=mysql_query("select *from leaves limit 0,$a");
    }
    else
    {
        $res=mysql_query("select *from leaves limit $offset,$pagesize");
    }
}


$arr=array();
while($row=mysql_fetch_assoc($res))
{
    $arr[]=$row;
}
$result=array_reverse($arr);

foreach($result as $key=>$value)
{
    $new[$key]=$value;
    $new[$key]['id']=urlencode($value['id']);
    $new[$key]['name']=urlencode($value['name']);
    $new[$key]['content']=urlencode($value['content']);
}
$x=urldecode(json_encode($new));

echo $x;