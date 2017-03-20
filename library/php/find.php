<?php
/**
 * Created by PhpStorm.
 * User: tuyi
 * Date: 2016/8/6
 * Time: 16:47
 */

header("content-type:text/html;charset=utf-8");

@$link=mysql_connect("localhost","root","tuyi");
mysql_query("use library",$link);
mysql_query("set names utf8",$link);

$invitecode=$_POST['invitecode'];
$name=$_POST['name'];
$password=$_POST['password'];
//$invitecode="849574";
//$name="201413137119";
//$password="wananle";
$res=mysql_query("select name from users where invitecode='$invitecode' and isinvite=1");


$arr=array();
while($row=mysql_fetch_assoc($res))
{
    $arr[]=$row;
}
if($arr[0]['name']==$name)
{
    mysql_query("update users set password='$password',repassword='$password' where name='$name'");
echo 1;
}

else
    echo 0;