<?php require_once __DIR__ . '/include/header.php';?>
<?php require_once __DIR__ . '/include/auth.php'; ?>

<div class="container">
    <div class="row">

        <div class="col-12 block">
            Select Voice: <select id='voiceList'></select> <br><br>
            <div>
                <img class="play-icon" id="btnSpeak" src="assets/image/icon/play-circle-solid.svg" alt="">
                <audio src="" class="speech" hidden></audio>
            </div>

            <div class="word">
                <span class="word-eng"  id='txtInput'> repayment Amount  </span>
                <span class="word-br"> - </span>
                <span class="word-az">Text</span>
            </div>

            <div>
                <button type="button" class="btn btn-dark">Cavaba bax</button>
            </div>

            <div class="result mt-4">
                <p class="result-text">Ümumi nəticə</p>
                <div class="result-content">
                    <span class="result-true"> Düz - 6 </span>
                    <span class="result-false"> Səhv - 2 </span>
                    <span class="result-percent good"> Faiz - 75% </span>
                </div>
            </div>

            <div class="archive">
                <button type="button" class="btn btn-secondary">Arxivə göndər</button>
            </div>

        </div>

    </div>

</div>


<?php require_once __DIR__ . '/include/footer.php' ?>