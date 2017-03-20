<?php
/**
 * Created by PhpStorm.
 * User: tuyi
 * Date: 2016/8/3
 * Time: 11:57
 */

session_start();

if(isset($_SESSION['username']))
{
    session_destroy();

}
echo 1;

header("Location:../html/denglu.html");