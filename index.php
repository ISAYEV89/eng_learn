<?php require_once __DIR__ . '/include/header.php';?>
<?php require_once __DIR__ . '/include/auth.php'; ?>

<?php

$baza = $db->prepare("SELECT * FROM `word` WHERE `s_id` = 0 AND `u_id` = '$u_id' ORDER by RAND() ");
$baza->execute();
$baza2 = $baza->fetch(PDO::FETCH_ASSOC);


?>

<div class="container">
    <div class="row">

        <div class="col-12 block">
            Select Voice: <select id='voiceList'></select> <br>
            <div>
                <img class="play-icon" id="btnSpeak" src="assets/image/icon/play-circle-solid.svg" alt="">
                <audio src="" class="speech" hidden></audio>
            </div>

            <div class="word">
                <span class="word-eng"  id='txtInput'> <?php echo $baza2['en_word'] ?>  </span>
            </div>

            <div class="part-1">
                <button type="button" id="showAnswer" data-id="<?php echo $baza2['id'] ?>" class="btn btn-dark">Cavaba bax</button>
            </div>

            <div id="answerBtn" class="part-2 d-none">
                <a href="" id="trueAnswer"  class="btn btn-info mr-3">Düz tapdım</a>
                <a href="" id="falseAnswer" class="btn btn-info ml-3">Səhv tapdım</a>
            </div>

            <div  class="newWord d-none part-3">
                <button type="button" id="newWord" class="btn btn-dark">Yeni söz</button>
            </div>

            <div class="result mt-4 d-none part-3">
                <p class="result-text">Ümumi nəticə</p>
                <div class="result-content">
                    <span class="result-true"> Düz - <span></span> </span>
                    <span class="result-false"> Səhv - <span></span> </span>
                    <span class="result-percent"> Faiz - <span></span> </span>
                </div>
            </div>

            <div class="archive d-none">
                <button type="button" id="sendArchive"  class="btn btn-secondary">Arxivə göndər</button>

                <div class="d-none alert alert-success mt-3">
                   Söz arxivə köçürüldü.
                </div>
            </div>

        </div>

    </div>

</div>


<?php require_once __DIR__ . '/include/footer.php' ?>