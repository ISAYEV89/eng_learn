<?php require_once __DIR__ . '/../include/header.php'; ?>
<?php require_once __DIR__ . '/../include/auth.php'; ?>



    <div class="container">
        <div class="row block">

            <div class="col-xl-12">
                <h1>Təzə söz əlavə et</h1>

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

                <?php
                if (isset($_SESSION['message']['success'])) {
                    ?>
                    <div class="alert alert-success">
                        <?php echo $_SESSION['message']['success']; ?>
                    </div>
                    <?php
                    unset($_SESSION['message']['success']);
                }
                ?>

                <form method="POST">
                    <div class="form-row">
                        <div class="col">
                            <input type="text" name="en_word" class="form-control" placeholder="First name">
                        </div>
                        <div class="col">
                            <input type="text" name="az_word" class="form-control" placeholder="Last name">
                        </div>

                    </div>



                    <div class="form-row add-submit">
                        <div class="col-xl-12">
                            <button type="submit" name="add" class="btn btn-primary">Əlavə et</button>
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

    } else  {
        $sql = $db->prepare(
            "INSERT INTO `word` (`en_word`, `az_word`, `u_id`, `s_id`,`count`, `true_count`, `false_count`, `percent` )
                      VALUES ('$en_word','$az_word', '$u_id', 0, 0, 0, 0 ,0)");
        $sql->execute();

        $_SESSION['message']['success'] = "Təzə söz əlavə olundu.";
    }

    header('Location:' . $site_url . 'page/add.php');

}


?>
