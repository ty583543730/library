<?php
/**
 * Created by PhpStorm.
 * User: tuyi
 * Date: 2016/8/18
 * Time: 10:48
 */
/**
 * Created by PhpStorm.
 * User: tuyi
 * Date: 2016/8/5
 * Time: 21:12
 */

header("content-type:text/html;charset=utf-8");

$pagenow=$_POST['pagenow'];
session_start();


$name=isset($_SESSION['username'])?$_SESSION['username']:exit();

@$link=mysql_connect("localhost","root","tuyi");
mysql_query("use library",$link);
mysql_query("set names utf8",$link);
$res=mysql_query("select *from baoming where checked=0");
$num=mysql_num_rows($res);


$offset=15*($pagenow-1);
$a=$num-15*$pagenow;

if($num>15)
{
    if($a<0)
    {
        $b=15+$a;
        $res=mysql_query("select *from baoming where checked=0 limit $offset,$b");
    }

    else
    {
       $res=mysql_query("select *from baoming where checked=0 limit $offset,15");
    }
}



while($row=mysql_fetch_assoc($res))
{
    $arr[]=$row;
}

foreach($arr as $key=>$value)
{
    $new[$key]=$value;
    @$new[$key]['id']=urlencode($value['id']);
    @$new[$key]['name']=urlencode($value['name']);
    @$new[$key]['num']=urlencode($value['num']);
    @$new[$key]['phone']=urlencode($value['phone']);
    @$new[$key]['qq']=urlencode($value['qq']);

}
echo urldecode(json_encode($new));