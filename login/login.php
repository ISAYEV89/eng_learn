<?php
require_once __DIR__ . '/../include/header.php';
require_once __DIR__ . '/../include/auth-login.php';

if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $pswd = md5($_POST['pswd']);

    $sql_login = $db->prepare("SELECT * FROM `user` WHERE `email` = '$email' AND `password` = '$pswd' AND `s_id` = 0");
    $sql_login->execute();
    $count = $sql_login->rowCount();
    $user = $sql_login->fetch(PDO::FETCH_ASSOC);


    if ($count > 0) {
        $_SESSION['user'] = [
            'id' => $user['id'],
            'name' => $user['name'],
            'surname' => $user['surname'],
            'email' => $user['email'],
            'status' => $user['s_id'],
            'verified' => $user['verified']
        ];
        header("Location: $site_url" . "index.php");
        exit;
    } else {
        $_SESSION['message']['login'] = 'Login və ya kod səhvdir';
        header("Location: $site_url" . "login/login.php");
        exit;
    }
}

?>



<div class="container container--login">
   <div class="col-6">
       <div class="login-form">

           <form action="" method="POST">
               <div class="form-group">
                   <label for="email">Email:</label>
                   <input type="email"  class="form-control" id="email" placeholder="Email" name="email">
               </div>
               <div class="form-group">
                   <label for="pwd">Password:</label>
                   <input type="password"  class="form-control" id="pwd" placeholder="Password" name="pswd">
               </div>

               <?php
               if (isset($_SESSION['message']['login'])) {
                   ?>
                   <div class="alert alert-danger">
                       <?php echo $_SESSION['message']['login']; ?>
                   </div>
                   <?php
                   unset($_SESSION['message']['login']);
               }
               ?>

               <div class="group__link-block">
                   <a href="<?php echo $site_url . 'login/register.php' ?>" class="group__link">Qeydiyyat</a>

                   <a href="forgot.php" class="group__link">Şifrəni Unutdun?</a>
               </div>

               <div>
                   <button type="submit" name="submit" class="btn btn-primary">Daxil ol</button>
               </div>

           </form>
       </div>
   </div>
</div>


<style>
    html, body {
        height: 100%;
    }
</style>


<?php require_once __DIR__ . '/../include/footer.php' ?>