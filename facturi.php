<?php
session_start();
$host = "localhost";
$username = "root";
$password = "";
$databasename = "user";
$connect = mysqli_connect($host, $username, $password, $databasename);

if ($_POST['action'] == 'addFactura') {
    $id_locatar = $_POST['id_locatar'];
    $suma = $_POST['suma'];
    $luna = $_POST['luna'];
    $an = $_POST['an'];
    $sql = "insert into facturi (id_locatar, luna, an, suma) values($id_locatar, $luna, $an, $suma)";
    echo $sql;
    $result = mysqli_query($connect, $sql);
    if ($result) {
        echo "gg";
    } else {
        echo "fail";
    }
    exit();
} else if ($_POST['action'] == 'getFacturiLuna') {
    $luna = $_POST['luna'];
    $an = $_POST['an'];
    $sql = "select * from facturi where luna = $luna and an = $an;";
    $result = mysqli_query($connect, $sql);
    while ($row = $result->fetch_assoc()) {
        $json[] = $row;
    }
    $data['data'] = $json;
    $data['total'] = mysqli_num_rows($result);
    echo json_encode($data);
    exit();
} else if ($_POST['action'] == 'updateFactura') {
    $id_locatar = $_POST['id_locatar'];
    $suma = $_POST['suma'];
    $luna = $_POST['luna'];
    $an = $_POST['an'];
    $sql = "update facturi set id_locatar = $id_locatar, luna = $luna, an = $an, suma = $suma;s";
    echo $sql;
    $result = mysqli_query($connect, $sql);
    if ($result) {
        echo "gg";
    } else {
        echo "fail";
    }
    exit();
} else if ($_POST['action'] == 'getFacturi') {
    $sql = "select * from facturi";
    $result = mysqli_query($connect, $sql);
    while ($row = $result->fetch_assoc()) {
        $json[] = $row;
    }
    $data['data'] = $json;
    $data['total'] = mysqli_num_rows($result);
    echo json_encode($data);
    exit();
} else if ($_POST['action'] == 'deleteFact') {
    $id_locatar = $_POST['id_locatar'];
    $sql = "delete from facturi where id_locatar = '$id_locatar'";
    $result = mysqli_query($connect, $sql);
    exit();
}
?>

