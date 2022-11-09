<?php require_once __DIR__ . '/include/header.php';?>


    <div class="container container--login">
        <div class=" login-form col-xl-6">


                <form action="" method="POST">

                    <div class="form-group form-group-m w-100">
                        <label class="form-group__label w-100 mb-0">
                            <span>Ad *:</span>
                            <input type="text" required class="form-control w-100"  placeholder="Ad *" name="name">
                        </label>

                        <label class="form-group__label w-100 mb-0">
                            <span>Soyad *:</span>
                            <input type="text" required class="form-control w-100"  placeholder="Soyad *" name="surname">
                        </label>
                    </div>


                    <div class="form-group w-100">
                        <label class="form-group__label w-100 mb-0">
                            <span>Email *:</span>
                            <input type="email" required class="form-control w-100"  placeholder="Email *" name="email">
                        </label>
                    </div>

                    <div class="form-group w-100">
                        <label class="form-group__label w-100 mb-0">
                            <span>Kod *:</span>
                            <input type="password" required class="form-control w-100"  placeholder="Kod *" name="password">
                        </label>
                    </div>

                    <div class="form-group w-100">
                        <label class="form-group__label w-100 mb-0">
                            <span>Kod təkrar *:</span>
                            <input type="password" required class="form-control w-100"  placeholder="Kod təkrar *" name="re_password">
                        </label>
                    </div>

                    <div class="group__link-block">
                        <a href="./login.php" class="group__link">Daxil ol</a>

                        <a href="./forgot.php" class="group__link">Şifrəni Unutdun?</a>
                    </div>

                    <?php
                    if (isset($_SESSION['msg'])) {
                        ?>
                        <div class="alert alert-danger">
                            <?php echo $_SESSION['msg']; ?>
                        </div>
                        <?php
                        unset($_SESSION['msg']);
                    }
                    ?>



                    <button type="submit" name="submit" class="btn btn-primary">Qeydiyyat</button>
                </form>


        </div>
    </div>





<?php require_once __DIR__ . '/include/footer.php' ?>