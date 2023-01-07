<?php

if (empty(($_SESSION['user']))) {
    header("Location: $site_url" . "login/login.php");
    exit;
} else if (!(($_SESSION['user']['status']) == $status_access)){
    header("Location: $site_url" . "login/login.php");
    exit;
}

?>