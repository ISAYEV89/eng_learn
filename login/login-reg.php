<?php
require_once '../inc/config.php';

print_r($_SESSION);


if (isset($_POST['reg'])) {

    $_POST = array_map('filter_form', $_POST);

    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_config = $_POST['password_re'];


    if ($name == "") {
        $_SESSION['message']['login'] = 'Ad bölməsi doldurulmalıdır.';
        header('Location:' . $site_url . 'login/register.php');
    } else {
        if ($surname == "") {
            $_SESSION['message']['login'] = 'Soyad bölməsi doldurulmalıdır.';
            header('Location:' . $site_url . 'login/register.php');
        } else {
            if ($email == "") {
                $_SESSION['message']['login'] = 'E-mail bölməsi doldurulmalıdır.';
                header('Location:' . $site_url . 'login/register.php');
            } else {
                if ($password == "" || strlen($password) < 8) {
                    $_SESSION['message']['login'] = 'Şifrə ən azı 8 simvol olmalıdır.';
                    header('Location:' . $site_url . 'login/register.php');
                } else {
                    if ($password != $password_config) {
                        $_SESSION['message']['login'] = 'Kodlar eyni olmalıdır.';
                        header('Location:' . $site_url . 'login/register.php');
                    } else {
                        $password = md5($password);
                        $email_check = $db->prepare("SELECT `email` FROM `user` WHERE `email` = '$email' LIMIT 1");
                        $email_check->execute();

                        $email_check2 = $email_check->fetch(PDO::FETCH_ASSOC);

                        if (!empty($email_check2)) {


                            $_SESSION['message']['login'] = 'Qeyd olunan e-mailnən qeydiyyatdan keçib. ';
                            header('Location:' . $site_url . 'login/register.php');


                        } else {

                            $sql = $db->prepare(
                                "INSERT INTO `user` (`name`, `surname`, `email`, `password`, `s_id`, `verified` )
                                        VALUES ('$name','$surname', '$email', '$password', 0, 0)");
                            $sql->execute();

                            $getUser = $db->prepare("SELECT * FROM `user` WHERE `email` = '$email' LIMIT 1");
                            $getUser->execute();

                            $user = $getUser->fetch(PDO::FETCH_ASSOC);

                            $_SESSION['user'] = [
                                'id' => $user['id'],
                                'name' => $user['name'],
                                'surname' => $user['surname'],
                                'email' => $user['email'],
                                'status' => $user['s_id'],
                                'verified' => $user['verified']
                            ];

                            header('Location:' . $site_url . '/index.php');
                        }
                    }
                }
            }
        }
    }

}

?>