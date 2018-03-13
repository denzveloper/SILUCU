<?php
$ver="1.0.0";
$appnam="SILUCU";
$client="PDAM INDRAMAYU";
/****************************
CREATED BY:
1. DANIYAH HAYATI
2. DENDY OCTAVIAN
3. HAFIDZ A. P.
4. NANDIA R. N.
5. MAWAR UTARI

UNIVERSITY:
POLITEKNIK NEGERI INDRAMAYU

OUR CLIENT:
PDAM KABUPATEN INDRAMAYU

Other? See "../login/act.php" (Login first!)
*****************************/
$now=date("Y");
$bln=date("m");
$har=date("d");
$tgl=date("j-M-Y");
$begin=2017;
include "redirect.php";
include "konversi_tgl.php";
//detect IE
$ua = htmlentities($_SERVER['HTTP_USER_AGENT'], ENT_QUOTES, 'UTF-8');
if (preg_match('~MSIE|Internet Explorer~i', $ua) || (strpos($ua, 'Trident/7.0; rv:11.0') == true )) {
	echo "<html><head><title>Browser Not Compatible!</title></head><body bgcolor='#ff4040' style='color:white; text-align: center; font-family: Arial, sans-serif; text-shadow: 3px 3px 3px rgba(0, 0, 0, 0.7);'><h1 style='font-size: 12em; font-weight: bold;'>:(</h1><h2>I &#60;/3 \"Microsoft Internet Exploler\"</h2><h3>Sorry, Your <i>Browser</i> is <u>Doesn't support</u>!</h3><h4>Please Change Your Browser or Update Your browser now! You can download lastest Google Chrome or Mozilla Firefox.</h4></body></html>";
	exit;
}
?>