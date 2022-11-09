<?php require_once __DIR__ . '/include/header.php';?>


<div class="container container--login">
   <div class="col-12">
       <div class="login-form">

           <form action="" method="POST">
               <div class="form-group">
                   <label for="email">Email:</label>
                   <input type="email" required class="form-control" id="email" placeholder="Email" name="email">
               </div>
               <div class="form-group">
                   <label for="pwd">Password:</label>
                   <input type="password" required class="form-control" id="pwd" placeholder="Password" name="pswd">
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

               <button type="submit" name="submit" class="btn btn-primary">Daxil ol</button>
           </form>
       </div>
   </div>
</div>


<style>
    html, body {
        height: 100%;
    }
</style>


<?php require_once __DIR__ . '/include/footer.php' ?>