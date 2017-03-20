<?php
/**
 * Created by PhpStorm.
 * User: tuyi
 * Date: 2016/8/26
 * Time: 17:25
 */
header("content-type:text/html;charset=utf-8");

session_start();
@$_SESSION['week']=$_POST['text3'];


echo ($_SESSION['week']);