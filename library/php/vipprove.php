<?php
/**
 * Created by PhpStorm.
 * User: tuyi
 * Date: 2016/8/3
 * Time: 11:47
 */

header("content-type:text/html;charset=utf-8");

session_start();
if(!isset($_SESSION['expiretime']))
{
    echo 1;
    die;
}

if(isset($_SESSION['username'])&&$_SESSION['expiretime']>time())
{
    echo $_SESSION['username'];
}
else
    echo 1;