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
        $_SESSION['email'] = $result->email;
        $_SESSION['role'] = $result->role;
        $visit = ORM::for_table('visits')->create();
        $visit->id_user = $result->id;
        $visit->visit_date = date("d-m-Y", time());
        $visit->save();

        $locatar = ORM::forTable('locatari')->where('user_id', $result->id)->find_one();

        $_SESSION['locatar_id'] = $locatar->id;
        echo "gg";
    } else {
        echo "fail";
    }
    exit();
}
?>