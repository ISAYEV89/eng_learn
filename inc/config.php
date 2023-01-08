<?php
ob_start();
session_start();

$site_url = 'http://eng.local/';
$status_access = 0;
$status_verified = 1;


require_once __DIR__ . '/db.php';
require_once __DIR__ . '/function.php';

?>