<?php
/**
 * Created by PhpStorm.
 * User: tuyi
 * Date: 2016/8/2
 * Time: 9:52
 */
header("content-type:text/html;charset=utf-8");
$name=$_POST['name'];
$password=$_POST['password'];
$repassword=$_POST['repassword'];
$invitecode=$_POST['invitecode'];
$name0=$_POST['name0'];
$isinvite=0;
//$name0='屠义';
//$name="201413137119";
//$invitecode="a171505";
//$password="wananle0";
@$link=mysql_connect("localhost","root","tuyi");
mysql_query("use library");
mysql_query("set names utf8",$link);
$res1=mysql_query("select *from users where invitecode='$invitecode'");
$res=mysql_query("select *from users where name='$name'");
$res2=mysql_query(("select isinvite from users where invitecode='$invitecode'"));
$arr1=mysql_fetch_assoc($res2);
if(mysql_num_rows($res)<1&&mysql_num_rows($res1)==1&&$arr1['isinvite']==0)
{
    echo 1;
    $isinvite=1;
    mysql_query("insert into information(num1,password,code,name)values
('$name','$password','$invitecode','$name0');");

}
else if(mysql_num_rows($res)>=1)
{
    echo 2;
    exit();
}
else if(mysql_num_rows($res1)<1)
{
    echo 3;
    exit();
}
else if($arr1['invite']==1)
{
    echo 4;
    exit();
}
else
{
    echo 5;
    exit();
}

mysql_query("update users set name='$name',password='$password',repassword='$repassword',
isinvite='$isinvite' WHERE invitecode='$invitecode'");

