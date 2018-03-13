<?php
/*This Code Work when no activities, automatic destroy cookies and logout*/
//GET COOKIE
$una=$_COOKIE['a'];
$app=$_COOKIE['b'];
$tbh=$_COOKIE['i'];
//RemoveLastCookies
$tme=time()-60*40;
setcookie("a", '', $tme, '/');
setcookie("b", '', $tme, '/');
setcookie("i", '', $tme, '/');
//RebuildCookies
$ttl=time()+60*40;
setcookie("a", $una, $ttl, '/');
setcookie("b", $app, $ttl, '/');
setcookie("i", $tbh, $ttl, '/');
//EOF
?>