<?php
error_reporting(0); 
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
/*$hostname_cn = "db527701377.db.1and1.com";
$database_cn = "db527701377";
$username_cn = "dbo527701377";
$password_cn = "filiere2014";*/

	$hostname_cn = "localhost";
$database_cn = "database_yuno";
$username_cn = "root";
$password_cn = "";

$cn = mysql_connect($hostname_cn, $username_cn, $password_cn) or trigger_error(mysql_error(),E_USER_ERROR); 
    mysql_select_db($database_cn);
?>