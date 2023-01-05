<?php
session_start();
require_once '../inc/config.php';
unset($_SESSION['user']);
header('Location:' . $site_url);

?>