<?php
$asli = md5('admin');
$plus = '$asli' + 999;
echo 'Asli='.$asli.'\n';
echo $plus;
?>