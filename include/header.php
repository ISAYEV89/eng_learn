<?php
require_once __DIR__ .  '/../inc/config.php';
//require_once __DIR__ .  '/../inc/ip.php';

@print_r($_SESSION['user'])
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo $site_url ?>/assets/css/bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="<?php echo $site_url ?>/assets/css/style.css">
</head>

<body>

<?php

if (isset($_SESSION['user']['status'])) {
    if (($_SESSION['user']['status']) == 0) {
        require_once __DIR__ . '/menu.php';
    }
}

//print_r($_SESSION['user']);
//echo '<br>';
//echo $_SESSION['user']['email'];



?>