<?php
session_start();
$_SESSION["uid"] = "";

if(isset($_COOKIE['user_login']))
{
 setcookie ("user_login","");
 setcookie("user_login", "");
}
session_destroy();
header("Location:login.php");
?> 