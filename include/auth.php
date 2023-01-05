<?php

if (isset($_SESSION['user']['status'])) {
    if (($_SESSION['user']['status']) == 0) {
        header('Location:' . $site_url);
        exit;
    }else if(!($_SESSION['user']['status']) == 0){
        header('Location:' . $site_url . 'login/login.php');
        exit;
    }
}

if(empty(isset($_SESSION['user']))) {
   echo 'a';
}

?>