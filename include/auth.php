<?php


if (isset($_SESSION['user']['status'])) {
    if (($_SESSION['user']['status']) == 1) {
        header("Location: $site_url/admin/index.php");
        exit;
    }
}
//else if(empty(($_SESSION['user']))) {
//    header("Location: $site_url" . "login.php");
//    exit;
//}  else if (!(($_SESSION['user']['status']) == 1)) {
//    header("Location: $site_url" . "login.php");
//    exit;
//}






//http://eng.local/login.php


?>