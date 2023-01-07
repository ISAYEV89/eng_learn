<?php
require_once '../inc/config.php';

if(isset($_POST['wordId'])){

    $id = $_POST['wordId'];
    $word = $db -> prepare("SELECT * FROM `word` WHERE `id` = '$id' LIMIT 1");
    $word -> execute();
    $word2 = $word->fetch(PDO::FETCH_ASSOC);
    echo json_encode($word2);
}

if(isset($_POST['trueAnswer'])){

    $id = $_POST['id'];


    $word = $db -> prepare("SELECT * FROM `word` WHERE `id` = '$id' LIMIT 1");
    $word -> execute();
    $word3 = $word->fetch(PDO::FETCH_ASSOC);

    $count = $word3['count'] + 1;
    $true_count = $word3['true_count'] + 1;
    $percent = ($true_count / $count) * 100;


    $updt = $db->prepare("UPDATE `word` SET count=:count, true_count=:true_count, percent=:percent WHERE id='$id'");
    $updt->execute(array( 'count' => $count, 'true_count' => $true_count, 'percent' => $percent));


    $word5 = $db -> prepare("SELECT * FROM `word` WHERE `id` = '$id' LIMIT 1");
    $word5 -> execute();
    $word6 = $word5->fetch(PDO::FETCH_ASSOC);


    echo json_encode($word6);
}

if(isset($_POST['falseAnswer'])){

    $id = $_POST['id'];


    $word = $db -> prepare("SELECT * FROM `word` WHERE `id` = '$id' LIMIT 1");
    $word -> execute();
    $word3 = $word->fetch(PDO::FETCH_ASSOC);

    $count = $word3['count'] + 1;
    $false_count = $word3['false_count'] + 1;
    $true_count = $word3['true_count'];
    $percent = ($true_count / $count) * 100;


    $updt = $db->prepare("UPDATE `word` SET count=:count, false_count=:false_count, percent=:percent WHERE id='$id'");
    $updt->execute(array( 'count' => $count, 'false_count' => $false_count, 'percent' => $percent));


    $word5 = $db -> prepare("SELECT * FROM `word` WHERE `id` = '$id' LIMIT 1");
    $word5 -> execute();
    $word6 = $word5->fetch(PDO::FETCH_ASSOC);


    echo json_encode($word6);
}

if(isset($_POST['newWord'])){

    $id = $_POST['id'];

    $word = $db -> prepare("SELECT * FROM `word` WHERE `id` != '$id' AND `s_id` = 0 ORDER by RAND() LIMIT 1");
    $word -> execute();
    $word3 = $word->fetch(PDO::FETCH_ASSOC);

    echo json_encode($word3);

}