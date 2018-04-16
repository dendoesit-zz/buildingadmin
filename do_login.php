<?php
session_start();
if (isset($_POST['do_login'])) {

    require_once 'idiorm.php';

    ORM::configure('mysql:host=localhost;dbname=user');
    ORM::configure('username', 'root');
    ORM::configure('password', '');

    $email = $_POST['email'];
    $pass = $_POST['password'];
    $result = ORM::forTable('users')->where(array('email' => $email, 'pw' => $pass))->find_one();

    if ($result) {
        $_SESSION['email'] = $row['email'];
        $_SESSION['role'] = $row['role'];
        echo "gg";
    } else {
        echo "fail";
    }
    exit();
}
?>