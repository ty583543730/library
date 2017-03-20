<?php
/**
 * Created by PhpStorm.
 * User: tuyi
 * Date: 2016/8/20
 * Time: 10:45
 */
header("content-type:text/html;charset=utf-8");

$pagenow=$_POST['pagenow'];
$vip=$_POST['vip'];
//$vip=1;
$num1=0;
$num2=0;
if($vip==0)
{
    exit();
}
//$pagenow=1;
session_start();
$name=isset($_SESSION['username'])?$_SESSION['username']:exit();
@$link=mysql_connect("localhost","root","tuyi");
mysql_query("use library",$link);
mysql_query("set names utf8",$link);

if($vip==1)
{
    $res1=mysql_query("select invitecode from users where isinvite=0 and invitecode regexp binary '[a-z][0-9]+'");
    $res2=mysql_query("select invitecode from users where isinvite=0 and invitecode regexp binary '^[0-9]+$'");
    $num1=mysql_num_rows($res1);
    $num2=mysql_num_rows($res2);
    $arr01=array();
    while($row=mysql_fetch_assoc($res1))
    {
        $arr01[]=$row;
    }

    $arr02=array();
    while($row=mysql_fetch_assoc($res2))
    {
        $arr02[]=$row;
    }

    $arr=$arr01;
  for($i=$num1;$i<$num1+$num2;$i++)
  {
      $arr[$i]=$arr02[$i-$num1];
  }

}

if($vip==2)
{
    $res1=mysql_query("select invitecode from users where isinvite=0 and invitecode regexp binary '^[0-9]+$'");
    $num1=mysql_num_rows($res1);
    $arr=array();
    while($row=mysql_fetch_assoc($res1))
    {
        $arr[]=$row;
    }

}

$num=$num1+$num2;
$arr1=array();
$offset=60*($pagenow-1);
$x=$num-60*$pagenow;

if($num<=60)
{
    for($i=0;$i<$num;$i++)
    {
        $arr1[$i]=$arr[$i];
    }
}

else
 {

    if ($x < 0)
    {
        $a = 60 + $x;
        for($i=$offset;$i<$offset+$a;$i++)
        {
            $arr1[$i-$offset]=$arr[$i];
        }

    }
    else {
        for($i=$offset;$i<(60+$offset);$i++)
        {
            $arr1[$i-$offset]=$arr[$i];
        }
    }
}


//print_r($arr1);
//exit();
foreach($arr1 as $key=>$value)
{
    $new[$key]=$value;
    @$new[$key]['invitecode']=urlencode($value['invitecode']);

}
$y= urldecode(json_encode($new));
echo $y;