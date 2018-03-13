<?php
//logout script
session_start();
//set cookies to null
$ttl=time()-60*40;
setcookie("a", '', $ttl, '/');
setcookie("b", '', $ttl, '/');
setcookie("i", '', $ttl, '/');
//unset cookies
unset($_COOKIE['a']);
unset($_COOKIE['b']);
unset($_COOKIE['i']);
//destroy session
session_destroy();
//back to login page
header("Location: ../");
?>