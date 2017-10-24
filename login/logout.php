<?php
session_start();
$ttl=time()-3600*2;
unset($_COOKIE['u']);
unset($_COOKIE['b']);
unset($_COOKIE['i']);
unset($_COOKIE['s']);
setcookie("u", '', $ttl, '/');
setcookie("b", '', $ttl, '/');
setcookie("i", '', $ttl, '/');
setcookie("s", '', $ttl, '/');
session_destroy();
header("Location: ../");
?>