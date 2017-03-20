<?php
/**
 * Created by PhpStorm.
 * User: tuyi
 * Date: 2016/8/1
 * Time: 21:23
 */

header("content-type:text/html;charset=utf-8");

@$link=mysql_connect("localhost","root","tuyi");
mysql_query("use library",$link);
mysql_query("set names utf8",$link);
//$num=1;
$num=$_POST['num'];
$s1=array();

for($i=0;$i<20;$i++)
{
    list($s1[$i],$s2[$i])=explode(' ',microtime());
    $s1[$i]*=1000000;
    $s1[$i]=strval($s1[$i]);
 if($num==2)
  {
     $s1[$i]= insert('b',$s1[$i]);
  }
  $res= mysql_query("insert into users (invitecode)VALUES ('$s1[$i]')");
    if(!$res)
    {
        echo 0;
        exit();
    }

}
echo 1;
function insert($start,$str)
{
        $str1=$start.$str;
    return $str1;
}


