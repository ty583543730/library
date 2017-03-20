<?php
/**
 * Created by PhpStorm.
 * User: tuyi
 * Date: 2016/8/26
 * Time: 15:27
 */
header("content-type:text/html;charset=utf-8");
session_start();
$week=isset($_SESSION['week'])?$_SESSION['week']:1;
@$link=mysql_connect("localhost","root","tuyi");
mysql_query("use library",$link);
mysql_query("set names utf8",$link);


$res=mysql_query("select *from active where id='$week'");

$arr=mysql_fetch_assoc($res);

$arr1=array();
for($i=1;$i<=18;$i++)
{
    $x="team".$i;
    $arr1[$i]=$arr[$x];

}



$arr2=array(array());

for($i=1;$i<=18;$i++)
{
    $str=explode('/',$arr1[$i]);
    for($j=0;$j<2;$j++)
    {    if(@$str[$j]==null)
       {
         $arr2[$i][$j]=0;
       }
     else   @$arr2[$i][$j]=$str[$j];
    }

    if($arr2[$i][1]==0)
    {
        $arr2[$i][2]=0;
    }
    else{
        $arr2[$i][2]=$arr2[$i][0]/$arr2[$i][1];
        $arr2[$i][2]=substr($arr2[$i][2],0,5);
        $arr2[$i][2]=floatval($arr2[$i][2]);
        $arr2[$i][2]*=100;
        $arr2[$i][2].='%';
    }

    $arr2[$i][3]=$i;
}

echo json_encode($arr2);