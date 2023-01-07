<?php

include_once __DIR__ . '/../include/header.php';

if (isset($_GET['delete'])) {
    $id_rew = $_GET['delete'];

    $delete=$db->prepare("DELETE FROM `word` where `id`= '$id_rew' ");
    $delete -> execute();

    header("Location: $site_url" . "page/list.php");;


}

echo $_GET['delete'];

?>