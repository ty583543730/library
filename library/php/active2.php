<?php
/**
 * Created by PhpStorm.
 * User: tuyi
 * Date: 2016/8/26
 * Time: 17:49
 */


session_start();
if(@$_SESSION['week']>0&&$_SESSION['week']<=18)
{
    $week=$_SESSION['week'];
}
else $week=1;


echo $week;