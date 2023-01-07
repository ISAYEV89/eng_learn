<?php
if (isset($_SESSION['user']['status'])) {
    if (($_SESSION['user']['status']) == $status_access) {
        header("Location: $site_url" . "index.php");
        exit;
    }
}

?>