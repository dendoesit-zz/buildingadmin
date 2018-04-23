<?php
session_start();

require_once 'idiorm.php';

ORM::configure('mysql:host=localhost;dbname=user');
ORM::configure('username', 'root');
ORM::configure('password', '');
ORM::configure('id_column_overrides', array(
    'facturi' => array('id_locatar', 'luna', 'an') // a compound primary key
));

if ($_POST['action'] == 'addUser') {

    $ap = $_POST['ap'];
    $nume = $_POST['nume'];
    $nr_pers = $_POST['nr_pers'];
    $user = ORM::for_table('users')->create();
    $user->email = $nume;
    $user->role = 'locatar';
    $user->pw = $nume . $nr_pers;
    $user->save();
    if ($user) {
        $locatar = ORM::for_table('locatari')->create();
        $locatar->ap = $ap;
        $locatar->nume = $nume;
        $locatar->nr_pers = $nr_pers;
        $locatar->user_id = $user->id;
        $locatar->save();
        if($locatar) {
            echo "gg";
        } else {
            echo "fail here";
        }
    } else {
        echo "fail";
    }
    exit();

} else if ($_POST['action'] == 'editUser') {

    $ap = $_POST['ap'];
    $nume = $_POST['nume'];
    $nr_pers = $_POST['nr_pers'];
    $id = $_POST['id'];
    $user = ORM::forTable('users')->find_one($id)->set(array('email' => $nume, 'pw' => $nume . $nr_pers))->save();
    if ($user) {
        $locatar = ORM::forTable('locatari')->find_one($id)->set(array('ap' => $ap, 'nume' => $nume, 'nr_pers' =>$nr_pers))->save();
        if ($locatar) {
            echo "gg";
        } else {
            echo "fail in locatari";
        }
    } else {
        echo "fail in users";
    }
    exit();

} else if ($_POST['action'] == 'deleteUser') {

    $id_locatar = $_POST['id'];
    $facturiLuna = ORM::forTable('facturi')->where('id_locatar', $id_locatar)->find_many();
    foreach ($facturiLuna as $factura) {
        $factura->delete();
    }
    $locatar = ORM::forTable('locatari')->find_one($id_locatar);
    $id_user = $locatar->$id_user;
    $locatar -> delete();
    $user = ORM::forTable('users')->find_one($id_user);
    $user -> delete();
    echo "gg";
    exit();

} else if ($_POST['action'] == 'getAll') {

    $allLocatari = ORM::for_table('locatari')->raw_query("select l.ap, l.id, l.nr_pers, l.nume, l.user_id, sum(IFNULL(f.suma, 0)) as suma from locatari l left join facturi f on f.id_locatar = l.id group by f.id_locatar order by ap")->find_array();
    $data['data'] = $allLocatari;
    $data['total'] = count($allLocatari);
    echo json_encode($data);
    exit();
}
?>