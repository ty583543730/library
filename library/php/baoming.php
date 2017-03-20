<?php
/**
 * Created by PhpStorm.
 * User: tuyi
 * Date: 2016/8/9
 * Time: 17:47
 */


$name=$_POST['name'];
$num=$_POST['num'];
$phone=$_POST['phone'];
$qq=$_POST['qq'];
$check=$_POST['check'];

//$name="测试一";
//$num="201413130000";
//$phone="156123456789";
//$qq="13123145";
//$check=1;
header("content-type:text/html;charset=utf-8");

@$link=mysql_connect("localhost","root","tuyi");
mysql_query("use library",$link);
mysql_query("set names utf8",$link);

$res=mysql_query("select *from baoming where num='$num'");

$a=mysql_num_rows($res);

if($a<1)
{
mysql_query("insert into baoming(name,num,phone,qq,checked)VALUES ('$name','$num','$phone','$qq','$check')");
echo 1;
    exit();
}
echo 2;
