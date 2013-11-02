<?php
define('DB_HOST','localhost');
define('DB_USER','');
define('DB_PASS','');
define('DB_DB','');

$db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_DB, DB_USER, DB_PASS);  

//date_default_timezone_set('Europe/Berlin');
?>
