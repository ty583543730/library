<?php
/**
 * Created by PhpStorm.
 * User: tuyi
 * Date: 2016/8/26
 * Time: 11:50
 */
header("content-type:text/html;charset=utf-8");

$text1=$_POST['text2'];
//$name='201413131111';
//$text1='27/29/1/1';

$str=explode('/',$text1);

$real=$str[0];

$should=$str[1];

$week=$str[2];

$team=$str[3];

if( count($str)!=4)
{
    echo 2;
    exit();
}

if($real>$should)
{
    echo 2;
    exit();
}
if($week<1||$week>20)
{
    echo 2;
    exit();
}

@$link=mysql_connect("localhost","root","tuyi");
mysql_query("use library",$link);
mysql_query("set names utf8",$link);

$str1=$real.'/'.$should;

switch($team)
{
    case 1:mysql_query("update active set team1='$str1' where id='$week'");break;
    case 2:mysql_query("update active set team2='$str1' where id='$week'");break;
    case 3:mysql_query("update active set team3='$str1' where id='$week'");break;
    case 4:mysql_query("update active set team4='$str1' where id='$week'");break;
    case 5:mysql_query("update active set team5='$str1' where id='$week'");break;
    case 6:mysql_query("update active set team6='$str1' where id='$week'");break;
    case 7:mysql_query("update active set team7='$str1' where id='$week'");break;
    case 8:mysql_query("update active set team8='$str1' where id='$week'");break;
    case 9:mysql_query("update active set team9='$str1' where id='$week'");break;
    case 10:mysql_query("update active set team10='$str1' where id='$week'");break;
    case 11:mysql_query("update active set team11='$str1' where id='$week'");break;
    case 12:mysql_query("update active set team12='$str1' where id='$week'");break;
    case 13:mysql_query("update active set team13='$str1' where id='$week'");break;
    case 14:mysql_query("update active set team14='$str1' where id='$week'");break;
    case 15:mysql_query("update active set team15='$str1' where id='$week'");break;
    case 16:mysql_query("update active set team16='$str1' where id='$week'");break;
    case 17:mysql_query("update active set team17='$str1' where id='$week'");break;
    case 18:mysql_query("update active set team18='$str1' where id='$week'");break;

}
echo 1;

