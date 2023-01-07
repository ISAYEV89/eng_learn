<?php require_once __DIR__ . '/../include/header.php'; ?>
<?php require_once __DIR__ . '/../include/auth.php'; ?>

<?php

if (isset($_GET['id'])) {
    $id_rew = $_GET['id'];

    $baza = $db->prepare("SELECT * FROM `word` WHERE `id` = '$id_rew' ");
    $baza->execute();
    $baza2 = $baza->fetch(PDO::FETCH_ASSOC);

    if (empty($baza2)) {
        header("Location: $site_url/page/list.php");
        exit;
    }
} else {
    header("Location: $site_url/page/list.php");
    exit;
}
?>

<div class="container">
    <div class="row block">

        <div class="col-xl-12">
            <h1>Söz dəyişdir.</h1>

            <?php
            if (isset($_SESSION['message']['error'])) {
                ?>
                <div class="alert alert-danger">
                    <?php echo $_SESSION['message']['error']; ?>
                </div>
                <?php
                unset($_SESSION['message']['error']);
            }
            ?>

            <form method="POST">
                <div class="form-row">
                    <div class="col">
                        <input type="text" name="en_word" class="form-control" placeholder="Ingilisce"
                               value="<?php echo (!empty($baza2['en_word'])) ? $baza2['en_word'] : ''; ?>">
                    </div>
                    <div class="col">
                        <input type="text" name="az_word" class="form-control" placeholder="Azerbaycanca"
                               value="<?php echo (!empty($baza2['az_word'])) ? $baza2['az_word'] : ''; ?>">
                    </div>

                </div>



                <div class="form-row add-submit">
                    <div class="col-xl-12">
                        <a href="<?php echo $site_url ?>page/list.php" class="btn btn-primary w-25"> Geri </a>
                        <button type="submit" name="add" class="btn btn-primary">Dəyişdir</button>
                    </div>
                </div>
            </form>





        </div>


    </div>
</div>
<?php require_once __DIR__ . '/../include/footer.php' ?>

<?php

if(isset($_POST['add'])) {

    $_POST = array_map('filter_form', $_POST);

    $en_word = $_POST['en_word'];
    $az_word = $_POST['az_word'];
    $u_id = $_SESSION['user']['id'];

    if($en_word == "" || $az_word == "") {
        $_SESSION['message']['error'] = 'Bütün bölmə doldurulmalıdır.';
        header('Location:' . $site_url . 'page/edit.php');
    } else  {
        $updt = $db->prepare("UPDATE `word` SET en_word=:en_word, az_word=:az_word WHERE id='$id_rew'");
        $updt->execute(array('en_word' => $en_word, 'az_word' => $az_word));

//        $_SESSION['message']['success'] = "Təzə söz əlavə olundu.";
            header('Location:' . $site_url . 'page/list.php');
    }

//    header('Location:' . $site_url . 'page/add.php');

}


?>
